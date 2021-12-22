<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-06-23
 * Time: 09:58
 */


/*
 * Edit Album
*/
Route::group(['middleware' => 'role:admin_posts'], function() {
    Route::get('zilla-orders', 'ZillaOrderController@index')->name('zilla-orders');
});