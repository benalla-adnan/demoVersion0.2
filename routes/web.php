<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingsController;

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
    Route::get('/create-lead',[LeadController::class,'create'])->name('admin.create');
    Route::post('/create-lead',[LeadController::class,'store']);
    Route::get('/delete-lead/{id}',[LeadController::class,'destroy']);
    Route::post('/delete-lead/{id}',[LeadController::class,'destroy']);
    Route::get('lead-details/{id}',[LeadController::class,'view']);
    Route::get('/export',[LeadController::class,'export']);

    // Admin Projects 
    Route::get('project',[ProjectController::class,'list'])->name('admin.project');
    Route::get('/delete-project/{id}',[ProjectController::class,'destroy']);
    Route::post('/delete-project/{id}',[ProjectController::class,'destroy']);
    Route::get('/create-project',[ProjectController::class,'create'])->name('admin.create-project');
    Route::post('/create-project',[ProjectController::class,'store']);
    //Admin Settings
    Route::get('/settings',[SettingsController::class,'index'])->name('admin.settings');
    Route::get('/languages',[SettingsController::class,'languages']);
    Route::get('/priorities',[SettingsController::class,'priorities']);
    Route::get('/departments',[SettingsController::class,'departments']);


    Route::get('/create-department',[SettingsController::class,'createDepartment'])->name('admin.create-department');
    Route::post('/create-department',[SettingsController::class,'storeDepartment']);
    Route::get('/edit-departments/{id}',[SettingsController::class,'editDepartment']);
    Route::post('/edit-departments/{id}',[SettingsController::class,'updateDepartment']);
    Route::get('/delete-departments/{id}',[SettingsController::class,'destroyDepartment']);
    Route::post('/delete-departments/{id}',[SettingsController::class,'destroyDepartment']);

    Route::get('/create-language',[SettingsController::class,'createLanguage']);
    Route::post('/create-language',[SettingsController::class,'storeLanguage']);
    Route::get('/edit-languages/{id}',[SettingsController::class,'editLanguage']);
    Route::post('/edit-languages/{id}',[SettingsController::class,'updateLanguage']);
    Route::get('/delete-languages/{id}',[SettingsController::class,'destroyLanguage']);
    Route::post('/delete-languages/{id}',[SettingsController::class,'destroyLanguage']);

    Route::get('/create-priority',[SettingsController::class,'createPriorities']);
    Route::post('/create-priority',[SettingsController::class,'storePriorities']);
    Route::get('/edit-priority/{id}',[SettingsController::class,'editPriorities']);
    Route::post('/edit-priority/{id}',[SettingsController::class,'updatePriorities']);
    Route::get('/delete-priority/{id}',[SettingsController::class,'destroyPriorities']);
    Route::post('/delete-priority/{id}',[SettingsController::class,'destroyPriorities']);


    

});
