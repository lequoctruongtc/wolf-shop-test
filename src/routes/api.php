<?php

use App\Http\Controllers\Api\ItemController;
use Illuminate\Support\Facades\Route;

Route::post('/items/{item}/upload', [ItemController::class, 'upload'])->middleware('auth.basic');
