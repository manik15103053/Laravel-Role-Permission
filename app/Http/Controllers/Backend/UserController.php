<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('backend.pages.user.index',compact('users'));
    }
    public function create(){
        $roles = Role::all();
        return view('backend.pages.user.create',compact('roles'));
    }
    public function store(Request  $request){
       $request->validate([
           'name'  => 'required|max:50|min:3',
           'email'  => 'required|max:100|email|unique:users',
           'password'  => 'required|min:6|confirmed'
       ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        if($request->roles){
            $user->assignRole($request->roles);
        }
        return redirect()->route('users')->with('msg','User Created Successfully');

    }
    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.pages.user.edit',compact('user','roles'));
    }
    public function update(Request $request ,$id){
        $request->validate([
            'name'  => 'required|max:50|min:3',
            'email'  => 'required|max:100|email|unique:users,email,'.$id,
            'password'  => 'nullable|min:6|confirmed'
        ]);
        $user =  User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->roles()->detach();
        if($request->roles){
            $user->assignRole($request->roles);
        }
        return redirect()->route('users')->with('msg','User Updated Successfully');
    }
    public function delete($id){
        User::find($id)->delete();
        return redirect()->route('users')->with('msg','User Deleted Successfully');
    }
}
