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
    Route::get('Zilla-leads', 'ZillaLeadController@index')->name('Zilla-leads');
});