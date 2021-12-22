<?php
/**
 * Created by NiNaCoder.
 * Date: 2019-06-23
 * Time: 09:56
 */


/*
 * Edit Genre
*/

Route::group(['middleware' => 'role:admin_posts'], function() {
    Route::get('maincategories', 'MainCategoryController@index')->name('maincategories');
	Route::get('maincategories/add', 'MainCategoryController@add')->name('maincategories.add');
    Route::post('maincategories/add/category', 'MainCategoryController@addPost')->name('maincategories.add.category');
    Route::get('maincategories/edit/{id}', 'MainCategoryController@edit')->name('maincategories.edit');
    Route::post('maincategories/edit/{id}', 'MainCategoryController@editProduct')->name('maincategories.edit.post');
    Route::get('maincategories/delete/{id}', 'MainCategoryController@delete')->name('maincategories.delete');
    Route::get('maincategories/getCats', 'MainCategoryController@getCats')->name('maincategories.getCategories');
});