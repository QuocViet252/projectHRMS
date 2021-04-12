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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();












Route::get('/home', 'HomeController@index')->name('home');

Route::get('/branch', 'Branch\BranchController@index')->name('branch');

Route::get('/add-branch', 'Branch\BranchController@create')->name('add-branch');
Route::post('/add-branch', 'Branch\BranchController@store')->name('add-branch');

Route::get('/delete/{id}', 'Branch\BranchController@destroy')->name('delete-branch');

Route::get('/update/{id}', 'Branch\BranchController@edit')->name('update-branch');
Route::post('/update/{id}', 'Branch\BranchController@update')->name('update-branch');
