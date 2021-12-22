<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-06-23
 * Time: 10:00
 */

Route::group(['middleware' => 'role:admin_songs'], function() {
    Route::get('bulk', 'BulkController@index')->name('bulk');
});

Route::group(['middleware' => 'role:admin_videos'], function() {
    Route::get('bulkvideo', 'BulkController@indexVideo')->name('bulkvideo');
});