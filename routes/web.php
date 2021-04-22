<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/phongban','PhongBan\PhongbanController@index');
Route::get('/phongban/them','Phongban\PhongbanController@getThem');
Route::post('/phongban/them','Phongban\PhongbanController@postThem');

Route::get('/phongban/xoa/{id}','Phongban\PhongbanController@delete');

Route::get('/phongban/sua/{id}','Phongban\PhongbanController@getSua');
Route::post('/phongban/sua/{id}','Phongban\PhongbanController@postSua');
Route::get('/branch', 'Branch\BranchController@index')->name('branch');

Route::get('/add-branch', 'Branch\BranchController@create')->name('add-branch');
Route::post('/add-branch', 'Branch\BranchController@store')->name('add-branch');

Route::get('/delete/{id}', 'Branch\BranchController@destroy')->name('delete-branch');

Route::get('/update/{id}', 'Branch\BranchController@edit')->name('update-branch');
Route::post('/update/{id}', 'Branch\BranchController@update')->name('update-branch');

Route::get('nhansu', 'Quanly\QuanlyNhansuController@index')->name('nhansuIndex');
Route::get('nhansu/create', 'Quanly\QuanlyNhansuController@create')->name('nhansuCreate');
Route::post('nhansu/create', 'Quanly\QuanlyNhansuController@store')->name('nhansuStore');
Route::get('nhansu/{id}/edit', 'Quanly\QuanlyNhansuController@edit')->name('nhansuEdit');
Route::post('nhansu/update/{id}', 'Quanly\QuanlyNhansuController@update')->name('nhansuUpdate');
Route::get('nhansu/{id}/delete', 'Quanly\QuanlyNhansuController@destroy')->name('nhansuDelete'); 

Route::get('role','PhanQuyen\PhanQuyenController@getRole');
Route::post('role/them','PhanQuyen\PhanQuyenController@createRole');
Route::get('role/xoa/{id}','PhanQuyen\PhanQuyenController@deleteRole');
Route::post('role/sua/{id}','PhanQuyen\PhanQuyenController@editRole');

Route::get('chucnang','PhanQuyen\PhanQuyenController@getChucNang');
Route::post('chucnang/them','PhanQuyen\PhanQuyenController@createChucNang');
Route::get('chucnang/xoa/{id}','PhanQuyen\PhanQuyenController@deleteChucNang');
Route::post('chucnang/sua/{id}','PhanQuyen\PhanQuyenController@editChucNang');

Route::get('nhanvien/vaitro','PhanQuyen\PhanQuyenController@index');
Route::get('nhanvien/vaitro/danhsach','PhanQuyen\PhanQuyenController@getListRoleUser');
Route::post('nhanvien/vaitro/sua/{id}','PhanQuyen\PhanQuyenController@postEditRoleUser');

Route::get('phanquyen','PhanQuyen\PhanQuyenController@getPhanQuyen');
Route::post('phanquyen/sua/{id}','PhanQuyen\PhanQuyenController@editRolePermission');


