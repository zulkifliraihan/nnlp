<?php

    Route::get('/', function(){
        return redirect('acara/pendaftaran');
    });

    Route::get('/referral/peserta', 'ReferralController@index')->name('referral.pendaftaran');
    Route::get('/referral/terundang', 'ReferralController@terundang')->name('referral.terundang');

    Route::prefix('acara')->group(function () {
        // Route::get('/login', 'auth\LoginController@index')->name('view.login');
        Route::get('/pendaftaran', 'Auth\RegisterController@index')->name('acara.pendaftaran');
    
        // Route::post('/login', 'auth\LoginController@login')->name('auth.login');
        // Route::post('/logout', 'auth\LoginController@logout')->name('auth.logout');
        Route::post('/pendaftaran', 'Auth\RegisterController@store')->name('acara.daftar');
    });
    
    require 'auth/index.php';
    require 'admin/index.php';