<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Str;
use DB;
use App\Mail\ForgotPassword;
use Mail;
use App\Models\Admin;
use Hash;


class AdminController extends Controller
{
	/**
	 * This function is used to Show Admin Dashboard
	*/
	public function dashboard(Request $request) {
		
		return view('admin.dashboard');
	}

	public function adminForgotPassword(Request $request){
		if($request->isMethod('GET')){
			return view('admin.forgot-password');
		}

		if($request->isMethod('POST')){
			$token = Str::random(32);
			$email = $request->email;

			$check_email = Admin::whereEmail($email)->whereDeletedAt(null)->first();

			if($check_email){
				DB::table('password_resets')->whereEmail($email)->delete();

				DB::table('password_resets')->insert([
					'email' => $email,
					'token' => $token,
					'created_at' => Carbon::now()
				]);

				try{
					\Mail::to($email)->send(new ForgotPassword($token));
				}catch(\Exception $ex){
					return ['status' => 'false', 'message' =>  "Error " . $ex->getMessage()];
				}
				return ['status' => 'true', 'message' => 'A reset password link has been sent to your entered email.'];
			}else{
				return ['status' => 'false', 'message' =>  "Please enter registered email address."];
			}

			

		}
	}

	public function resetPassword(Request $request, $token){
		if($request->isMethod('GET')){
			return view('admin.reset-password',compact('token'));
		}

		if($request->isMethod('POST')){
			$check_token = DB::table('password_resets')->whereToken($token)->first();
			if($check_token){
				$find_admin = Admin::whereEmail($check_token->email)->whereDeletedAt(null)->first();
				if($find_admin){
					$hash = Hash::make($request->password);
					$find_admin->password = $hash;
					$find_admin->update();

					DB::table('password_resets')->whereToken($token)->delete();
					
					return ['status' => 'true', 'message' =>  "Password has been reset successfully."];
				}else{
					return ['status' => 'false', 'message' =>  "Your account has been deleted by admin."];
				}
			}else{
				return ['status' => 'false', 'message' =>  "Your link has been invalid or expired. So please send forgot password mail again to reset your password."];
			}
			
		}
	}
}
