<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('file-manager', ['as' => 'filemanager', 'uses' => '\EyeCore\Modules\FileManager\Controllers\AdminFileManagerController@index']);
    Route::get('file-manager-framed', ['as' => 'filemanager-framed', 'uses' => '\EyeCore\Modules\FileManager\Controllers\AdminFileManagerController@frame']);
});
