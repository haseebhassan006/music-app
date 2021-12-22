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
    Route::get('zilla-products', 'ZillaLandingPageProductController@index')->name('zilla-products');
	Route::get('zilla-products/create', 'ZillaLandingPageProductController@create')->name('zilla-products.create');
    Route::post('zilla-products/create/product', 'ZillaLandingPageProductController@createProduct')->name('zilla-products.create.product');
    Route::get('zilla-products/edit/{id}', 'ZillaLandingPageProductController@edit')->name('zilla-products.edit');
    Route::post('zilla-products/editproduct/{id}', 'ZillaLandingPageProductController@editProduct')->name('zilla-products.editProduct');
    Route::get('zilla-products/delete/{id}', 'ZillaLandingPageProductController@delete')->name('zilla-products.delete');
    Route::get('zilla-products/getProducts', 'ZillaLandingPageProductController@getProducts')->name('zilla-products.getProducts');
});