<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('pageformfields/{pageformfield}/confirm-delete', ['as' => 'pageformfields.confirm-delete', 'uses' => '\EyeCore\Modules\PageFormFields\Controllers\AdminPageFormFieldController@confirmDelete']);
    Route::resource('pageformfields', '\EyeCore\Modules\PageFormFields\Controllers\AdminPageFormFieldController', ['except' => ['show', 'index', 'create', 'store']])->parameters(['pageformfields' => 'pageformfield']);
});
