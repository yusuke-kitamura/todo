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

// タスク一覧画面を表示
Route::get('/folders/{id}/tasks','TaskController@index')->name('tasks.index');
//タスクの新規作成画面と登録
Route::get('/folders/{id}/tasks/create','TaskController@create')->name('tasks.create');
Route::post('/folders/{id}/tasks/create','TaskController@store');
// フォルダの新規作成画面と登録
Route::get('/folders/create','FolderController@create')->name('folders.create');
Route::post('/folders/create','FolderController@store');