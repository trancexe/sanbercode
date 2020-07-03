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

Route::get('/', "PertanyaanController@index")->name('home');
Route::get('jawaban/{id}', [
    'as' => 'jawaban.index',
    'uses' => 'JawabanController@index'
    ]);
Route::resource("pertanyaan", "PertanyaanController");
Route::resource("jawaban", "JawabanController", ['except' => 'index']);