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
Route::prefix('/')->group(function () {

    Route::get('/', 'HomeControllers@index')->name('home.index');

});


Route::prefix('mangas')->group(function () {

    Route::get('/index', 'MangasControllers@index')->name('mangas.index');

    Route::get('/search', 'SearchMangas@search')->name('mangas.search');

    Route::get('/history', 'SoftDeletedMangas@index')->name('mangas.history')->middleware('admin');

    Route::get('/history/{id}', 'SoftDeletedMangas@restore')->name('mangas.restore')->middleware('admin');

    Route::delete('/history/{id}', 'SoftDeletedMangas@delete')->name('mangas.delete')->middleware('admin');

    Route::get('/create', 'MangasControllers@create')->name('mangas.create')->middleware('admin');

    Route::post('/create', 'MangasControllers@store')->name('mangas.store')->middleware('admin');

    Route::get('/{id}/edit', 'MangasControllers@edit')->name('mangas.edit')->middleware('admin');

    Route::put('/{id}', 'MangasControllers@update')->name('mangas.update')->middleware('admin');

    Route::get('/{id}', 'MangasControllers@show')->name('mangas.show');


    Route::delete('/{id}', 'MangasControllers@destroy')->name('mangas.destroy')->middleware('admin');

});

Route::prefix('chapters')->group(function () {

    Route::get('/index', 'ChaptersControllers@index')->name('chapters.index');

    Route::get('/create', 'ChaptersControllers@create')->name('chapters.create')->middleware('admin');

    Route::post('/create', 'ChaptersControllers@store')->name('chapters.store')->middleware('admin');

    Route::get('/history', 'SoftDeletedChapters@index')->name('chapters.history')->middleware('admin');

    Route::get('/history/content', 'SoftDeletedChapters@content')->name('chapters.history.content')->middleware('admin');

    Route::get('/history/{id}', 'SoftDeletedChapters@restore')->name('chapters.restore')->middleware('admin');

    Route::delete('/history/{id}', 'SoftDeletedChapters@delete')->name('chapters.delete')->middleware('admin');

    Route::get('/{id}/edit', 'ChaptersControllers@edit')->name('chapters.edit')->middleware('admin');

    Route::put('/{id}', 'ChaptersControllers@update')->name('chapters.update')->middleware('admin');

    Route::get('/{id}', 'ChaptersControllers@show')->name('chapters.show');

    Route::delete('/{id}', 'ChaptersControllers@destroy')->name('chapters.destroy')->middleware('admin');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout','Logout@logout')->name('logout');
