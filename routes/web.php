<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client;
use App\Http\Controllers\Freelancer;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\JobProposalController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\CheckUserStatus;

Route::get('/', [PageController::class, 'index']);
// Route::get('/signup-freelancer', [PageController::class, 'signupAsFreelancer']);
Route::get('/get-started', [PageController::class, 'getStarted'])->name('get-started');

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


Route::middleware(['auth', CheckUserStatus::class])->group(function () {

    // Freelancer Routes
    Route::get('/find-job', [JobPostController::class, 'showActiveJobs'])->name('freelancer.dashboard');
    Route::get('/setup-profile', [ProfileController::class, 'UserProfileDetailsForm'])->name('freelancer.profilesetup');
    Route::post('/setup-profile', [ProfileController::class, 'store'])->name('profiles.store');
    // Route::get('/freelancer/setting/profile', [Freelancer::class, 'profile']);
    Route::get('/freelancer/setting/profile', [ProfileController::class, 'show'])->name('freelancer.profile');
    Route::get('/freelancer/setting/edit_profile/{id}', [ProfileController::class, 'edit'])->name('freelancer.edit_profile');
    Route::post('/freelancer/setting/update_profile/{id}', [ProfileController::class, 'update'])->name('freelancer.edit_update');
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
    Route::get('/job-post', [JobPostController::class, 'index'])->name('job.post');
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
    Route::get('/proposal-status-list', [JobProposalController::class, 'showProposalStatus'])->name('proposal.status');
    Route::post('/proposals/{id}/accept', [JobProposalController::class, 'acceptProposal'])->name('proposals.accept');
    Route::post('/proposals/{id}/reject', [JobProposalController::class, 'rejectProposal'])->name('proposals.reject');


    Route::get('/view-details/{job}', [PaymentController::class, 'showContractPage'])->name('view.freelancer_details');
    // Route::get('/contract', [Freelancer::class, 'contractProject']);


    //admin route
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'showUsersPage'])->name('admin.users');
        Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::get('/payments', [AdminController::class, 'showPaymentsPage'])->name('admin.payments');
        //suspend and active
        Route::post('/suspend/{user}', [AdminController::class, 'suspendUser'])->name('admin.suspend');
        Route::post('/activate/{user}', [AdminController::class, 'activateUser'])->name('admin.activate');
    });


    //routes for projects
    // Route::get('/track-progress',[ProjectModelController::class, 'showProjectsTrackingPage'])->name('projects.track-progress');


    //milestone
    Route::get('/new_projects', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/submit', [ProjectController::class, 'project'])->name('projects.submit');
    Route::post('/project', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/view_projects', [ProjectController::class, 'showProjectFreelancer'])->name('projects.view');
    Route::get('/project_list', [ProjectController::class, 'show'])->name('projects.shows');
    Route::post('/set_pending/{project}', [ProjectController::class, 'setPending'])->name('projects.setPending');
    Route::post('/set_in_progress/{project}', [ProjectController::class, 'setInProgress'])->name('projects.setInProgress');
    Route::post('/set_completed/{project}', [ProjectController::class, 'setCompleted'])->name('projects.setCompleted');

    // Route::get('/projectssss', [MilestoneController::class, 'showMileStonePage'])->name('milestones.index');
    // Route::post('/save-milestones', [MilestoneController::class, 'store'])->name('milestones.store');
    // Route::get('/milestones', [MilestoneController::class, 'show'])->name('milestones.show');
    // Route::patch('/milestones/{milestone}', [MilestoneController::class, 'update'])->name('milestones.update');


    //payment controller
    Route::post('/payment', [PaymentController::class, 'khaltiPayment'])->name('payment.khalti');
    Route::get('/epayment/verify/{id}/{jId}/{uId}', [PaymentController::class, 'verifyPayment'])->name('payment.verify');
    // Route::post('/payment/freelancer', [PaymentController::class, 'payFreelancer'])->name('payment.freelancer');
    Route::post('/admin/pay-freelancer', [PaymentController::class, 'payFreelancer'])->name('admin.payFreelancer');
    Route::post('/release-payment', [PaymentController::class, 'releasePayment'])->name('release.payment');

});
