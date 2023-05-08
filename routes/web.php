<?php

use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;
use App\Models\Singer;
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

Route::get('/', function () {
    return view('home');
});

Route::group(['namespace' => 'App\Http\Controllers'], function(){

    Route::get('/singer', 'SingerController@create')->name('singer');
    Route::post('/newsinger', 'SingerController@store')->name('newsinger');

    Route::get('/song', 'SongController@create')->name('song');
    Route::post('/newsong', 'SongController@store')->name('newsong');
    Route::get('updatesong/{id}', 'SongController@edit')->name('updatesong');
    Route::post('/storeupdate/{id}', 'SongController@storeUpdate')->name('storeupdate');
    Route::get('/deletesong/{id}', 'SongController@delete')->name('deletesong');

    Route::get('/viewsingerdata', 'SingerController@displayViewSingerData')->name('viewsingerdata');
    Route::get('/showsingersongs/{id}', 'SingerController@showSingerSongs')->name('showsingersongs');

});
