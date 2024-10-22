<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/requesttoken", [LoginController::class, "getToken"]);

Route::post("/answer", [AnswerController::class, "submit"])->middleware('auth:sanctum');
