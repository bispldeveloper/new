<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::group(['middleware' => 'auth.dev'], function () {
        Route::get('siteconfig', ['as' => 'siteconfig.index', 'uses' => '\EyeCore\Modules\SiteConfig\Controllers\AdminSiteConfigController@index']);
        Route::get('gitpull/confirm-gitpull', ['as' => 'gitpull.confirm-gitpull', 'uses' => '\EyeCore\Modules\SiteConfig\Controllers\AdminSiteConfigController@confirmgitpull']);
        Route::post('gitpull', ['as' => 'gitpull.pull', 'uses' => '\EyeCore\Modules\SiteConfig\Controllers\AdminSiteConfigController@gitpull']);
        Route::post('siteconfig/updaterobots', ['as' => 'siteconfig.updaterobots', 'uses' => '\EyeCore\Modules\RobotsTxt\Controllers\AdminRobotsTxtController@update']);
        Route::post('siteconfig/changedebugmode', ['as' => 'siteconfig.changedebugmode', 'uses' => '\EyeCore\Modules\SiteConfig\Controllers\AdminSiteConfigController@changeDebugMode']);
    });
});
