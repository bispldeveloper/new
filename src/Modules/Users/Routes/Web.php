<?php
Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::get('users/{user}/confirm-delete', ['as' => 'users.confirm-delete', 'uses' => '\EyeCore\Modules\Users\Controllers\AdminUserController@confirmDelete']);
    Route::post('users/{user}/changepassword', ['as' => 'users.changepassword', 'uses' => '\EyeCore\Modules\Users\Controllers\AdminUserController@changePassword']);
    Route::get('users/{id}/confirm-restore', ['as' => 'users.confirm-restore', 'uses' => '\EyeCore\Modules\Users\Controllers\AdminUserController@confirmRestore']);
    Route::post('users/{id}/restore', ['as' => 'users.restore', 'uses' => '\EyeCore\Modules\Users\Controllers\AdminUserController@restore']);
    Route::post('users/search', ['as' => 'users.search', 'uses' => '\EyeCore\Modules\Users\Controllers\AdminUserController@search']);
    Route::resource('users', '\EyeCore\Modules\Users\Controllers\AdminUserController', ['except' => ['show']])->parameters(['users' => 'user']);
});

Route::get('login', ['as' => 'account.login', 'uses' => '\EyeCore\Modules\Users\Controllers\UserLoginController@getLogin']);
Route::post('login', ['as' => 'account.login.post', 'uses' => '\EyeCore\Modules\Users\Controllers\UserLoginController@login']);
Route::get('logout', ['as' => 'account.logout', 'uses' => '\EyeCore\Modules\Users\Controllers\UserLoginController@logout']);

Route::get('forgotten-password', ['as' => 'account.forgottenpassword', 'uses' => '\EyeCore\Modules\Users\Controllers\UserForgotPasswordController@showLinkRequestForm']);
Route::post('forgotten-password', ['as' => 'account.forgottenpassword.post', 'uses' => '\EyeCore\Modules\Users\Controllers\UserForgotPasswordController@sendResetLinkEmail']);

Route::get('register', ['as' => 'account.register', 'uses' => '\EyeCore\Modules\Users\Controllers\UserRegisterController@showRegistrationForm']);
Route::post('register', ['as' => 'account.register.post', 'uses' => '\EyeCore\Modules\Users\Controllers\UserRegisterController@register']);

Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => '\EyeCore\Modules\Users\Controllers\UserResetPasswordController@showResetForm']);
Route::post('password/reset', ['as' => 'account.resetpassword.post', 'uses' => '\EyeCore\Modules\Users\Controllers\UserResetPasswordController@reset']);


Route::group(['prefix' => 'account', 'as' => 'account.', 'middleware' => ['auth.user']], function ($router) {

    Route::get('/', ['as' => 'index', 'uses' => '\EyeCore\Modules\Users\Controllers\UserAccountController@index']);

});
