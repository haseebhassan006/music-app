<?php

Route::group(['middleware' => 'role:admin_songs'], function() {
    Route::get('videos', 'VideosController@index')->name('videos');
    Route::post('songs', 'SongsController@massAction')->name('songs.mass.action');
    Route::get('songs/edit/{id}', 'SongsController@edit')->name('songs.edit');
    Route::post('songs/edit/{id}', 'SongsController@editPost')->name('songs.edit.post');
    Route::get('songs/delete/{id}', 'SongsController@delete')->name('songs.delete');
    Route::post('songs/edit-title', 'SongsController@editTitlePost')->name('songs.edit.title.post');
    Route::post('songs/reject/{id}', 'SongsController@reject')->name('songs.edit.reject.post');
});