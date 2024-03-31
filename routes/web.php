<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;


Route::name('calculate.')->group(function () {
    Route::get('/', [CalculatorController::class, 'index'])->name("index");
    Route::post('/', [CalculatorController::class, 'calculate'])->name('calculate');
});