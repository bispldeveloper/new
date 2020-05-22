<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('pageforms/{pageform}/confirm-delete', ['as' => 'pageforms.confirm-delete', 'uses' => '\EyeCore\Modules\PageForms\Controllers\AdminPageFormController@confirmDelete']);
    Route::get('pageforms/{id}/confirm-restore', ['as' => 'pageforms.confirm-restore', 'uses' => '\EyeCore\Modules\PageForms\Controllers\AdminPageFormController@confirmRestore']);
    Route::post('pageforms/{id}/restore', ['as' => 'pageforms.restore', 'uses' => '\EyeCore\Modules\PageForms\Controllers\AdminPageFormController@restore']);
    Route::get('pageforms/{pageform}/addfield', ['as' => 'pageforms.addfield', 'uses' => '\EyeCore\Modules\PageForms\Controllers\AdminPageFormController@addField']);
    Route::put('pageforms/{pageform}/addfield', ['as' => 'pageforms.storefield', 'uses' => '\EyeCore\Modules\PageForms\Controllers\AdminPageFormController@storeField']);
    Route::post('pageforms/search', ['as' => 'pageforms.search', 'uses' => '\EyeCore\Modules\PageForms\Controllers\AdminPageFormController@search']);
    Route::resource('pageforms', '\EyeCore\Modules\PageForms\Controllers\AdminPageFormController', ['except' => ['show']])->parameters(['pageforms' => 'pageform']);
});
