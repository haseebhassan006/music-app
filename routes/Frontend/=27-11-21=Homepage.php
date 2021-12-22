<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-08-01
 * Time: 20:37
 */
Route::get('/', 'HomeController@index')->name('homepage');
Route::get('/home-new', 'HomeController@index_new')->name('homepagenew');
