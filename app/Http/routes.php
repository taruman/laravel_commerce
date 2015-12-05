<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/categories', ['as' => 'admin.categories', 'uses' => 'AdminCategoriesController@index']);
Route::get('admin/categories/create', ['as' => 'admin.categories.create', 'uses' => 'AdminCategoriesController@create']);
Route::get('admin/categories/{id}/edit', ['as' => 'admin.categories.edit', 'uses' => 'AdminCategoriesController@edit']);
Route::post('admin/categories/store', ['as' => 'admin.categories.store', 'uses' => 'AdminCategoriesController@store']);
Route::put('admin/categories/{id}/update', ['as' => 'admin.categories.update', 'uses' => 'AdminCategoriesController@update']);
Route::get('admin/categories/{id}/destroy', ['as' => 'admin.categories.destroy', 'uses' => 'AdminCategoriesController@destroy']);

Route::get('admin/products', ['as' => 'admin.products', 'uses' => 'AdminProductsController@index']);
