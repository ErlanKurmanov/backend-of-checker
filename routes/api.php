<?php

use App\Http\Controllers\DomainCheckController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/check-domains', [DomainCheckController::class, 'check'])
    ->middleware('auth:sanctum');
