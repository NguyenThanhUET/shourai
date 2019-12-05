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

Route::get('', 'HomeController@index')->name('home');

Route::get('listtour','HomeController@listtour')->name('listtour');

Route::get('detail','HomeController@detail')->name('detail');

Route::get('booking','HomeController@booking')->name('booking');

Route::post('do-booking','HomeController@doBooking')->name('do_booking');

Route::get('booking-success','HomeController@bookingsuccess')->name('booking_success');

Route::post('do-contact', 'HomeController@docontact')->name('docontact');

Route::get('contact', 'HomeController@contact')->name('contact');

