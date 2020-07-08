<?php
//Auth

use App\ClockRecord;
use App\Company;
use App\Listeners\AlertAdminCompanyRequest;
use App\Mail\AlertAdminNewCompanyRequest;
use App\Mail\Company\StaffApproved;
use App\Mail\CompanyRegisterConfirmation;
use App\paySlip;
use Carbon\Carbon;

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');

Route::get('/register/{company}', 'Company\\RegisterUserController@index')->name('company.register');
Route::post('/register/{company}/user', 'Company\\RegisterUserController@create')->name('company.register.user');


Route::middleware('verified')->group(function () {
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::post('/change-password', 'Auth\ChangePasswordController@store')->name('change.password');
    Route::post('/change-details', 'Auth\AccountController@updateDetails')->name('change.details');

    //Create job
    Route::get('/job/create', 'JobController@index')->name('job.create');
    Route::post('/job/create', 'JobController@create')->name('job.create');
    //register company
    Route::get('/company/register', 'Company\\RegisterCompanyController@create')->name('company.register.create');
    Route::post('/company/register', 'Company\\RegisterCompanyController@store')->name('company.register.store');
    //Clocks
    Route::post('/clockin', 'ClockRecordController@clockIn')->name('clock.in');
    Route::post('/clockout', 'ClockRecordController@clockOut')->name('clock.out');
    //Profile
    Route::get('/account','Auth\\AccountController@index')->name('account');

    Route::middleware('dashboard')->prefix('dashboard')->name('dashboard.')->group(function(){
        Route::get('/','Auth\\DashboardController@index')->name('home');
        //Clocks
        Route::get('/clocks', 'ClockRecordController@index')->name('clocks.index');
        Route::get('clock/{id}/edit', 'ClockRecordController@edit')->name('clocks.edit');
        Route::get('clock/remove/{id}', 'ClockRecordController@destroy')->name('clock.remove');
        //Job Update
        Route::post('/job/update', 'JobController@update')->name('job.update');
        //Shift pattern
        Route::get('/shifts', 'ShiftPatternController@index')->name('shifts');
        Route::post('/shift-pattern/update', 'ShiftPatternController@update')->name('shifts.update');
        //PaySlips
        Route::get('/payslips', 'Company\\PaySlipsController@index')->name('payslips.index');
        Route::get('/payslips/{id}/download', 'Company\\PaySlipsController@downloadPDF')->name('payslips.download');
    });
    //Shift pattern
    Route::post('/shifts/new', 'ShiftPatternController@store')->name('shifts.create');
});

//Admin
Route::middleware(['App\Http\Middleware\AccessAdmin'])->namespace('Admin')->name('admin.')->prefix('admin')->group(function(){
    Route::resource('users', 'UserController');
    Route::get('/', 'AdminController@index')->name('home');
    Route::get('/companies', 'CompanyController@index')->name('company.index');
    Route::get('/notification/{notification}/read', 'NotificationController@read')->name('notification.read');
    Route::get('/company/{id}/approve', 'CompanyController@approve')->name('company.approve');
    Route::get('/company/{id}/deny', 'CompanyController@deny')->name('company.deny');
});
//Company
Route::middleware(['App\Http\Middleware\AccessCompany'])->namespace('Company')->prefix('company')->name('company.')->group(function(){
    //Staff
    Route::get('staff', 'StaffController@index')->name('staff.index');
    Route::get('staff/{id}/approve', 'StaffController@approve')->name('staff.approve');
    Route::get('staff/{id}/deny', 'StaffController@deny')->name('staff.deny');
    Route::get('staff/{id}/reinstate', 'StaffController@reinstate')->name('staff.reinstate');
    Route::post('staff/update', 'StaffController@update')->name('staff.update');
    //Roles
    Route::get('roles', 'RolesController@index')->name('roles.index');
    Route::post('roles/create', 'RolesController@store')->name('role.store');
});

//Test route
Route::get('test', function(){
    $date = Carbon::today();
    $clocks = ClockRecord::where('shiftDate','>=','2020-05-11')
    ->where('shiftDate','<=','2020-05-14')
    ->get();
    dd($clocks);
});
//Mail Test
Route::get('email', function(){
    $company = App\Company::first();
    $user = Auth::user();
    return (new StaffApproved)->render();
});