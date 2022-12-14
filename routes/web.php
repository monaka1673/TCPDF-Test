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

/* PDF TEST */
Route::get('/pdf/test', 'DocumentController@downloadPdf');
Route::get('/pdf/line_feed', 'DocumentController@lineFeed');
Route::get('/pdf/multi_cell', 'DocumentController@multiCell');