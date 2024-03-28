<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RatesController;

Route::get('/', function () {
    return view('welcome');
});
