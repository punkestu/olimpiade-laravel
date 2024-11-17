<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\ParticipantMailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post("/requesttoken", [LoginController::class, "getToken"])->name("request.token");

Route::group(["middleware" => ["auth:sanctum", "isLogin"]], function () {
    Route::post("/monitor", [MonitorController::class, "listen"]);
    Route::get("/time", [AnswerController::class, "peekExpandTime"]);
    Route::get("/finish", [AnswerController::class, "finish"]);
    Route::post("/answer", [AnswerController::class, "submit"]);
    Route::post("/image/upload", [ImageController::class, "store"]);
});

Route::post("/participant/mail", [ParticipantMailController::class, "store"])->name("participant.mail")->middleware("auth:sanctum");
Route::post("/participant/mail/all", [ParticipantMailController::class, "batchStore"])->name("participant.mailall")->middleware("auth:sanctum");
