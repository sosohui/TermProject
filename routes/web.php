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
use Illuminate\Http\Request;

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/animation/{ani}','VoteController@index');

Route::get('animation/{ani}/{char}','CharacterController@index');

Route::post('/vote/{ani}','VoteController@vote');

Route::post('/search','CharacterController@search');

Route::resource('/board','BoardsController');

Route::get('/{ani}','IndexController@rank');
