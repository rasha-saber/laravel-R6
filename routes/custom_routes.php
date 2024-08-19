<?php
use Illuminate\Support\Facades\Route;

Route::middleware('verified')->group(function () {
    Route::get('/dashboard', function () {
        return 'Welcome to the dashboard!';
    });

    Route::get('/profile', function () {
        return 'This is your profile!';
    });
});