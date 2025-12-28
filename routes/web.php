<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('studynest');
});

Route::get('/ourteam', function () {
    return view('ourteam');
});


Route::get('/nest-chat', [HomepageController::class, 'index'])->name('nestchat.index');
Route::post('/nest-chat/ask', [HomepageController::class, 'askQuestion'])->name('nestchat.ask');
Route::post('/nest-chat/{id}/reply', [HomepageController::class, 'replyToQuestion'])->name('nestchat.reply');
Route::post('/nest-chat/{id}/like', [HomepageController::class, 'likeQuestion'])->name('nestchat.like');
Route::get('/nest-chat/{id}', [HomepageController::class, 'showQuestion'])->name('nestchat.show');
Route::get('/nestchat/stats/{id}', [HomepageController::class, 'stats']);
Route::get('/nestchat', [HomepageController::class, 'search'])->name('nestchat.index');
Route::get('/materials', [MaterialController::class, 'index2'])->name('materials.index');


    Route::get('/nestdrop', [MaterialController::class, 'index'])->name('nestdrop.index');
    Route::post('/nestdrop', [MaterialController::class, 'store'])->name('materials.store');
    Route::post('/nestdrop/{material}/like', [MaterialController::class, 'like'])->name('materials.like');
    Route::post('/nestdrop/{material}/save', [MaterialController::class, 'save'])->name('materials.save');
    Route::post('/nestdrop/{material}/report', [MaterialController::class, 'report'])->name('materials.report');



// Book upload
Route::get('/admin/upload-book', [AdminController::class, 'showBookUpload'])->name('admin.uploadBook');
Route::post('/admin/store-book', [AdminController::class, 'storeBook'])->name('admin.storeBook');

// Category upload
Route::get('/admin/add-category', [AdminController::class, 'showCategoryUpload'])->name('admin.addCategory');
Route::post('/admin/store-category', [AdminController::class, 'storeCategory'])->name('admin.storeCategory');


// Learning Hub (all books)
Route::get('/learning-hub', [AdminController::class, 'learningHub'])->name('learning.hub');