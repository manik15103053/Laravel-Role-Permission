<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return view('backend.pages.role.index',compact('roles'));
    }
    public function create(){

        $permissions = Permission::all();
        $permission_group = User::getPermissionGroup();

        return view('backend.pages.role.create',compact('permissions','permission_group'));
    }
    public function store(Request $request){
        $this->validate($request,[

            'name'  =>  'required|max:50|unique:roles',
        ],[

            'name.required' => 'Please Give a Role Name'
        ]);
       $role =  Role::create([
            'name' => $request->name,
        ]);
        $permissions = $request->input('permissions');
        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }
        return redirect()->route('roles')->with('msg','Role Created Successfully');
    }
    public function edit($id){
        $role = Role::findById($id);
        $permissions = Permission::all();
        $permission_group = User::getPermissionGroup();


        return view('backend.pages.role.edit',compact('permission_group','permissions','role'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[

            'name'  =>  'required|max:50',
        ],[

            'name.required' => 'Please Give a Role Name'
        ]);
        $role = Role::findById($id);
        $role->name =  $request->name;
        $role->save();
        $permissions = $request->input('permissions');
        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }
        return redirect()->route('roles')->with('msg','Role Updated Successfully');
    }
}
