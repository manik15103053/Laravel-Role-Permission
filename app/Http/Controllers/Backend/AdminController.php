<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Notifications\VerifyNotification;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
//    public $user;
//
//    public function __construct(){
//        $this->middleware(function ($request , $next){
//            $this->user = Auth::guard('admin')->user();
//            return $next($request);
//        });
//    }
    public function index(){
//        if(is_null($this->user) || !$this->user->can('admin.view')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        $admins = Admin::all();
        return view('backend.pages.admin.index',compact('admins'));
    }
    public function create(){
//        if(is_null($this->user) || !$this->user->can('admin.create')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        $roles = Role::all();
        return view('backend.pages.admin.create',compact('roles'));
    }
    public function store(Request  $request){
//        if(is_null($this->user) || !$this->user->can('admin.create')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
       $request->validate([
           'name'  => 'required|max:50|min:3',
           'email'  => 'required|max:100|email|unique:admins',
           'password'  => 'required|min:6|confirmed'
       ]);
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->save();

        if($request->roles){
            $admin->assignRole($request->roles);
        }
        $admin->notify(new VerifyNotification($admin));

        return redirect()->route('admins')->with('msg','Admin Created Successfully');

    }
    public function edit($id){
//        if(is_null($this->user) || !$this->user->can('admin.edit')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        $admin = Admin::find($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit',compact('admin','roles'));
    }
    public function update(Request $request ,$id){
//        if(is_null($this->user) || !$this->user->can('admin.edit')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        $request->validate([
            'name'  => 'required|max:50|min:3',
            'email'  => 'required|max:100|email|unique:admins,email,'.$id,
            'password'  => 'nullable|min:6|confirmed'
        ]);
        $admin =  Admin::find($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();
        $admin->roles()->detach();
        if($request->roles){
            $admin->assignRole($request->roles);
        }
        return redirect()->route('admins')->with('msg','Admin Updated Successfully');
    }
    public function delete($id){
//        if(is_null($this->user) || !$this->user->can('admin.delete')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        Admin::find($id)->delete();
        return redirect()->route('admins')->with('msg','Admin Deleted Successfully');
    }
}
