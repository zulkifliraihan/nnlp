<?php

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard');
});