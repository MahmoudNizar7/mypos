<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return redirect()->route('dashboard.welcome');
    });

    Auth::routes(['register' => false]);

    Route::get('/home', 'HomeController@index')->name('home');
