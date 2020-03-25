<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::group(['before' => 'auth.dev'], function () {
        Route::get('pagetemplates/{pagetemplate}/confirm-delete', ['as' => 'pagetemplates.confirm-delete', 'uses' => '\EyeCore\Modules\PageTemplates\Controllers\AdminPageTemplateController@confirmdelete']);
        Route::get('pagetemplates/{id}/confirm-restore', ['as' => 'pagetemplates.confirm-restore', 'uses' => '\EyeCore\Modules\PageTemplates\Controllers\AdminPageTemplateController@confirmrestore']);
        Route::post('pagetemplates/{id}/restore', ['as' => 'pagetemplates.restore', 'uses' => '\EyeCore\Modules\PageTemplates\Controllers\AdminPageTemplateController@restore']);
        Route::resource('pagetemplates', '\EyeCore\Modules\PageTemplates\Controllers\AdminPageTemplateController', ['except' => ['show']])->parameters(['pagetemplates' => 'pagetemplate']);
    });
});
