<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','verified'],'as'=>'admin.'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/blog', 'BlogController@index')->name('blog');
});

Route::group(['prefix'=>'agent','namespace'=>'Agent','middleware'=>['auth','verified'],'as'=>'agent.'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});

Route::group(['prefix'=>'advisor','namespace'=>'Advisor','middleware'=>['auth','verified'],'as'=>'advisor.'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
Route::group(['prefix'=>'user','namespace'=>'User','middleware'=>['auth','verified'],'as'=>'user.'], function(){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});
Route::get('/', 'FrontEndController@index')->name('index');
Route::get('/home', 'FrontEndController@index')->middleware('verified')->name('home');

Route::get('/blog', 'BlogController@index')->name('blog');
Route::post('/blog/search', 'BlogController@search')->name('blog.search');
Route::get('/blog/{blog:slug}', 'BlogController@show')->name('blog.show');

Route::get('/support', 'SupportController@index')->name('support');
Route::post('/support/search', 'SupportController@search')->name('support.search');
Route::get('/support/{slug}', 'SupportController@cat')->name('support.cat');

Route::get('/contact', 'ContactController@index')->name('contact');
Route::post('/contact', 'ContactController@create')->name('contact.create');

Route::get('/secrets', 'FrontEndController@index')->middleware('password.confirm');

Auth::routes(['verify' => true]);

