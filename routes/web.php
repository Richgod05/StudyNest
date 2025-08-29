<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('studynest');
});

Route::get('who-we-are', [HomepageController::class, 'whoWeare'])->name('studynest.who-we-are');
Route::get('nestchat', [HomepageController::class, 'nestChat'])->name('studynest.nestchat');
