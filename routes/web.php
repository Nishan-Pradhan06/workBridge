<?php

use App\Http\Controllers\Freelancer;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);
Route::get('/login',[PageController::class,'login']);
Route::get('/signup-freelancer',[PageController::class,'signupAsFreelancer']);
Route::get('/signup-client',[PageController::class,'signupAsClient']);
Route::get('/get-started',[PageController::class,'getStarted']);

//freelancer
Route::get('/find-job', [JobPostController::class, 'show']);
Route::get('/freelancer/profile',[Freelancer::class,'profile']);
Route::get('freelancer/setting/contactInfo',[Freelancer::class,'contactInfo']);

//route for job
Route::get('/job',[JobPostController::class,'index']);
Route::post('/job-post',[JobPostController::class,'store']);
Route::get('/edit/{id}',[JobPostController::class,'edit']);
Route::post('/update{id}',[JobPostController::class,'update']);
Route::get('/find-job',[JobPostController::class,'show']);
Route::get('/delete/{id}',[JobPostController::class,'destroy']);