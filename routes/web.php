<?php

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

Route::get('/', 'DashboardController@index');

Route::prefix('master')->group(function () {
    Route::resource('bank', 'Master\BankController')->except([
        'show'
    ]);
    Route::resource('blood-type', 'Master\BloodTypeController')->except([
        'show'
    ]);
    Route::resource('department', 'Master\DepartmentController')->except([
        'show'
    ]);
    Route::resource('designation', 'Master\DesignationController')->except([
        'show'
    ]);
    Route::resource('gender', 'Master\GenderController')->except([
        'show'
    ]);
    Route::resource('job-status', 'Master\JobStatusController')->except([
        'show'
    ]);
    Route::resource('marital', 'Master\MaritalController')->except([
        'show'
    ]);
    Route::resource('religion', 'Master\ReligionController')->except([
        'show'
    ]);
    Route::resource('taxes', 'Master\TaxesController')->except([
        'show'
    ]);
});
