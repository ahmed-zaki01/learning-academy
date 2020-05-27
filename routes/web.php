<?php

use Illuminate\Support\Facades\Route;
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

Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about', 'HomeController@showAbout')->name('about');
    Route::get('/contact', 'HomeController@showContact')->name('contact');
    Route::get('/cat/{id}', 'CourseController@showCat')->name('coursesCat');
    Route::get('/courses/{id}', 'CourseController@show')->name('courseDetails');
});
