<?php

Route::middleware(['guest'])->group(function() {
    Route::view('/login', 'backend.login')->name('login');
    Route::post('/login', 'AuthController@login')->name('login.post');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/', 'DashboardController@show')->name('dash');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});
