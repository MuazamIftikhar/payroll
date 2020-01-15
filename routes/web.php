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


Auth::routes();
Route::group([ 'middleware' => ['auth']], function() {
    Route::GET('/', 'HomeController@index')->name('home');
    //Account
    Route::GET('/add_account', 'AccountController@index')->name('add_account');
    Route::GET('/add_company', 'AccountController@company')->name('add_company');
    Route::POST('/save_account', 'AccountController@create')->name('save_account');
    Route::GET('/manage_account', 'AccountController@manageAccount')->name('manage_account');
    Route::GET('/edit_user', 'AccountController@edit_user')->name('edit_user');
    Route::POST('/update_user', 'AccountController@update_user')->name('update_user');
    Route::GET('/delete_user', 'AccountController@delete_user')->name('delete_user');
    //Estimation
    Route::GET('/est', 'EstimationController@index')->name('est');
    Route::POST('/save_est', 'EstimationController@create')->name('save_est');
    Route::GET('/manage_estimation', 'EstimationController@manage_estimation')->name('manage_estimation');
    Route::GET('/delete_est', 'EstimationController@delete_est')->name('delete_est');
    //Employee
    Route::GET('/employee', 'EmployeeController@index')->name('employee');
    Route::POST('/save_employee', 'EmployeeController@create')->name('save_employee');
    Route::GET('/manage_employee', 'EmployeeController@manage_employee')->name('manage_employee');
    Route::GET('/edit_employee', 'EmployeeController@edit_employee')->name('edit_employee');
    Route::POST('/update_employee', 'EmployeeController@update_employee')->name('update_employee');
    Route::GET('/delete_employee', 'EmployeeController@delete_employee')->name('delete_employee');
    //Salary_head
    Route::GET('/salary_head', 'SalaryController@index')->name('salary_head');
    Route::POST('/save_salary_head', 'SalaryController@create')->name('save_salary_head');
    Route::GET('/edit_salary_head', 'SalaryController@edit_salary_head')->name('edit_salary_head');
    Route::POST('/update_salary_head', 'SalaryController@update_salary_head')->name('update_salary_head');
    Route::GET('/delete_salary_head', 'SalaryController@delete_salary_head')->name('delete_salary_head');
    //Salary
    Route::GET('/salary', 'SalaryController@salary')->name('salary');
    Route::POST('/save_salary', 'SalaryController@save_salary')->name('save_salary');
    Route::GET('/manage_salary', 'SalaryController@manage_salary')->name('manage_salary');
    Route::GET('/edit_salary', 'SalaryController@edit_salary')->name('edit_salary');
    Route::POST('/update_salary', 'SalaryController@update_salary')->name('update_salary');
    Route::GET('/manage_salary_month', 'SalaryController@manage_salary_month')->name('searchByMonth_salary');

    //Attendance
    Route::GET('/attendance', 'AttendanceController@index')->name('attendance');
    Route::POST('/save_attendance', 'AttendanceController@save_attendance')->name('save_attendance');
    Route::GET('/manage_attendance', 'AttendanceController@manage_attendance')->name('manage_attendance');
    Route::GET('/delete_attendance', 'AttendanceController@delete_attendance')->name('delete_attendance');


});
