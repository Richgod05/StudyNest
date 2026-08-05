<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

Route::get('/', function () {
    return view('studynest');
});
Route::get('/ourteam', function () {
    return view('ourteam');
});

Route::group(['prefix' => 'studynest'], function () {
    //Routes for guest users
    Route::group(['middleware'=>'guest'], function(){
        Route::get('login', [AuthController::class, 'index'])->name('login');
        Route::post('process_register', [AuthController::class, 'processRegister'])->name('process_register');

        Route::get('signup', [AuthController::class, 'login'])->name('signup');
        Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
    });

    //Routes for authenticated users
    Route::group(['middleware'=>'auth'], function(){
        Route::get('nest-chat', [HomepageController::class, 'index'])->name('nestchat.index');
        Route::post('nest-chat/ask', [HomepageController::class, 'askQuestion'])->name('nestchat.ask');
        Route::post('nest-chat/{id}/reply', [HomepageController::class, 'replyToQuestion'])->name('nestchat.reply');
        Route::post('nest-chat/{id}/like', [HomepageController::class, 'likeQuestion'])->name('nestchat.like');
        Route::get('nest-chat/{id}', [HomepageController::class, 'showQuestion'])->name('nestchat.show');
        Route::get('nestchat/stats/{id}', [HomepageController::class, 'stats']);
        Route::get('nestchat', [HomepageController::class, 'search'])->name('nestchat.index');
        Route::get('materials', [MaterialController::class, 'index2'])->name('materials.index');
        Route::get('learning-hub', [AdminController::class, 'learningHub'])->name('learning.hub');
        Route::get('books/{book}', [AdminController::class, 'show'])->name('books.show');
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('nestdrop', [MaterialController::class, 'index'])->name('nestdrop.index');
        Route::post('nestdrop', [MaterialController::class, 'store'])->name('materials.store');
        Route::post('nestdrop/{material}/like', [MaterialController::class, 'like'])->name('materials.like');
        Route::post('nestdrop/{material}/save', [MaterialController::class, 'save'])->name('materials.save');
        Route::post('nestdrop/{material}/report', [MaterialController::class, 'report'])->name('materials.report');
    });

});

Route::group(['prefix'=> 'admin'], function(){
    //Routes for Guest admins
    Route::group(['middleware'=>'guest'], function(){
        Route::get('login', [LoginController::class, 'login'])->name('admin.login');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    //Routes for Authenticated admins
    Route::group(['middleware'=>'auth'], function(){
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.home');
        Route::get('upload-book', [AdminController::class, 'showBookUpload'])->name('admin.uploadBook');
        Route::post('store-book', [AdminController::class, 'storeBook'])->name('admin.storeBook');
        Route::get('add-category', [AdminController::class, 'showCategoryUpload'])->name('admin.addCategory');
        Route::post('store-category', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');
    });
});