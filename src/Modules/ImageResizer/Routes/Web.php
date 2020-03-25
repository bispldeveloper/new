<?php

Route::get('imagecache/{type}/{width}/{height}/{format}/{quality}/{background}/{image}', ['as' => 'imageresizer.resize', 'uses' => '\EyeCore\Modules\ImageResizer\Controllers\ImageResizerController@resize'])->where('image', '.*');
