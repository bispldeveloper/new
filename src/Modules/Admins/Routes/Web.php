<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {

    // Authentication routes...
	Route::get('login', '\EyeCore\Modules\Admins\Controllers\AdminLoginController@getLogin');
    Route::post('login', ['as' => 'login', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminLoginController@login']);
    Route::get('logout', ['as' => 'logout', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminLoginController@logout']);

	// Password reset link request routes...
    Route::get('forgotten-password', ['as' => 'request', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminForgotPasswordController@showLinkRequestForm']);
    Route::post('forgotten-password', ['as' => 'request', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminForgotPasswordController@sendResetLinkEmail']);

	// Password reset routes...
    Route::get('password/reset/{token}', ['as' => 'reset', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminResetPasswordController@showResetForm']);
    Route::post('password/reset', ['as' => 'reset', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminResetPasswordController@reset']);

    // Admin routes
    Route::get('/', ['as' => 'dashboard', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminDashboardController@index']);
    Route::get('admins/{admin}/confirm-delete', ['as' => 'admins.confirm-delete', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminAdminController@confirmDelete']);
    Route::post('admins/{id}/change-password', ['as' => 'admins.changepassword', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminAdminController@changePassword']);
    Route::get('admins/{id}/confirm-restore', ['as' => 'admins.confirm-restore', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminAdminController@confirmRestore']);
    Route::post('admins/{id}/restore', ['as' => 'admins.restore', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminAdminController@restore']);
    Route::post('admins/search', ['as' => 'admins.search', 'uses' => '\EyeCore\Modules\Admins\Controllers\AdminAdminController@search']);
    Route::resource('admins', '\EyeCore\Modules\Admins\Controllers\AdminAdminController', ['except' => ['show']])->parameters(['admins' => 'admin']);

    // Sort order function
	Route::post('sortorder', function () {
		updateSortOrder(request()->input());
	});
});
