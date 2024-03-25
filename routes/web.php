<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Auth::routes();


Route::group(["middleware"=>"auth"],function(){
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/store',[PostController::class,'store'])->name('post.store');
    Route::get('/show/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/update/{id}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('post.destroy');





});
