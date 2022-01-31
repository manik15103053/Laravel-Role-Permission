<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
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
//        if(is_null($this->user) || !$this->user->can('role.view')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        $roles = Role::all();
        return view('backend.pages.role.index',compact('roles'));
    }
    public function create(){
//        if(is_null($this->user) || !$this->user->can('role.create')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        $permissions = Permission::all();
        $permission_group = User::getPermissionGroup();

        return view('backend.pages.role.create',compact('permissions','permission_group'));
    }
    public function store(Request $request){
//        if(is_null($this->user) || !$this->user->can('role.create')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        $this->validate($request,[

            'name'  =>  'required|max:50|unique:roles',
        ],[

            'name.required' => 'Please Give a Role Name'
        ]);
       $role =  Role::create([
            'name' => $request->name,
            'guard_name' => 'admin'
        ]);
        $permissions = $request->input('permissions');
        if(!empty($permissions)){
            $role->syncPermissions($permissions);
        }
        return redirect()->route('roles')->with('msg','Role Created Successfully');
    }
    public function edit($id){
//        if(is_null($this->user) || !$this->user->can('role.edit')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        $role = Role::findById($id ,'admin');
        $permissions = Permission::all();
        $permission_group = User::getPermissionGroup();


        return view('backend.pages.role.edit',compact('permission_group','permissions','role'));
    }
    public function update(Request $request,$id){
//        if(is_null($this->user) || !$this->user->can('role.edit')){
//            abort(403,'Unauthorized Access');
//        }
        $this->validate($request,[

            'name'  =>  'required|max:50|unique:roles,name,'.$id,
        ],[

            'name.required' => 'Please Give a Role Name'
        ]);
        $role = Role::findById($id ,'admin');
        $role->name =  $request->name;
        $role->save();
        $permissions = $request->input('permissions');
//        if(!empty($permissions)){
//            $role->syncPermissions($permissions);
//        }
        return redirect()->route('roles')->with('msg','Role Updated Successfully');
    }
    public function delete($id ){
//        if(is_null($this->user) || !$this->user->can('role.delete')){
//            abort(403,'Sorry !! You are Unauthorized to Access ');
//        }
        Role::find($id)->delete();
        return redirect()->route('roles')->with('msg','Role Deleted Successfully');
    }
}
