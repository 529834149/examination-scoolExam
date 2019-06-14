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
Route::get('get_student_data', 'StudentController@index')->name('index');
Route::get('show_student_chart/{id}', 'StudentController@chart')->name('chart');
