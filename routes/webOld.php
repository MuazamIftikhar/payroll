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
    Route::GET('/add_rest_booking', 'RestBookingController@index')->name('add_rest_booking');
    Route::POST('/addBooking', 'BookingController@create')->name('addBooking');
    Route::GET('/manage_pick_drop_booking', 'BookingController@manageBooking')->name('manageBooking');

    Route::GET('/showBooking/{id}', 'BookingController@edit')->name('showBooking');
    Route::POST('/editBooking/{id}', 'BookingController@editBooking')->name('editBooking');
    Route::GET('/deleteBooking/{id}', 'BookingController@deleteBooking')->name('deleteBooking');

    Route::GET('/add_transfer_booking', 'TransferController@index')->name('transferBooking');
    Route::POST('/addTransfer', 'TransferController@create')->name('addTransfer');
    Route::GET('/manage_transfer_booking', 'TransferController@manageTransfer')->name('manageTransfer');

    Route::GET('/showTransfer/{id}', 'TransferController@edit')->name('showTransfer');
    Route::POST('/editTransfer/{id}', 'TransferController@editTransfer')->name('editTransfer');
    Route::GET('/deleteTransfer/{id}', 'TransferController@deleteTransfer')->name('deleteTransfer');

    Route::GET('/add_airbaloon_booking', 'AirbalonController@index')->name('Airbalon');
    Route::POST('/addAirbalon', 'AirbalonController@create')->name('addAirbalon');
    Route::GET('/manage_airbaloon_booking', 'AirbalonController@manageAirbalon')->name('manageAirbalon');

    Route::GET('/showAirbalon/{id}', 'AirbalonController@edit')->name('showAirbalon');
    Route::POST('/editAirbalon/{id}', 'AirbalonController@editAirbalon')->name('editAirbalon');
    Route::GET('/deleteAirbalon/{id}', 'AirbalonController@deleteAirbalon')->name('deleteAirbalon');

    Route::GET('/create_user', 'UserController@create_user')->name('create_user');
    Route::POST('/save_user', 'UserController@save_user')->name('save_user');
    Route::GET('/manage_user', 'UserController@manage_user')->name('manage_user');

    Route::GET('/edit_user/{id}', 'UserController@edit_user')->name('edit_user');
    Route::POST('/update_user/{id}', 'UserController@update_user')->name('update_user');
    Route::GET('/delete_user', 'UserController@manage_user')->name('delete_user');//

    Route::POST('/generateXlxByName_pick_drop', 'BookingController@generateXlxByName_pick_drop')->name('generateXlxByName_pick_drop');
    Route::POST('/generateXlxByDate_pick_drop', 'BookingController@generateXlxByDate_pick_drop')->name('generateXlxByDate_pick_drop');

    Route::POST('/generateXlxByName_transfer', 'TransferController@generateXlxByName_transfer')->name('generateXlxByName_transfer');
    Route::POST('/generateXlxByDate_transfer', 'TransferController@generateXlxByDate_transfer')->name('generateXlxByDate_transfer');

    Route::POST('/generateXlxByName_Airbalon', 'AirbalonController@generateXlxByName_Airbalon')->name('generateXlxByName_Airbalon');
    Route::POST('/generateXlxByDate_Airbalon', 'AirbalonController@generateXlxByDate_Airbalon')->name('generateXlxByDate_Airbalon');
    //
    Route::GET('/changeAirbaloonStatus/{id}/{newStatus}', 'AirbalonController@changeAirbaloonStatus')->name('changeAirbaloonStatus');
    Route::POST('/download_airbaloon_booking', 'AirbalonController@downloadSelectedRows')->name('download_airbaloon_booking');
    //
    Route::POST('/searchDataByFields', 'AirbalonController@searchDataByFields')->name('searchDataByFields');
    //
    Route::GET('/clear', function (){
       return redirect()->route('manageAirbalon');
    })->name('/clear');

});
Route::group([ 'middleware' => ['auth','role:owner']], function() {
    Route::GET('/create_user', 'UserController@create_user')->name('create_user');
    Route::POST('/save_user', 'UserController@save_user')->name('save_user');
    Route::GET('/manage_user', 'UserController@manage_user')->name('manage_user');

    Route::GET('/edit_user/{id}', 'UserController@edit_user')->name('edit_user');
    Route::POST('/update_user/{id}', 'UserController@update_user')->name('update_user');
    Route::GET('/delete_user/{id}', 'UserController@delete_user')->name('delete_user');//
});
Route::GET('/downloadExcel/{fileName}', 'AirbalonController@downloadExcel')->name('/downloadExcel');