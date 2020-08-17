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
    Route::GET('/home', 'HomeController@index')->name('home');
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
    Route::GET('/edit_attendance', 'AttendanceController@edit_attendance')->name('edit_attendance');
    Route::POST('/update_attendance', 'AttendanceController@update_attendance')->name('update_attendance');

    //Deduction
    Route::GET('/deduction', 'DeductionController@index')->name('deduction');
    Route::GET('/esic_deduction', 'DeductionController@esic_deduction')->name('esic_deduction');
    Route::POST('/save_deduction', 'DeductionController@save_deduction')->name('save_deduction');
    Route::GET('/ptax', 'DeductionController@ptax')->name('ptax');
    Route::POST('/save_ptax', 'DeductionController@save_ptax')->name('save_ptax');
    Route::GET('/manage_deduction', 'DeductionController@manage_deduction')->name('manage_deduction');
    Route::GET('/delete_deduction', 'DeductionController@delete_deduction')->name('delete_deduction');

    Route::POST('Notification','NotificationController@index')->name('Notification');
    Route::POST('read','NotificationController@read')->name('read');

//    //Company Deduction
//    Route::GET('/company_deduction', 'DeductionController@company_deduction')->name('company_deduction');
//    Route::POST('/save_company_deduction', 'DeductionController@save_company_deduction')->name('save_company_deduction');
//    Route::GET('/edit_company_deduction', 'DeductionController@edit_company_deduction')->name('edit_company_deduction');
//    Route::POST('/update_company_deduction', 'DeductionController@update_company_deduction')->name('update_company_deduction');

    //Leave
    Route::GET('/manage_leave', 'LeaveCotroller@manage_leave')->name('manage_leave');
    Route::GET('/leave', 'LeaveCotroller@index')->name('leave');
    Route::POST('/save_leave', 'LeaveCotroller@save_leave')->name('save_leave');
    Route::GET('/manage_loan', 'LeaveCotroller@manage_loan')->name('manage_loan');
    Route::GET('/loan', 'LeaveCotroller@loan')->name('loan');
    Route::POST('/save_loan', 'LeaveCotroller@save_loan')->name('save_loan');

    Route::GET('/searchByCompany', 'EmployeeController@searchByCompany')->name('searchByCompany');
    Route::GET('/searchByCompany_salary', 'SalaryController@searchByCompany_salary')->name('searchByCompany_salary');
    Route::GET('/searchByCompany_manageSalary', 'SalaryController@searchByCompany_manageSalary')->name('searchByCompany_manageSalary');
    Route::GET('/searchByCompany_attendance', 'AttendanceController@searchByCompany_attendance')->name('searchByCompany_attendance');
    Route::GET('/searchByCompany_leave', 'LeaveCotroller@searchByCompany_leave')->name('searchByCompany_leave');
    Route::GET('/searchByCompany_loan', 'LeaveCotroller@searchByCompany_loan')->name('searchByCompany_loan');
    Route::GET('/searchByCompany_manageAttendance', 'AttendanceController@searchByCompany_manageAttendance')->name('searchByCompany_manageAttendance');

    Route::GET('/manage_company_basic', 'SalaryController@manage_company_basic')->name('manage_company_basic');
    Route::GET('/company_basic', 'SalaryController@company_basic')->name('company_basic');
    Route::POST('/save_company_basic', 'SalaryController@save_company_basic')->name('save_company_basic');
    Route::POST('/save_esic_basic', 'SalaryController@save_esic_basic')->name('save_esic_basic');
    Route::POST('/save_pf_basic', 'SalaryController@save_pf_basic')->name('save_pf_basic');
    Route::POST('/save_overtime_basic', 'SalaryController@save_overtime_basic')->name('save_overtime_basic');
    Route::POST('/save_company_deduction', 'SalaryController@save_company_deduction')->name('save_company_deduction');


    Route::GET('/setting', 'SettingController@index')->name('setting');
    Route::POST('/save_setting', 'SettingController@save_setting')->name('save_setting');

    Route::GET('/findEmployee', 'ExcelController@findEmployee')->name('findEmployee');

    Route::GET('/excel', 'ExcelController@index')->name('excel');
    Route::GET('/import', 'EmployeeController@import_index')->name('import');
    Route::POST('printImport', 'EmployeeController@import')->name('printImport');
    Route::GET('/salary_excel', 'ExcelController@salary_excel')->name('salary_excel');

    Route::GET('/declaration_excel_form', 'ExcelController@declaration_excel_form')->name('declaration_excel_form');
    Route::GET('/declaration_excel', 'ExcelController@declaration_excel')->name('declaration_excel');

    Route::GET('/employeeCard_excel_form', 'ExcelController@employeeCard_excel_form')->name('employeeCard_excel_form');
    Route::GET('/employeeCard_excel', 'ExcelController@employeeCard_excel')->name('employeeCard_excel');

    Route::GET('/formI_excel_form', 'ExcelController@formI_excel_form')->name('formI_excel_form');
    Route::GET('/formI_excel', 'ExcelController@formI_excel')->name('formI_excel');

    Route::GET('/form35_excel_form', 'ExcelController@form35_excel_form')->name('form35_excel_form');
    Route::GET('/form35_excel', 'ExcelController@form35_excel')->name('form35_excel');

    Route::GET('/form2R_excel_form', 'ExcelController@form2R_excel_form')->name('form2R_excel_form');
    Route::GET('/form2R_excel', 'ExcelController@form2R_excel')->name('form2R_excel');

    Route::GET('/form11_excel_form', 'ExcelController@form11_excel_form')->name('form11_excel_form');
    Route::GET('/form11_excel', 'ExcelController@form11_excel')->name('form11_excel');

    Route::GET('/formF_excel_form', 'ExcelController@formF_excel_form')->name('formF_excel_form');
    Route::GET('/formF_excel', 'ExcelController@formF_excel')->name('formF_excel');

    Route::GET('/Recr_excel_form', 'ExcelController@Recr_excel_form')->name('Recr_excel_form');
    Route::GET('/Recr_excel', 'ExcelController@Recr_excel')->name('Recr_excel');

    Route::GET('/APT_excel_form', 'ExcelController@APT_excel_form')->name('APT_excel_form');
    Route::GET('/APT_excel', 'ExcelController@APT_excel')->name('APT_excel');

    Route::GET('/Icard_excel_form', 'ExcelController@Icard_excel_form')->name('Icard_excel_form');
    Route::GET('/Icard_excel', 'ExcelController@Icard_excel')->name('Icard_excel');

    Route::GET('/IcardReg_excel_form', 'ExcelController@IcardReg_excel_form')->name('IcardReg_excel_form');
    Route::GET('/IcardReg_excel', 'ExcelController@IcardReg_excel')->name('IcardReg_excel');

    Route::GET('/Form13_excel_form', 'ExcelController@Form13_excel_form')->name('Form13_excel_form');
    Route::GET('/Form13_excel', 'ExcelController@Form13_excel')->name('Form13_excel');

    Route::GET('/Report_esic_form', 'ExcelController@Report_esic_form')->name('Report_esic_form');
    Route::GET('/Report_esic_excel', 'ExcelController@Report_esic_excel')->name('Report_esic_excel');

    Route::GET('/Report_pf_form', 'ExcelController@Report_pf_form')->name('Report_pf_form');
    Route::GET('/Report_pf_excel', 'ExcelController@Report_pf_excel')->name('Report_pf_excel');//

//    Route::POST('saveToken', 'UserController@saveToken')->name('saveToken');

    Route::GET('/Bonus_form', 'ExcelController@Bonus_form')->name('Bonus_form');
    Route::GET('/Bonus_form_excel', 'ExcelController@Bonus_form_excel')->name('Bonus_form_excel');

    Route::GET('/HalfYear_form', 'ExcelController@HalfYear_form')->name('HalfYear_form');
    Route::GET('/HalfYear_form_excel', 'ExcelController@HalfYear_form_excel')->name('HalfYear_form_excel');

    Route::GET('/FullYear_form', 'ExcelController@FullYear_form')->name('FullYear_form');
    Route::GET('/FullYear_form_excel', 'ExcelController@FullYear_form_excel')->name('FullYear_form_excel');

    Route::GET('/Slip_form', 'ExcelController@Slip_form')->name('Slip_form');
    Route::GET('/Slip_excel', 'ExcelController@Slip_excel')->name('Slip_excel');





});
