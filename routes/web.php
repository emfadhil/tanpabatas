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

Route::resource('posting', 'PostingController');  
Route::get('/', 'PostingController@postingAktif');
Route::get('/search', 'PostingController@search');
Route::get('posting/nonaktif/{id}', 'PostingController@nonaktif')->middleware('auth'); //route ke function buatan sendiri update status posting
Route::get('posting/aktif/{id}', 'PostingController@aktif')->middleware('auth'); //route ke function buatan sendiri update status posting

Route::resource('member', 'MemberController')->middleware('auth');
Route::get('member/nonaktif/{id}', 'MemberController@nonaktif')->middleware('auth'); //route ke function buatan sendiri update status member
Route::get('member/aktif/{id}', 'MemberController@aktif')->middleware('auth'); //route ke function buatan sendiri update status member
Route::get('exportmember', 'MemberController@memberExcel');

Route::resource('kategori', 'KategoriController')->middleware('auth');

Route::resource('profil', 'ProfilController')->middleware('auth');

Route::resource('pass','PassController')->middleware('auth');    

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');





