<?php

    Route::get('/', function(){
        return redirect('acara/pendaftaran');
    });

    Route::prefix('acara')->group(function () {
        // Route::get('/login', 'auth\LoginController@index')->name('view.login');
        Route::get('/pendaftaran', 'Auth\RegisterController@index')->name('acara.pendaftaran');
    
        // Route::post('/login', 'auth\LoginController@login')->name('auth.login');
        // Route::post('/logout', 'auth\LoginController@logout')->name('auth.logout');
        Route::post('/pendaftaran', 'Auth\RegisterController@create')->name('acara.daftar');
    });
    
    require 'auth/index.php';