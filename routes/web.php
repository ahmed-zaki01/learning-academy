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
    Route::get('/about', 'AboutController')->name('about');
    Route::get('/contact', 'ContactController')->name('contact');
    Route::post('/handle-newsletter', 'ContactController@handleNewsletter')->name('message.newsletter');
    Route::post('/handle-contact', 'ContactController@handleContact')->name('message.contact');
    Route::post('/handle-enroll', 'ContactController@handleEnroll')->name('message.enroll');
    Route::get('/cat/{id}', 'CourseController@showCat')->name('coursesCat');
    Route::get('/courses/{id}', 'CourseController@show')->name('courseDetails');
});

Route::namespace('Dashboard')->prefix('dashboard')->group(function () {
    Route::get('/login', 'AuthController@login')->name('admin.login');
    Route::post('/login', 'AuthController@attemptUser')->name('admin.attempt');
    Route::middleware('authAdmin')->group(function () {
        Route::get('/logout', 'AuthController@logout')->name('admin.logout');
        Route::get('/', 'HomeController@index')->name('admin.home');
        Route::get('/cats', 'CatController@index')->name('admin.cats');
    });
});
