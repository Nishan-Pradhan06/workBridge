<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\Client;
use App\Http\Controllers\Freelancer;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\JobProposalController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/signup-freelancer', [PageController::class, 'signupAsFreelancer']);
Route::get('/signup-client', [PageController::class, 'signupAsClient']);
Route::get('/get-started', [PageController::class, 'getStarted']);

//freelancer
Route::get('/find-job', [JobPostController::class, 'showActiveJobs']);
Route::get('/create-profile', [Freelancer::class, 'createProfile']);
Route::get('/freelancer/setting/profile', [Freelancer::class, 'profile']);
Route::get('/freelancer/setting/contactInfo', [Freelancer::class, 'contactInfo']);
Route::get('/freelancer/setting/billing-and-payments', [Freelancer::class, 'billingAndPayment']);
Route::get('/freelancer/setting/password-and-security', [Freelancer::class, 'PasswordAndSecurity']);
Route::get('/apply/{id}', [JobProposalController::class, 'index']);
Route::get('/contract', [Freelancer::class, 'contractProject']);

//client
Route::get('/client/dashboard', [Client::class, 'Dashboard']);
Route::post('/contracts', [Client::class, 'contracts']);
Route::get('/client-info', [Client::class, 'Info']);
Route::post('/payments/deposit-methods', [Client::class, 'clientInfo']);
Route::post('/password-and-security', [Client::class, 'clientInfo']);

//route for job
Route::get('/job-post', [JobPostController::class, 'index']);
Route::post('/save-job', [JobPostController::class, 'store']);
Route::get('/all-jobs', [JobPostController::class, 'showAllJobs'])->name('all-jobs');
Route::get('/edit/{id}', [JobPostController::class, 'edit']);
Route::post('/update/{id}', [JobPostController::class, 'update']);
Route::get('/delete/{id}', [JobPostController::class, 'destroy']);
Route::get('/remove/{id}', [JobPostController::class, 'softDelete']);
Route::get('/restore/{id}', [JobPostController::class, 'restore']);


//route for job proposal
Route::post('/submit-proposal', [JobProposalController::class, 'store']);
Route::get('/applicants/{jobId}', [JobProposalController::class, 'show'])->name('proposals.show');

