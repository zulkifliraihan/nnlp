<?php

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
    Route::get('/user/export', 'Admin\DashboardController@export')->name('admin.export.user');
    Route::post('/user/import', 'Admin\DashboardController@import_order_online')->name('admin.import.user');
});