<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('pages/{page}/confirm-delete', ['as' => 'pages.confirm-delete', 'uses' => '\EyeCore\Modules\Pages\Controllers\AdminPageController@confirmDelete']);
    Route::get('pages/{id}/confirm-restore', ['as' => 'pages.confirm-restore', 'uses' => '\EyeCore\Modules\Pages\Controllers\AdminPageController@confirmRestore']);
    Route::post('pages/{id}/restore', ['as' => 'pages.restore', 'uses' => '\EyeCore\Modules\Pages\Controllers\AdminPageController@restore']);
    Route::post('pages/search', ['as' => 'pages.search', 'uses' => '\EyeCore\Modules\Pages\Controllers\AdminPageController@search']);
    Route::resource('pages', '\EyeCore\Modules\Pages\Controllers\AdminPageController', ['except' => ['show']])->parameters(['pages' => 'page']);
});

Route::get('/', ['as' => 'home', 'uses' => '\EyeCore\Modules\Pages\Controllers\PageController@showHomepage']);
