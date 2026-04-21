<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ATMController;

Route::get('/atm', [ATMController::class, 'demo']);


