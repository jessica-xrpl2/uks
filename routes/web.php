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
//route sendal
Route::get('/', 'FoodController@listFood');
Route::get('/foods/{id}', 'FoodController@detailFood')->name('detail');
Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('food', 'FoodController')->middleware('auth');


//route sepatu
Route::get('/', 'SepatuController@listSepatu');
// Route::get('/sepatu/{id}', 'SepatuController@detailSepatu')->name('detail');
// Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('sepatu', 'SepatuController')->middleware('auth');



//route sarung
Route::get('/', 'SarungController@listSarung');
// Route::get('/sepatu/{id}', 'SepatuController@detailSepatu')->name('detail');
// Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('sarung', 'SarungController')->middleware('auth');



//route mukena
Route::get('/', 'MukenaController@listMukena');
// Route::get('/sepatu/{id}', 'SepatuController@detailSepatu')->name('detail');
// Route::resource('category', 'CategoryController')->middleware('auth');
Route::resource('mukena', 'MukenaController')->middleware('auth');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
