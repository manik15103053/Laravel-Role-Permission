<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        return view('backend.pages.role.create',compact('permissions'));
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
}
