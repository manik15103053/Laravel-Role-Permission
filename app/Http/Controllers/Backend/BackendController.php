<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BackendController extends Controller
{
//    public $user;
//
//    public function __construct(){
//        $this->middleware(function ($request , $next){
//            $this->user = Auth::guard('admin')->user();
//            return $next($request);
////        });
//    }
    public function index(){
//        if(is_null($this->user) || !$this->user->can('dashboard.view')){
//            abort(403,'Sorry !! You are Unauthorized to Access');
//        }
        $all_roles  = Role::select('id')->get();
        $all_admins  = Admin::select('id')->get();
        $all_permissions  = Permission::select('id')->get();
        return view('backend.pages.dashboard.index',compact('all_permissions','all_admins','all_roles'));
    }
}
