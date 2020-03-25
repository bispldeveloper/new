<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::post('images/attach', ['as' => 'images.attach', 'uses' => '\EyeCore\Modules\Images\Controllers\AdminImageController@attach']);
    Route::get('images/{image}/delete', ['as' => 'images.destroy', 'uses' => '\EyeCore\Modules\Images\Controllers\AdminImageController@destroy']);
});
