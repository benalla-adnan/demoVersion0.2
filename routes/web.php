<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ProfileController;


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
    Route::get('/profile/{id}',[ProfileController::class,'index']);

    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::get('/logout', 'Backend\Auth\LoginController@logout');

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
    
    Route::post('/import',[LeadController::class,'import']);

    // Admin Projects 
    Route::get('project',[ProjectController::class,'list'])->name('admin.project');
    Route::get('/delete-project/{id}',[ProjectController::class,'destroy']);
    Route::post('/delete-project/{id}',[ProjectController::class,'destroy']);
    Route::get('/create-project',[ProjectController::class,'createProject'])->name('admin.create-project');
    Route::post('/create-project',[ProjectController::class,'storeProject']);
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


    //Admin Settings
    Route::get('/settings',[SettingsController::class,'index'])->name('admin.settings');
    // languages settings
    Route::get('/languages',[SettingsController::class,'languages'])->name('admin.language');
    Route::get('/edit-language/{id}',[SettingsController::class,'editLanguage']);
    Route::get('/add-language',[SettingsController::class,'createLanguage'])->name('admin.createlanguage');
    Route::post('/add-language',[SettingsController::class,'storeLanguage']);

    // Currencies settings
    Route::get('/currencies',[SettingsController::class,'currencies'])->name('admin.currencies');
    Route::get('/add-currencie',[Settingscontroller::class,'createCurrency'])->name('admin.createcurrencies');
    Route::post('/add-currencie',[Settingscontroller::class,'storeCurrency']);
    Route::get('/edit-currencie/{id}',[SettingsController::class,'editCurrency']);
    Route::post('/edit-currencie/{id}',[SettingsController::class,'updateCurrency']);
    Route::get('/delete-currency/{id}',[Settingscontroller::class,'destroyCurrency']);
    Route::post('/delete-currency/{id}',[Settingscontroller::class,'destroyCurrency']);

    //Lead status Settings
    Route::get('/LeadStatus',[SettingsController::class,'leadStatus'])->name('admin.leadStatus');
    Route::get('/add-lead_status',[Settingscontroller::class,'createLeadStatus'])->name('admin.createLeadStatus');
    Route::post('/add-lead_status',[Settingscontroller::class,'storeLeadStatus']);
    Route::get('/edit-lead_status/{id}',[SettingsController::class,'editLeadStatus']);
    Route::post('/edit-lead_status/{id}',[SettingsController::class,'updateLeadStatus']);
    Route::get('/delete-lead_status/{id}',[Settingscontroller::class,'destroyLeadStatus']);
    Route::post('/delete-lead_status/{id}',[Settingscontroller::class,'destroyLeadStatus']);

    //lead source Settings
    Route::get('/LeadSource',[SettingsController::class,'leadSource'])->name('admin.leadSource');
    Route::get('/edit-lead_source/{id}',[SettingsController::class,'editLeadSource']);
    Route::post('/edit-lead_source/{id}',[SettingsController::class,'updateLeadSource']);
    Route::get('/add-lead_source',[Settingscontroller::class,'createLeadSource'])->name('admin.createLeadSource');
    Route::post('/add-lead_source',[Settingscontroller::class,'storeLeadSource']);
    Route::get('/delete-lead_source/{id}',[Settingscontroller::class,'destroyLeadSource']);
    Route::post('/delete-lead_source/{id}',[Settingscontroller::class,'destroyLeadSource']);


    
	// Customer
	Route::get('customer/list', 'CustomerController@index')->name('admin.customer');//->middleware(['permission:manage_customer']);
	Route::get('customer_list_pdf', 'CustomerController@customerListPdf');
	Route::get('customer_list_csv', 'CustomerController@customerListCsv');
	Route::post('email-valid-customer', 'CustomerController@validateCustomerEmail');
	Route::get('create-customer', 'CustomerController@createCustomer');//->middleware(['permission:add_customer']);
	Route::post('create-customer', 'CustomerController@storeCustomer');
	Route::get('/edit-customer/{id}', 'CustomerController@editCustomer');//->middleware(['permission:edit_customer']);
	Route::post('customer/change-status', 'CustomerController@changeStatus');
	Route::get('customer/order/{id}', 'CustomerController@salesOrder');
	Route::get('customer-ledger-filtering-csv', 'CustomerController@ledegerFilterCsv');
	Route::get('customer-ledger-filtering-pdf', 'CustomerController@ledegerFilterPdf');
	Route::get('customer-quotation-filtering-pdf', 'CustomerController@quotationFilterPdf');
	Route::get('customer-quotation-filtering-csv', 'CustomerController@quotationFilterCsv');
	Route::get('customer/invoice/{id}', 'CustomerController@invoice');
	Route::get('customer/quotation/filtering/{id}', 'CustomerController@customerQuotationFilter');
	Route::get('customer/sales-report-csv', 'CustomerController@invoiceCsv');
	Route::get('customer/sales-report-pdf', 'CustomerController@invoicePdf');
	Route::get('customer/payment/{id}', 'CustomerController@payment')->middleware(['permission:manage_payment']);
	Route::get('customer/payment/filtering/{id}', 'CustomerController@customerPaymentFilter');
	Route::get('customer/payment-report-csv', 'CustomerController@paymentCsv');
	Route::get('customer/payment-report-pdf', 'CustomerController@paymentPdf');
	Route::post('/edit-customer/{id}', 'CustomerController@updateCustomer');
	Route::post('customer/update-password', 'CustomerController@updatePassword');
    Route::get('delete-customer/{id}', 'CustomerController@destroyCustomer');
	Route::post('delete-customer/{id}', 'CustomerController@destroyCustomer');//->middleware(['permission:delete_customer']);
	Route::get('customer/ledger/{id}', 'CustomerController@customerLedger');
	Route::get('customer/adminlogin/{id}', 'CustomerController@adminLogin');
	Route::post('customer/billing-address', 'CustomerController@billingAddress');
	Route::get('customerdownloadCsv', 'CustomerController@downloadCsv');
	Route::get('customerimport', 'CustomerController@import');
	Route::post('customerimportcsv', 'CustomerController@importCustomerCsv');
	Route::post('customer/delete-sales-info', 'CustomerController@deleteSalesInfo');
    Route::post('customer/email_data', 'CustomerController@cusEmailData');
	Route::get('customer/project/{id}', 'CustomerController@project');
	Route::get('customer/projects-csv', 'CustomerController@projectCsv');
	Route::get('customer/projects-pdf', 'CustomerController@projectPdf');
	Route::get('customer/task/{id}', 'CustomerController@task');
	Route::get('customer/tasks-csv', 'CustomerController@taskCsv');
	Route::get('customer/tasks-pdf', 'CustomerController@taskPdf');
	Route::get('customer/ticket/{id}', 'CustomerController@ticket');
	Route::get('customer/tickets-csv', 'CustomerController@ticketCsv');
	Route::get('customer/tickets-pdf', 'CustomerController@ticketPdf');

