<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('studynest');
});

Route::get('/nest-chat', [HomepageController::class, 'index'])->name('nestchat.index');
Route::post('/nest-chat/ask', [HomepageController::class, 'askQuestion'])->name('nestchat.ask');
Route::post('/nest-chat/{id}/reply', [HomepageController::class, 'replyToQuestion'])->name('nestchat.reply');
Route::post('/nest-chat/{id}/like', [HomepageController::class, 'likeQuestion'])->name('nestchat.like');
Route::get('/nest-chat/{id}', [HomepageController::class, 'showQuestion'])->name('nestchat.show');
Route::get('/nestchat/stats/{id}', [HomepageController::class, 'stats']);
Route::get('/nestchat', [HomepageController::class, 'search'])->name('nestchat.index');