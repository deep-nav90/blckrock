<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Role;
use Auth;
use Illuminate\Support\Facades\Validator;
use Hash;

class AdminsController extends Controller {
	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:recruiters'],
			'role' => ['required']
		]);
	}
	/**
	 * This function is used to Show Admins Listing
	*/
	public function adminsList(Request $request) {

		{
			$adminsList = Admin::where('role_id','!=', 1)
								->where('id', '!=', Auth::id())
								->orderBy('id', 'desc')->get();
			return view('admin/admins/admins_list', ['adminsList' => $adminsList]);
		}
	}

	/**
	 * This function is used to Show Admins Listing
	*/
	public function addAdmin(Request $request) {
		$roles = Role::orderBy('name')->where('id', '!=', 1)->get();
		return view('admin/admins/add_admin', ['roles' => $roles]);
	}

	/**
	 * This function is used to Show Admins Listing
	*/
	public function saveAdmin(Request $request) {

		$validatedData = $request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:admins',
			'role_id' => 'required',
			'password' => 'required',
		], [
			'first_name.required' => 'First Name is required',
			'last_name.required' => 'Last Name is required',
			'email.required' => 'Email is required',
			'email.email' => 'Email is not valid',
			'email.unique' => 'Email must be unique',
			'role_id.required' => 'Role is required',
			'password.required' => 'Password is required',
		]);

		$admin = new Admin;
		$admin->first_name = $request->first_name;
		$admin->last_name = $request->last_name;
		$admin->email = $request->email;
		$admin->role_id = $request->role_id;
		$admin->password = Hash::make($request->password);
		if($admin->save()) {
			return redirect()->route('admins_list', ['admin' => $admin])->with('success', 'Admin Creaed Successfully!');
		}
		else {
			return redirect()->back()->with('error', 'Something went wrong!');
		}
		return view('admin/admins/add_admin');
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function viewAdmin($id) {
		if(Auth::user()->can('view_admin')) {
			$viewAdmin = Admin::where('id', $id)->get();
			$deletedAdmins = Admin::onlyTrashed()->get();
			if($viewAdmin->isNotEmpty()) {
				return view('admin/admins/view_admin', ['viewAdmin' => $viewAdmin]);
			}
			else {
				return view('admin/admins/view_admin', ['viewAdmin' => $deletedAdmins]);
			}
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}

	/**
	 * This function is used to Show Admins Listing
	*/
	public function editAdmin($id) {
		$roles = Role::orderBy('name')->where('id', '!=', 1)->get();

		$admin = Admin::where('id', $id)->get();
			return view('admin/admins/edit_admin', ['roles' => $roles, 'admin' => $admin]);
		
	}

	/**
	 * This function is used to Show Admins Listing
	*/
	public function updateAdmin(Request $request) {
		$validatedData = $request->validate([
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'role_id' => 'required',
		], [
			'first_name.required' => 'First Name is required',
			'last_name.required' => 'Last Name is required',
			'email.required' => 'Email is required',
			'email.email' => 'Email is not valid',
			'role_id.required' => 'Role is required',
		]);
		if($request->password != ""){
			$updateAdmin = Admin::where('id', $request->id)->update([
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'role_id' => $request->role_id,
				'password' => Hash::make($request->password)
			]);	
		}else{
			$updateAdmin = Admin::where('id', $request->id)->update([
				'first_name' => $request->first_name,
				'last_name' => $request->last_name,
				'role_id' => $request->role_id
			]);
		}
		
		if($updateAdmin) {
			$adminsList = Admin::where('role_id', 1)->get();
			return redirect()->route('admins_list', ['adminsList' => $adminsList])->with('success', "Admin Updated Successfully!");
		}
		else {
			return back()->with('error', "Something went wrong! Please try again.");
		}
	}



	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function deleteAdmin(Request $request) {
		
		if(Auth::user()->can('delete_admin')) {
			
			$deleteAdmin = Admin::where('id', $request->id)->delete();
			if($deleteAdmin) {
				$res['success'] = 1;
				return json_encode($res);
			}
			else {
				$res['success'] = 0;
				return json_encode($res);
			}
		}else {
			$res['success'] = 0;
			return json_encode($res);
		}

	}

	

	

	public function checkEmail(Request $request){
		$findEmail = Admin::whereEmail($request->email)->whereDeletedAt(null)->first();
		if($findEmail){
			return true;
		}else{
			return false;
		}
	}
}
