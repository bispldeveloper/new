<?php

Route::group(['prefix' => 'mc-admin', 'as' => 'mc-admin.', 'middleware' => ['auth.admin', 'auth.permissions']], function ($router) {
    Route::resource('marketingreports', '\EyeCore\Modules\MarketingReports\Controllers\AdminMarketingReportController');
});
