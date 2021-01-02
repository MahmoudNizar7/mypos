<?php

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return redirect()->route('dashboard.welcome');
    });

    Auth::routes(['register' => false]);

    Route::get('/home', 'HomeController@index')->name('home');

    //category routes
    Route::resource('categories', 'CategoryController')->except(['show']);

    //product routes
    Route::resource('products', 'ProductController')->except(['show']);

    //client routes
    Route::resource('clients', 'ClientController')->except(['show']);
    Route::resource('clients.orders', 'Client\OrderController')->except(['show']);

    //order routes
    Route::resource('orders', 'OrderController');
    Route::get('/orders/{order}/products', 'OrderController@products')->name('orders.products');



