<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('pages.index');
});

Route::namespace('Exchange')->group(function(){
    Route::get('/exchange', 'ExchangeController@index')->name('exchange.index');
});
