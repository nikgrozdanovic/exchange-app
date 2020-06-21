<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('pages.index');
})->name('index');

Route::namespace('Exchange')->group(function(){
    Route::get('/exchange', 'ExchangeController@index')->name('exchange.index');
    Route::post('/exchange/calculate', 'ExchangeController@calculate')->name('exchange.calculate');
    Route::post('/exchange/store', 'ExchangeController@store')->name('exchange.store');
});

Route::namespace('Currency')->group(function(){
    Route::get('/currency', 'CurrencyController@index')->name('currency.index');
    Route::get('/currency/{currency}', 'CurrencyController@show')->name('currency.show');
    Route::post('/currency/{currency}/update', 'CurrencyController@update')->name('currency.update');
});
