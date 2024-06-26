<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::view('/', 'welcome')->name('index');
// routes/web.php
Route::view('/userLogin', 'userLogin')->name('userLogin');
Route::post('/userLogIn', [UserController::class, 'userLogIn']);
Route::post('/userRegister',[UserController::class,'userRegister']);
Route::view('/userRegistration','userRegistration');

Route::get('/viewPosts', [PostController::class, 'viewPosts']);

//name of methods
Route::view('/admin/login', 'adminLogin')->name('admin-login');
// Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm']);

Route::post('/admin/login', [AdminController::class, 'adminLogIn']);

Route::view('/admin/add','createAdmin');  
Route::post('/admin/add', [AdminController::class,'addAdmin']); 

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home',[PostController::class, 'viewHome']);
    Route::get('/profile', [UserController::class,'profile']);
    Route::get('/userLogout',[UserController::class,'logout']);
});

Route::group(['middleware' => ['auth:web,admin']], function() {
    Route::view('/createPost', 'create_post');
    Route::post('/createPost', [PostController::class, 'createPost']);
});

Route::group(['middleware' => ['auth:web,admin', 'can:isAdmin']], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin-dashboard');
    Route::get('/adminLogout',[AdminController::class,'logout']);
    Route::get('/addUser', [UserController::class, 'showAddUserForm']);
    Route::post('/addUser', [UserController::class, 'addUser']);
    Route::post('/deleteUser/{id}',[UserController::class,'deleteUser']);
    Route::get('/deletePost/{id}', [PostController::class, 'deletePost']);
    Route::get('/editPost/{id}', [PostController::class, 'editPost']);
    Route::post('/updatePost', [PostController::class, 'updatePost']);
});
Route::get('logout', function() {
    Auth::guard('admin')->logout(); 
    Auth::logout();
    return "logout";
});
