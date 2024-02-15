<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Auth;

class RolesController extends Controller {
	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function rolesList(Request $request) {
		$roles = Role::where('id', '!=', 1)->get();
		return view('admin/roles/roles_list', ['roles' => $roles]);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function viewRole($id) {
		$role = Role::find($id);
		$permissions = \DB::table('permission_role')->where('role_id', $role->id)->get();
		return view('admin/roles/view_role', [
			'role' => $role,
			'permissions' => $permissions,
		]);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function addRole(Request $request) {
		return view('admin/roles/add_role');
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function saveRole(Request $request) {
		$nameToLowercase = strtolower($request->role_name);
		$roleTag = $name = str_replace(' ', '_', $nameToLowercase);
		$role = Role::where("tag", $roleTag)->get();
		if(count($role) <= 0) {
			$role = new Role;
			$role->name = $request->role_name;
			$role->tag = $roleTag;
			$role->status = 1;
			if($role->save()) {
				$roles = Role::where('id', '!=', 1)->get();
				return redirect()->route('roles_list', ['roles' => $roles])->with('success', 'Role Added successfully!');
			}
			else {
				return redirect()->back()->with('error', 'Something went wrong!');
			}
		}
		else {
			$roles = Role::where('id', '!=', 1)->get();
			return redirect()->route('roles_list', ['roles' => $roles])->with('error', 'The Role already exists! Please edit the Role if you want to make any changes.');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function editRole($id) {
		$role = Role::find($id);
		return view('admin/roles/edit_role', [
			'role' => $role
		]);
	}

	/**
	 * This function is used to Update Role
	*/
	public function updateRole(Request $request) {
		$updateRole = Role::where('id', $request->id)->update([
			'name' => $request->name
		]);
		if($updateRole) {
			$roles = Role::orderByDesc('id')->get();
			return redirect()->route('roles_list', ['roles' => $roles])->with('success', 'Role Updated successfully!');
		}

	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function getRolePermissions(Request $request) {
		$rolePermissions = \DB::table('permission_role')->where('role_id', $request->role_id)->get();
		return json_encode($rolePermissions);
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function rolePermissions(Request $request) {
		{
			$roles = Role::where('id', '!=', 1)->get();
			// $roles = Role::all();
			if($roles->isNotEmpty()) {
				
				$adminsPermissions = Permission::where('module_slug', 'admins')->orderBy('name', 'desc')->get();
				$usersPermissions = Permission::where('module_slug', 'users')->orderBy('name', 'desc')->get();
				$rolesPermissions = Permission::where('module_slug', 'roles')->orderBy('name', 'desc')->get();
				$accessPermissions = Permission::where('module_slug', 'permissions')->orderBy('name', 'desc')->get();
				$categoriesPermissions = Permission::where('module_slug', 'categories')->orderBy('name', 'desc')->get();
				$subcategoriesPermissions = Permission::where('module_slug', 'sub-categories')->orderBy('name', 'desc')->get();
				$attributesPermissions = Permission::where('module_slug', 'attributes')->orderBy('name', 'desc')->get();
				$productsPermissions = Permission::where('module_slug', 'products')->orderBy('name', 'desc')->get();

				$couponsPermissions = Permission::where('module_slug', 'coupons')->orderBy('name', 'desc')->get();

				$ordersPermissions = Permission::where('module_slug', 'orders')->orderBy('name', 'desc')->get();

				$paymentsPermissions = Permission::where('module_slug', 'payments')->orderBy('name', 'desc')->get();

				$ourClientsPermissions = Permission::where('module_slug', 'our-clients')->orderBy('name', 'desc')->get();

				$contactUsPermissions = Permission::where('module_slug', 'contact-us')->orderBy('name', 'desc')->get();
				

				return view('admin/roles/role_permissions', [
					'roles' => $roles,
					'adminsPermissions' => $adminsPermissions,
					'usersPermissions' => $usersPermissions,
					'rolesPermissions' => $rolesPermissions,
					'accessPermissions' => $accessPermissions,
					'categoriesPermissions' => $categoriesPermissions,
					'subcategoriesPermissions' => $subcategoriesPermissions,
					'attributesPermissions' => $attributesPermissions,
					'productsPermissions' => $productsPermissions,
					'couponsPermissions' => $couponsPermissions,
					'ordersPermissions' => $ordersPermissions,
					'paymentsPermissions' => $paymentsPermissions,
					'ourClientsPermissions' => $ourClientsPermissions,
					'contactUsPermissions' => $contactUsPermissions
				]);
			}
			else {
				return redirect()->route('add_role')->with('warning', 'No Roles Found! Please add a Role first.');
			}
		}
		
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function saveRolePermissions(Request $request) {
		$role = Role::find($request->role_id);
		$updatePermissions = $role->permissions()->sync($request->permissions);
		if($updatePermissions) {
			$roles = Role::where('id', '!=', 1)->get();
			return back()->with('success', 'Role Permissions Added successfully!');
		}
		else {
			return redirect()->back()->with('error', 'Something went wrong!');
		}
	}

	/**
	 * This function is used to Show Saved Jobs Listing
	*/
	public function deleteRole(Request $request) {
		$role = Role::find($request->id);
		\DB::table('permission_role')->where('role_id', $request->id)->update(['deleted_at' => \Carbon\Carbon::now()]);
		\DB::table('admins')->where('role_id', $request->id)->update(['deleted_at' => \Carbon\Carbon::now()]);
		$deleteRole = $role->delete();
		if($deleteRole) {
			$roles = Role::all();
			$res['success'] = 1;
			$res['data'] = $roles;
			return json_encode($res);
		}
		else {
			$res['success'] = 0;
			return json_encode($res);
		}
	}

	/**
	 * This function is used to Show deleted Roles
	*/
	public function deletedRoles() {
		if(Auth::user()->can('restore_roles')) {
			$deletedRoles = Role::onlyTrashed()->orderByDesc('id')->get();
			return view('admin/roles/deleted_roles_list', ['deletedRoles' => $deletedRoles]);
		}
		else {
			return redirect()->route('dashboard')->with('warning', 'You do not have permission for this action!');
		}
	}



	public function getAllPermissions(Request $request) {
		$permissions = Permission::all();
		for ($i=0; $i < count($permissions); $i++) { 
			echo $permissions[$i]->id.' : '.$permissions[$i]->slug."<br>";
			echo "\n";
		}
	}

	public function getUserPermissions(Request $request) {
		$user = $request->user();
		$permissions = $user->role->permissions;
		for ($i=0; $i < count($permissions); $i++) { 
			echo $permissions[$i]->id.' : '.$permissions[$i]->slug."<br>";
			echo "\n";
		}
	}

	
}
