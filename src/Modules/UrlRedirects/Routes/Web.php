<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('urlredirects/export', ['as' => 'urlredirects.export', 'uses' => '\EyeCore\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@export']);
    Route::post('urlredirects/import', ['as' => 'urlredirects.import', 'uses' => '\EyeCore\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@import']);
    Route::get('urlredirects/{urlredirect}/confirm-delete', ['as' => 'urlredirects.confirm-delete', 'uses' => '\EyeCore\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@confirmDelete']);
    Route::get('urlredirects/{id}/confirm-restore', ['as' => 'urlredirects.confirm-restore', 'uses' => '\EyeCore\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@confirmRestore']);
    Route::post('urlredirects/{id}/restore', ['as' => 'urlredirects.restore', 'uses' => '\EyeCore\Modules\UrlRedirects\Controllers\AdminUrlRedirectController@restore']);
    Route::resource('urlredirects', '\EyeCore\Modules\UrlRedirects\Controllers\AdminUrlRedirectController', ['except' => ['show']])->parameters(['urlredirects' => 'urlredirect']);
});
