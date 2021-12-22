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
    Route::get('alltemplates/{id?}', 'ZillaTemplateController@getAllTemplate')->name('alltemplates');
    Route::get('zilla-templates', 'ZillaTemplateController@index')->name('zilla-templates.index');
    Route::get('zilla-templates/all-templates', 'ZillaTemplateController@getAllTemplate')->name('zilla-templates.templates');
    Route::get('zilla-templates/builder/{code}/{type?}', 'ZillaTemplateController@builder')->name('zilla-templates.builder');
});