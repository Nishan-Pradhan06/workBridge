<?php

use App\Http\Controllers\auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client;
use App\Http\Controllers\Freelancer;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\JobProposalController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContractModelController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\ProjectModelController;

Route::get('/', [PageController::class, 'index']);
Route::get('/signup-freelancer', [PageController::class, 'signupAsFreelancer']);
Route::get('/get-started', [PageController::class, 'getStarted']);

//register

// clients
Route::get('/client-register', [RegisterController::class, 'showRegistrationForm'])->name('client-register');
Route::post('/client-register', [RegisterController::class, 'clientRegister']);
// freelancer
Route::get('/freelancer-register', [RegisterController::class, 'showRegistrationFormFreelancer'])->name('freelancer-register');
Route::post('/freelancer-register', [RegisterController::class, 'freelancerRegister']);


//login route
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
// // Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); ..logout remains to implements

// //freelancer
// Route::get('/find-job', [JobPostController::class, 'showActiveJobs'])->name('freelancer.dashboard')->middleware('auth');
// Route::get('/setup-profile', [ProfileController::class, 'UserProfileDetailsForm'])->name('freelancer.profilesetup');
// Route::post('/setup-profile', [ProfileController::class, 'store'])->middleware('auth')->name('profiles.store');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Implementing logout functionality


Route::middleware(['auth'])->group(function () {

    // Freelancer Routes
    Route::get('/find-job', [JobPostController::class, 'showActiveJobs'])->name('freelancer.dashboard');
    Route::get('/setup-profile', [ProfileController::class, 'UserProfileDetailsForm'])->name('freelancer.profilesetup');
    Route::post('/setup-profile', [ProfileController::class, 'store'])->name('profiles.store');
    // Route::get('/freelancer/setting/profile', [Freelancer::class, 'profile']);
    Route::get('/freelancer/setting/profile', [ProfileController::class, 'show'])->name('freelancer.profile');
    Route::get('/freelancer/setting/contactInfo', [Freelancer::class, 'contactInfo'])->name('freelancer.accountSetting');
    Route::get('/freelancer/setting/billing-and-payments', [Freelancer::class, 'billingAndPayment']);
    Route::get('/freelancer/setting/password-and-security', [Freelancer::class, 'PasswordAndSecurity'])->name('freelancer.password-security');
    Route::get('/apply/{job}', [JobProposalController::class, 'index']);


    // Route::get('/contract', [Freelancer::class, 'contractProject']);

    //client
    Route::get('/client/dashboard/{id}', [Client::class, 'show'])->name('client.dashboard')->middleware('auth');
    Route::post('/contracts', [Client::class, 'contracts']);
    Route::get('/client-info', [Client::class, 'Info']);
    Route::post('/payments/deposit-methods', [Client::class, 'clientInfo']);
    Route::post('/password-and-security', [Client::class, 'clientInfo']);

    //route for job
    Route::get('/job-post', [JobPostController::class, 'index']);
    Route::post('/save-job', [JobPostController::class, 'store'])->middleware('auth');
    Route::get('/all-jobs', [JobPostController::class, 'showAllJobs'])->name('all-jobs');
    Route::get('/edit/{id}', [JobPostController::class, 'edit']);
    Route::post('/update/{id}', [JobPostController::class, 'update']);
    Route::get('/delete/{id}', [JobPostController::class, 'destroy']);
    Route::get('/remove/{id}', [JobPostController::class, 'softDelete']);
    Route::get('/restore/{id}', [JobPostController::class, 'restore']);

    //route for job proposal
    Route::post('/submit-proposal/{job}', [JobProposalController::class, 'store'])->name('proposal.post');
    Route::get('/applicants/{job}', [JobProposalController::class, 'show'])->name('proposal.form');

    Route::get('/contract/{job}', [ContractModelController::class, 'showContractPage'])->name('contract.freelancer');
    // Route::get('/contract', [Freelancer::class, 'contractProject']);


    //admin route
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'showUsersPage'])->name('admin.users');
    Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');


    //routes for projects
    // Route::get('/track-progress',[ProjectModelController::class, 'showProjectsTrackingPage'])->name('projects.track-progress');


    //milestone
    Route::get('/projects', [MilestoneController::class, 'showMileStonePage'])->name('milestones.index');
    Route::post('/save-milestones', [MilestoneController::class, 'store'])->name('milestones.store');
    Route::get('/milestones', [MilestoneController::class, 'show'])->name('milestones.show');
    // Route::patch('/milestones/{milestone}', [MilestoneController::class, 'update'])->name('milestones.update');
});
