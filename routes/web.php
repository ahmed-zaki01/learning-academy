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

        Route::prefix('cats')->group(function () {
            Route::get('/', 'CatController@index')->name('admin.cats');
            Route::get('/create', 'CatController@create')->name('admin.cats.create');
            Route::post('/store', 'CatController@store')->name('admin.cats.store');
            Route::get('/edit/{id}', 'CatController@edit')->name('admin.cats.edit');
            Route::post('/update', 'CatController@update')->name('admin.cats.update');
            Route::get('/delete/{id}', 'CatController@destroy')->name('admin.cats.delete');
        });

        Route::prefix('trainers')->group(function () {
            Route::get('/', 'TrainerController@index')->name('admin.trainers');
            Route::get('/create', 'TrainerController@create')->name('admin.trainers.create');
            Route::post('/store', 'TrainerController@store')->name('admin.trainers.store');
            Route::get('/edit/{id}', 'TrainerController@edit')->name('admin.trainers.edit');
            Route::post('/update', 'TrainerController@update')->name('admin.trainers.update');
            Route::get('/delete/{id}', 'TrainerController@destroy')->name('admin.trainers.delete');
        });

        Route::prefix('courses')->group(function () {
            Route::get('/', 'CourseController@index')->name('admin.courses');
            Route::get('/create', 'CourseController@create')->name('admin.courses.create');
            Route::post('/store', 'CourseController@store')->name('admin.courses.store');
            Route::get('/edit/{id}', 'CourseController@edit')->name('admin.courses.edit');
            Route::post('/update', 'CourseController@update')->name('admin.courses.update');
            Route::get('/delete/{id}', 'CourseController@destroy')->name('admin.courses.delete');
        });

        Route::prefix('students')->group(function () {
            Route::get('/', 'StudentController@index')->name('admin.students');
            Route::get('/create', 'StudentController@create')->name('admin.students.create');
            Route::post('/store', 'StudentController@store')->name('admin.students.store');
            Route::get('/edit/{id}', 'StudentController@edit')->name('admin.students.edit');
            Route::post('/update', 'StudentController@update')->name('admin.students.update');
            Route::get('/delete/{id}', 'StudentController@destroy')->name('admin.students.delete');
            Route::get('/show-courses/{id}', 'StudentController@showCourses')->name('admin.students.showCourses');
            Route::get('/{id}/courses/{c_id}/approve', 'StudentController@approveCourse')->name('admin.students.approveCourse');
            Route::get('/{id}/courses/{c_id}/reject', 'StudentController@rejectCourse')->name('admin.students.rejectCourse');
            Route::get('/{id}/courses/{c_id}/pending', 'StudentController@pendCourse')->name('admin.students.pendingCourse');
            Route::get('/{id}/add-to-course', 'StudentController@addCourse')->name('admin.students.addCourse');
            Route::post('/{id}/store-course', 'StudentController@storeCourse')->name('admin.students.storeCourse');
        });
    });
});
