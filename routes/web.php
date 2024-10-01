<?php

use App\Http\Controllers\JobPostController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);
Route::get('/login',[PageController::class,'login']);
Route::get('/signup',[PageController::class,'signup']);
Route::get('/signup-client',[PageController::class,'signupAsClient']);
Route::get('/get-started',[PageController::class,'getStarted']);

//route for job
Route::get('/job',[JobPostController::class,'index']);
Route::post('/job-post',[JobPostController::class,'store']);
Route::get('/edit/{id}',[JobPostController::class,'edit']);
Route::post('/update{id}',[JobPostController::class,'update']);
Route::get('/find-job',[JobPostController::class,'show']);
Route::get('/delete/{id}',[JobPostController::class,'destroy']);