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
    Route::get('zilla-landingpages', 'ZillaLandingPageController@index')->name('zilla-landingpages');
		Route::post('zilla-landingpages/clone/{id}', 'ZillaLandingPageController@clone')->name('zilla-landingpages.clone');
		Route::get('zilla-landingpages/frame-main-page/{id}', 'ZillaLandingPageController@frameMainPage')->name('zilla-landingpages.frame-main-page');
		Route::get('zilla-landingpages/frame-thank-you-page/{id}', 'ZillaLandingPageController@frameThankYouPage')->name('zilla-landingpages.frame-thank-you-page');
		Route::post('zilla-landingpages/get-template-json/{code}', 'ZillaLandingPageController@getTemplateJson');
		Route::get('zilla-landingpages/preview-template/{id}', 'ZillaLandingPageController@previewTemplate')->name('zilla-landingpages.preview');
		Route::get('zilla-landingpages/builder/{code}/{type?}', 'ZillaLandingPageController@builder')->name('zilla-landingpages.builder');
		Route::get('zilla-landingpages/trashed', 'ZillaLandingPageController@trashed')->name('zilla-landingpages.trashed');
		Route::post('zilla-landingpages/save', 'ZillaLandingPageController@save')->name('zilla-landingpages.save');
		// Load builder
		Route::get('zilla-landingpages/builder/{code}/{type?}', 'ZillaLandingPageController@builder')->name('zilla-landingpages.builder');
		Route::post('zilla-landingpages/update-builder/{item}/{type?}', 'ZillaLandingPageController@updateBuilder')->name('zilla-landingpages.updateBuilder');
		Route::get('zilla-landingpages/load-builder/{item}/{type?}', 'ZillaLandingPageController@loadBuilder')->name('zilla-landingpages.loadBuilder');
		// Delete
		Route::post('zilla-landingpages/delete/{item}', 'ZillaLandingPageController@delete')->name('zilla-landingpages.delete');
		Route::get('zilla-landingpages/setting/{item}', 'ZillaLandingPageController@setting')->name('zilla-landingpages.setting');
		Route::post('zilla-landingpages/setting-update/{item}', 'ZillaLandingPageController@settingUpdate')->name('zilla-landingpages.settings.update');

});