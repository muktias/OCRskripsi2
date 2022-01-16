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
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/draw', 'GaleriController@draw');
Route::post('/uploadImage', 'GaleriController@upload')->name('uploadImage');
Route::get('/pred', 'GaleriController@predict');
Route::get('/deleteImage', 'GaleriController@destroy');
Route::get('/catalogue', 'HomeController@catalogue');
Route::get('/about', 'HomeController@about');