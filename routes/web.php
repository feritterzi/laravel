<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth'],'as'=>'admin.'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['prefix'=>'agent','namespace'=>'Agent','middleware'=>['auth'],'as'=>'agent.'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['prefix'=>'advisor','namespace'=>'Advisor','middleware'=>['auth'],'as'=>'advisor.'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['auth'],'as'=>'user.'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
Route::get('/', 'FrontEndController@index')->name('homepage');

Auth::routes();

