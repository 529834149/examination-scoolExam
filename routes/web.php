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
Route::get('/', 'PagesController@school')->name('school');

//Route::get('excel/export','ExcelController@export');
Route::get('excel/import/examination/results','ExcelController@show_web');//导入excel信息录入
Route::get('excel/import/examination/submit','ExcelController@store');//导入excel信息录入
Route::post('upload_file','ExcelController@store');//处理file文件
Route::post('excel/import','ExcelController@import');//处理file文件

//Route::get('/','ExcelController@index');//前端上传
Route::get('/teachers/manage/students', 'PagesController@root')->name('root');
Route::get('get_student_data/{id}', 'StudentController@show')->name('show');
Route::get('show_student_chart/{id}', 'StudentController@chart')->name('chart');

//登录逻辑
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');