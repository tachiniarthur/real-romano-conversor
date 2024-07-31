<?php

use App\Http\Controllers\ConversorRomanoController;
use Illuminate\Support\Facades\Route;

Route::post('/converter/{numero}', [ConversorRomanoController::class, 'converter']);
