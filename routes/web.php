<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@redirectAdmin')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);


    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');

    // Admin lead route
    Route::get('/leads',[LeadController::class,'index'])->name('admin.lead');
    Route::get('/edit/{id}',[LeadController::class,'edit']);
    Route::post('/edit/{id}',[LeadController::class,'update']);
    Route::get('/delete-lead/{id}',[LeadController::class,'destroy']);
    Route::post('/delete-lead/{id}',[LeadController::class,'destroy']);
    Route::get('lead-details/{id}',[LeadController::class,'view']);

    // Admin Projects 
    Route::get('project',[ProjectController::class,'list'])->name('admin.project');
    Route::get('/delete-project/{id}',[ProjectController::class,'destroy']);
    Route::post('/delete-project/{id}',[ProjectController::class,'destroy']);
    

});
