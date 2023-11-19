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
use App\Models\User;
use App\Models\Payment;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
	/**
	 * This function is used to Show Admin Dashboard
	*/
	public function dashboard(Request $request) {

		$total_users = User::whereDeletedAt(null)->count();
		$total_blocked_users = User::whereDeletedAt(null)->whereIsBlock(1)->count();
		$total_number_payments = Payment::select("*", DB::raw('(SELECT payment_received FROM orders WHERE orders.id = payments.order_id) AS payment_received'))->where(DB::raw('(SELECT payment_received FROM orders WHERE orders.id = payments.order_id)'), '=', 1)->whereDeletedAt(null)->count();
		$total_coupons = Coupon::whereDeletedAt(null)->count();

		$totalRevenue = Payment::whereDeletedAt(null)->sum('pay_amount');
		$totalRevenue = $this->number_format_short($totalRevenue);
		$totalProducts = Product::whereDeletedAt(null)->count();
		$totalOrders = Order::whereDeletedAt(null)->count();

		$current_year_orders = Order::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as create_date'), DB::raw("count(created_at) AS count_accourding_to_date"), DB::raw('group_concat(id) as ids'))->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'),[Carbon::now()->startOfYear()->toDateString(), Carbon::now()->endOfYear()->toDateString()])->groupBy('create_date')->get();

		$current_year_revenue = Payment::select(DB::raw('DATE_FORMAT(created_at, "%M") as payment_date'),DB::raw("sum(pay_amount) AS amount_accourding_to_month"),DB::raw('group_concat(id) as ids'))->groupBy('payment_date')->whereBetween(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d")'),[Carbon::now()->startOfYear()->toDateString(), Carbon::now()->endOfYear()->toDateString()])->get();

		 $last_10_orders = Order::select("*", DB::raw('(SELECT full_name from users WHERE users.id = orders.user_id) AS user_name'), DB::raw('CASE WHEN payment_received = 1 THEN "Yes" ELSE "No" END as payment_received'), DB::raw('CONCAT("₹",total_amount) AS total_amount'), DB::raw('CONCAT("₹",discount_amount_for_coupon) AS discount_amount_for_coupon'), DB::raw('CONCAT("₹",pay_amount) AS pay_amount'), DB::raw('DATE_FORMAT(created_at, "%m-%d-%Y") AS date_show'))->with('payment','productOrders','BillingShippingAddress','user')->orderBy("id","desc")->take(10)->get();


		return view('admin.dashboard',compact('total_users','total_blocked_users','total_number_payments','total_coupons','totalRevenue','totalProducts','totalOrders','current_year_orders','current_year_revenue','last_10_orders'));
	}

	public function number_format_short( $n, $precision = 1 ) {
		if ($n < 900) {
			// 0 - 900
			$n_format = number_format($n, $precision);
			$suffix = '';
		} else if ($n < 900000) {
			// 0.9k-850k
			$n_format = number_format($n / 1000, $precision);
			$suffix = 'K';
		} else if ($n < 900000000) {
			// 0.9m-850m
			$n_format = number_format($n / 1000000, $precision);
			$suffix = 'M';
		} else if ($n < 900000000000) {
			// 0.9b-850b
			$n_format = number_format($n / 1000000000, $precision);
			$suffix = 'B';
		} else {
			// 0.9t+
			$n_format = number_format($n / 1000000000000, $precision);
			$suffix = 'T';
		}
	
	  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
	  // Intentionally does not affect partials, eg "1.50" -> "1.50"
		if ( $precision > 0 ) {
			$dotzero = '.' . str_repeat( '0', $precision );
			$n_format = str_replace( $dotzero, '', $n_format );
		}
	
		return $n_format . $suffix;
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
