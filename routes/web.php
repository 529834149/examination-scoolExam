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

Route::get('/', function () {
    return view('welcome');
});
//Route::get('excel/export','ExcelController@export');
Route::get('excel/import/examination/results','ExcelController@import');//会考成绩导入
Route::get('examination/results','ExcelController@index');//前端上传