//task
Route::get('project/task/add/{id}', 'ProjectController@addTask');
Route::get('project/task/add', 'TaskController@addTask');
Route::post('project/task/get-milestone', 'MilestoneController@getMilestone');
Route::post('project/task/store', 'TaskController@taskStore');
Route::get('project/task/edit/{id}', 'TaskController@taskEdit');
Route::post('project/task/edit/{id}', 'TaskController@taskUpdate');
Route::get('project/task/destroy/{id}', 'TaskController@taskDelete');
Route::post('project/task/destroy/{id}', 'TaskController@taskDelete');
Route::get('project/task/view', 'TaskController@index');
Route::post('project/task/change-status', 'TaskController@changeStatus');
Route::get('project/task/get-priority', 'TaskController@getAllPriority');
Route::post('project/task/change-priority', 'TaskController@changePriority');
Route::post('project/task/update-description', 'TaskController@updateDescription');
Route::get('project/task/get-status', 'TaskController@getAllStatus');
Route::post('project/task/store-comment', 'CommentController@store');
Route::post('project/task/update-comment', 'CommentController@update');
Route::post('project/task/delete-comment', 'CommentController@delete');
Route::get('project/task/get_all_assignee', 'TaskController@getAllAssignee');
Route::get('project/task/get_all_user', 'TaskController@getAllUser');
Route::post('project/task/get_rest_assignee', 'TaskController@getRestAssignee');
Route::post('project/task/assign_assignee', 'TaskController@assignMember');
Route::post('project/task/delete-assignee', 'TaskController@deleteAssignee');
Route::post('project/task/store-tag', 'TagController@store');
Route::post('project/task/delete-tag', 'TagController@delete');
Route::get('project/task/get-tag', 'TagController@getAll');
Route::get('project/tasks_pdf', 'TaskController@tasks_pdf');
Route::get('project/tasks_csv', 'TaskController@tasks_csv');
Route::get('project/tasks/timesheet/{id}', 'TaskController@projectTimeSheet')->middleware(['permission:manage_project|own_project']);
Route::post('project/task/timer/delete/{id}', 'TaskController@deleteProjectTimer');
Route::get('projectTaskPdf', 'TaskController@projectTaskPdf');
Route::get('projectTaskCsv', 'TaskController@projectTaskCsv');
    

});
