<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 Route::get('/', function () {
     return view('welcome');
 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Role Permission Route
Route::prefix('admins')->group(function(){
    Route::get('/',[BackendController::class,'index'])->name('admin.dashboard');
    Route::prefix('roles')->group(function (){
        Route::get('/',[RoleController::class,'index'])->name('roles');
        Route::get('/create',[RoleController::class,'create'])->name('role.create');
        Route::post('/store',[RoleController::class,'store'])->name('role.store');
        Route::get('/edit/{id}',[RoleController::class,'edit'])->name('role.edit');
        Route::post('/update/{id}',[RoleController::class,'update'])->name('role.update');
        Route::get('/delete/{id}',[RoleController::class,'delete'])->name('role.delete');
    });
    Route::prefix('admins')->group(function(){
        Route::get('/',[AdminController::class,'index'])->name('admins');
        Route::get('/create',[AdminController::class,'create'])->name('admin.create');
        Route::post('/store',[AdminController::class,'store'])->name('admin.store');
        Route::get('/edit{id}',[AdminController::class,'edit'])->name('admin.edit');
        Route::post('/update/{id}',[AdminController::class,'update'])->name('admin.update');
        Route::get('/delete/{id}',[AdminController::class,'delete'])->name('admin.delete');
    });
    //login Routes
    Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login/submit',[LoginController::class,'login'])->name('admin.login.submit');

    //Logout Routes
    Route::get('/logout/submit',[LoginController::class,'logout'])->name('admin.logout');
});


