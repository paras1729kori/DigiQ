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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'PagesController@users')->name('pages.users');
Route::get('/queue', 'QueuesController@index')->name('pages.queues');
Route::get('/editing/{id}','QueuesController@edit')->name('pages.edit');
Route::post('/sending','QueuesController@store')->name('queues.store');
Route::post('/updating/{id}','QueuesController@update')->name('queues.update');
Route::get('/deleting/{id}','QueuesController@destroy')->name('queues.delete');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
