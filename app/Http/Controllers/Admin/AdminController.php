<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Session;
use Str;
use Hash;

class AdminController extends Controller
{

	public function showLoginForm(){
		return view('admin.login');
	}

    public function login(Request $request){
    	//return $request->all();

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        //if admin table credential matches put id/details on the session
        $admin = User::where('email' ,$request->email)->first();


  		if ($admin){
            if (password_verify($request->password, $admin->password)) {
                Session::put('admin_id', $admin->id);
                Session::put('admin_name', $admin->name);
                Session::put('admin_role', $admin->role? $admin->role->role : null);


                session()->flash('Success', 'You are successfully logged in');
                return redirect('/admin/dashboard');
            }else {
        		session()->flash('Error', 'Password does not match');
                return redirect()->back();
            }
        }else {
        	session()->flash('Error', 'Email does not match');
            return redirect()->back();
        }
        //redirect to dashboard

    }

    public function dashboard(){
    	return view('admin.dashboard');
    }


    public function logout(Request $request){
    	// return $request;
    	$request->session()->flush();
    	return redirect('admin/login');
    }

    public function roles(){
        return view('admin.admin.roles');
    }

    public function roleStore(Request $request){
        // return $request->all();

        $request->validate([
            'role' => 'unique:roles'
        ]);

        $role = new Role();
        $role->role = 'admin';
        $role->permissin = 'admin';

        $role->save();
        session()->flash('Success', 'Role saved successfully');
        return redirect()->back();
    }

    public function roleDelete(Request $request, $id){

        $role = Role::find($id);

        if ($role == null) {
            return redirect()->back();
        }

        // set null for this role in admin table
        $admins = User::where('role', $role->slug)->get();

        foreach ($admins as $admin) {
            $admin->role = null;
            $admin->save();
        }

        // delete this role
        $role->delete();

        session()->flash('Success', 'Role deleted successfully');
        return redirect()->back();
    }

    public function index(){
        return view('admin.admin.index');
    }

    public function create(){
        return view('admin.admin.create');
    }

    public function store(Request $request){

        $request->validate([
            'password' => 'min:6'
        ]);

        // return $request->all();
        $admin = new User();
        $admin->name = $request->name;
        $admin->role = $request->role;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $admin->save();

        session()->flash('Success', 'Admin saved successfully');
        return redirect('admin/admin/index');
    }

    public function edit($id){

        $admin = User::find($id);

        if ($admin == null) {
            return redirect()->back();
        }

        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id){

        $admin = User::find($id);

        if ($admin == null) {
            return redirect()->back();
        }

        // if admin role is being changed and  no admin is left, then he cant change the role
        if($admin->role == 'admin' && $request->role != 'admin'){
            $other_admins_count = User::where('role', 'admin')->where('id', '!=', $admin->id)->get()->count();
            if($other_admins_count == 0){
                session()->flash('Error', 'You can not change your role as there is no admin left');
                return redirect()->back();
            }
        }

        // return $request->all();
        $admin->name = $request->name;
        $admin->role = $request->role;
        $admin->email = $request->email;

        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        session()->flash('Success', 'Admin updated successfully');
        return redirect('admin/admin/index');
    }

    public function delete(Request $request, $id){

        $admin = User::find($id);

        if ($admin == null) {
            return redirect()->back();
        }

        $admin->delete();

        session()->flash('Success', 'Admin deleted successfully');
        return redirect('admin/admin/index');
    }

    public function editRolePermission($id){
        $role = Role::find($id);

        if ($role == null || $role->slug == 'admin') {
            return redirect()->back();
        }

        return view('admin.admin.editRolePermission', compact('role'));
    }

    public function updateRolePermission(Request $request, $id){
        // return $request->all();
        $role = Role::find($id);

        if ($role == null || $role->slug == 'admin') {
            return redirect()->back();
        }

        $role->permissions = $request->permissions ? json_encode($request->permissions) : null;
        // dd($role->permissions);
        $role->save();

        session()->flash('Success', 'Role permission updated successfully');
        return redirect()->back();

        // dd(json_encode($request->permissions));

        // dd($id);
    }


}
