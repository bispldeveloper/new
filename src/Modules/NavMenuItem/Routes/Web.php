<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('navmenuitems/{menuitem}/confirm-delete', ['as' => 'navmenuitems.confirm-delete', 'uses' => '\EyeCore\Modules\NavMenuItem\Controllers\AdminNavMenuItemController@confirmDelete']);
    Route::resource('navmenuitems', '\EyeCore\Modules\NavMenuItem\Controllers\AdminNavMenuItemController', ['except' => ['index', 'create', 'show']])->parameters(['navmenuitems' => 'menuitem']);
});
