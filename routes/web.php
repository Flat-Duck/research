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



// Admin routes
Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // Login
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login');

        // Forget and reset Password
        Route::get('forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('forgot_password');
        Route::post('forgot-password', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}/{email?}', 'ResetPasswordController@showResetForm')->name('reset_password_link');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('reset_password');
    });

    // Logged in admin user required
    Route::group(['middleware' => 'auth:admin'], function () {
        // Dashboard
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

        Route::resource('teachers', 'TeacherController');

        Route::resource('departments', 'DepartmentController');

        Route::resource('ads', 'AdController');

        Route::resource('papers', 'PaperController');

        Route::resource('nationalities', 'NationalityController');

        Route::resource('colleges', 'CollegeController');

        Route::resource('classifications', 'ClassificationController');

        Route::resource('qualifications', 'QualificationController');

        Route::resource('magazines', 'MagazineController');

        Route::resource('conferences', 'ConferenceController');

        // Profile
        Route::get('/profile', 'AdminController@profile')->name('profile');
        Route::post('/profile', 'AdminController@profileUpdate');
        Route::post('/password', 'AdminController@passwordUpdate')->name('password_update');

        // Logout
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});

 Route::get('/search', 'SearchController@search')->name('search');
 Route::get('/', 'SearchController@index')->name('result');



Route::get('/result', function () {
    return view('result');
});