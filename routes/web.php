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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/update-password', 'HomeController@changePasswordForm')->name('edit-password');
    Route::put('/update-password', 'HomeController@updatePassword');

    Route::group(['middleware' => 'check_permission'], function () {


        Route::get('/', 'HomeController@index')->name('/');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        Route::resource('customers','CustomerController');
        Route::resource('roles', 'RoleController');
        Route::resource('users', 'UserController');
        Route::resource('settings', 'SettingController');


//        Dummy Route


        Route::get('/data-table', function () {return view('all_file.datatable');})->name('table');
        Route::get('/simple-table', function () {return view('all_file.simpletable');})->name('simpleTable');
        Route::get('/genaral-form', function () {return view('all_file.genaral_form');})->name('general.form');
        Route::get('/advance-element', function () {return view('all_file.advance_element');})->name('advance.element');
        Route::get('/editors', function () {return view('all_file.editors');})->name('editors');
        Route::get('/general', function () {return view('all_file.general');})->name('general');
        Route::get('/icon', function () {return view('all_file.icon');})->name('icon.form');
        Route::get('/button', function () {return view('all_file.button');})->name('button.form');
        Route::get('/models', function () {return view('all_file.models');})->name('models.form');
        Route::get('/widgets', function () {return view('all_file.widgets');})->name('widgets');


    });
});
