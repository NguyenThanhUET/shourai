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

Route::get('admin', 'Auth\LoginController@index')->name('admin.login');
Route::prefix('auth')->group(function () {
    Route::post('login', 'Auth\LoginController@login')->name('auths.dologin');
    Route::get('logout', 'Auth\LoginController@logout')->name('auths.logout');
});
Route::middleware(['auth.basic'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');
        Route::get('destination', 'Backend\DestinationController@index')->name('admin.destination.index');
        Route::get('destination/edit', 'Backend\DestinationController@edit')->name('admin.destination.edit');
        Route::post('destination/edit', 'Backend\DestinationController@doEdit')->name('admin.destination.do_edit');
        Route::get('destination/add', 'Backend\DestinationController@add')->name('admin.destination.add');
        Route::post('destination/add', 'Backend\DestinationController@doAdd')->name('admin.destination.do_add');

        Route::get('tour', 'Backend\ToursController@index')->name('admin.tours.index');
        Route::get('tour/edit', 'Backend\ToursController@edit')->name('admin.tours.edit');
        Route::post('tour/edit', 'Backend\ToursController@doEdit')->name('admin.tours.do_edit');
        Route::get('tour/add', 'Backend\ToursController@add')->name('admin.tours.add');
        Route::post('tour/add', 'Backend\ToursController@doAdd')->name('admin.tours.do_add');

    });
});

Route::get('', 'HomeController@index')->name('home');

Route::get('listtour','HomeController@listtour')->name('listtour');

Route::get('detail','HomeController@detail')->name('detail');

Route::get('booking','HomeController@booking')->name('booking');

Route::post('do-booking','HomeController@doBooking')->name('do_booking');

Route::get('booking-success','HomeController@bookingsuccess')->name('booking_success');

Route::post('do-contact', 'HomeController@docontact')->name('docontact');

Route::get('contact', 'HomeController@contact')->name('contact');


