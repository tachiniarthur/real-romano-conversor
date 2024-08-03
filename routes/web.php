<?php

use App\Http\Controllers\ConversorRomanoController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/', [ConversorRomanoController::class, 'index'])->name('index');