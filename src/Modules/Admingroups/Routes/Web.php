<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('admingroups/{admingroup}/confirm-delete', ['as' => 'admingroups.confirm-delete', 'uses' => '\EyeCore\Modules\Admingroups\Controllers\AdminAdmingroupController@confirmDelete']);
    Route::get('admingroups/{id}/confirm-restore', ['as' => 'admingroups.confirm-restore', 'uses' => '\EyeCore\Modules\Admingroups\Controllers\AdminAdmingroupController@confirmRestore']);
    Route::post('admingroups/{id}/restore', ['as' => 'admingroups.restore', 'uses' => '\EyeCore\Modules\Admingroups\Controllers\AdminAdmingroupController@restore']);
    Route::resource('admingroups', '\EyeCore\Modules\Admingroups\Controllers\AdminAdmingroupController', ['except' => ['show']])->parameters(['admingroups' => 'admingroup']);
});
