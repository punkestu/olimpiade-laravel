<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\OlimpiadeController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ParticipantImportController;
use App\Http\Controllers\ParticipantResetController;
use App\Http\Controllers\PointExportController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionExportController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => 'guest'], function () {
    Route::resource(
        'login',
        LoginController::class,
        [
            'only' => ['index', 'store'],
            'names' => ['index' => 'login', 'store' => 'login.action']
        ]
    );
    Route::resource(
        'register',
        RegisterController::class,
        [
            'only' => ['index', 'store'],
            'names' => ['index' => 'register', 'store' => 'register.action']
        ]
    );
    Route::get('/reveal-login-id/{id}', [RegisterController::class, 'revealLoginID'])->name('reveal-login-id');
});

Route::get('/questions/{id}', [QuestionExportController::class, 'questions'])->name('questions');

Route::group(['middleware' => ['auth', 'isLogin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');
    Route::get('/logout', function () {
        $user = User::find(Auth::id());
        if ($user->role != "admin") {
            $user->is_login = false;
            $user->save();
        }
        Auth::logout();
        return redirect()->route('welcome');
    })->name('logout');

    Route::resource('olimpiade', OlimpiadeController::class, ['names' => 'olimpiade']);
    Route::get('/olimpiade/{id}/delete', [OlimpiadeController::class, 'destroy'])->name('olimpiade.delete');
    Route::resource('question', QuestionController::class, ['only' => ['store'], 'names' => 'question', 'parameters' => ['question.store' => 'olimpiade_id']]);

    Route::post("/question/{question_id}/update", [QuestionController::class, 'update'])->name('question.update');
    Route::get("/question/{question_id}/delete", [QuestionController::class, 'destroy'])->name('question.delete');
    Route::get('/question/export/{id}', [QuestionExportController::class, 'exportPdf'])->name('questions.pdf');

    Route::get("/participant", [ParticipantController::class, 'index'])->name('participant');
    Route::get("/participant/create", [ParticipantController::class, 'create'])->name('participant.create');
    Route::post("/participant/create", [ParticipantController::class, 'store'])->name('participant.store');
    Route::get("/participant/{id}", [ParticipantController::class, 'show'])->name('participant.show');
    Route::get("/participant/change-password/{id}", [ParticipantController::class, 'changePassword'])->name('participant.change-password');
    Route::post("/participant/change-password/{id}", [ParticipantController::class, 'updatePassword'])->name('participant.update-password');
    Route::get("/participant/{id}/delete", [ParticipantController::class, 'destroy'])->name('participant.delete');
    Route::get("/participant/{id}/logout", [ParticipantController::class, 'logout'])->name('participant.logout');
    Route::get("/participant/{id}/reset", [ParticipantResetController::class, 'resetOne'])->name('participant.reset-one');

    Route::get("/reset/participant", [ParticipantResetController::class, 'reset'])->name('participant.reset');
    Route::post("/import/participant", [ParticipantImportController::class, 'import'])->name('participant.import');
    Route::get("/export/point/{id}", [PointExportController::class, 'export'])->name('point.export');

    Route::get("/monitoring", [MonitorController::class, "index"])->name('monitor');
    Route::get("/monitoring/{id}", [MonitorController::class, "pantau"])->name('monitor.pantau');
    Route::get('/quiz', [AnswerController::class, 'quiz'])->name('quiz');

    Route::get("/setting", [SettingController::class, 'index'])->name('setting');
    Route::get("/setting/change-password", [SettingController::class, 'changePassword'])->name('setting.change-password');
    Route::post("/setting/change-password", [SettingController::class, 'updatePassword'])->name('setting.update-password');
});
Route::get("/notifikasi", function () {
    return view('notifikasi');
})->name('notifikasi');
Route::get("/peserta", function () {
    return view('peserta');
})->name('peserta');
