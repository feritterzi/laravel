<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin'],'as'=>'admin.'], function(){
    Route::get('/admin', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::get('/', 'FrontEndController@index')->name('home');

Auth::routes();

Route::get('/home', 'FrontEndController@index');

