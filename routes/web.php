<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaApEController;
use App\Http\Controllers\SaNaEController;
use App\Http\Controllers\SaApCmController;
use App\Http\Controllers\SaApJsController;
use App\Http\Controllers\SaNaCmController;
use App\Http\Controllers\SaNaJsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\CaseManagerController;
use App\Http\Controllers\SaRolesCmController;
use App\Http\Controllers\SaRolesEController;
use App\Http\Controllers\SaRolesJsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Public Pages */

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/we-are', function () {
    // Logic for agency registration
    return view('we_are');
})->name('we-are');

Route::get('/how-it-works', function () {
    // Logic for agency registration
    return view('how_it_works');
})->name('how-it-works');

Route::get('/contact', function () {
    // Logic for agency registration
    return view('contact');
})->name('contact');

Route::get('/recruitment-services', function () {
    // Logic for agency registration
    return view('recruitment_services');
})->name('recruitment-services');

Route::get('/consulting-services', function () {
    // Logic for agency registration
    return view('consulting_services');
})->name('consulting-services');


/* Form related */
Route::get('/register/job_seeker', function () {
    // Logic for job seeker registration
    return view('job_seeker');
})->name('job_seeker');

Route::get('/register/case_manager', function () {
    // Logic for case manager registration
    return view('case_manager');
})->name('case_manager');

Route::get('/register/employer', function () {
    // Logic for agency registration
    return view('employer');
})->name('employer');



Route::get('/register/job_seeker/application-form-job-seeker', function () {
    // Logic for job seeker registration
    return view('application-forms/job_seeker_application');
})->name('application-form-job-seeker');

Route::post('/register/job_seeker/application-form-job-seeker/thank-you', [JobSeekerController::class, 'store'])->name('job_seeker-applicant.store');

Route::get('/thank-you', function () {
    return view('application-forms/thank_you');
});


/* Case manager application */
Route::get('/register/case_manager/application-form-case-manager', function () {
    // Logic for job seeker registration
    return view('application-forms/case_manager_application');
})->name('application-form-case-manager');

Route::post('/register/case_manager/application-form-case-manager/thank-you', [CaseManagerController::class, 'store'])->name('case_manager-applicant.store');


/* Employer Application */
Route::get('/register/employer/application-form-employer', function () {
    // Logic for job seeker registration
    return view('application-forms/employer_application');
})->name('application-form-employer');

Route::post('/register/employer/application-form-employer/thank-you', [EmployerController::class, 'store'])->name('employer-applicant.store');




/* ********* */


/* Admin Panel Related */


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



/* Super Admin Panel */
Route::middleware(['auth','verified'])->group(function () {

    /* New Applications Section */
    Route::get('/dashboard/job-seeker-applications', [SaNaJsController::class, 'index']
    )->name('job-seeker-applications');

    Route::get('/dashboard/case-manager-applications', [SaNaCmController::class, 'index']
    )->name('case-manager-applications');

    Route::get('/dashboard/employer-applications', [SaNaEController::class, 'index']
    )->name('employer-applications');
    

    /* edit job seeker: */
    Route::get('/dashboard/job-seeker-applications/edit/{id}', [SaNaJsController::class, 'edit'])
    ->name('job-seeker.edit');

    Route::get('/{attachmentPath}', [SaNaJsController::class, 'show'])
    ->name('attachments.show');

    Route::get('/{videoPath}', [SaNaJsController::class, 'showVideo'])
    ->name('videos.show');
    
    Route::patch('/dashboard/job-seeker-applications/{jobSeeker}', [SaNaJsController::class, 'update'])
    ->name('job_seeker.update');

    Route::delete('/dashboard/job-seeker-applications/{jobSeeker}', [SaNaJsController::class, 'destroy'])
    ->name('job-seeker.destroy');


    /* edit Case Manager: */
    Route::get('/dashboard/case-manager-applications/edit/{id}', [SaNaCmController::class, 'edit'])
    ->name('case-manager.edit');

    Route::get('/{attachmentPath}', [SaNaCmController::class, 'show'])
    ->name('attachments.show');

    Route::get('/{videoPath}', [SaNaCmController::class, 'showVideo'])
    ->name('videos.show');


    Route::patch('/dashboard/case-manager-applications/{caseManager}', [SaNaCmController::class, 'update'])
    ->name('case-manager.update');

    Route::delete('/dashboard/case-manager-applications/{caseManager}', [SaNaCmController::class, 'destroy'])
    ->name('case-manager.destroy');


    

      /* edit Employer: */

      Route::get('/dashboard/employer-applications/edit/{id}', [SaNaEController::class, 'edit'])
      ->name('employer.edit');
  
      Route::get('/{attachmentPath}', [SaNaEController::class, 'show'])
      ->name('attachments.show');
  
      Route::get('/{videoPath}', [SaNaEController::class, 'showVideo'])
      ->name('videos.show');

      Route::patch('/dashboard/employer-applications/{employer}', [SaNaEController::class, 'update'])
      ->name('employer.update');

      Route::delete('/dashboard/employer-applications/{employer}', [SaNaEController::class, 'destroy'])
      ->name('employer.destroy');




      
    /* Approved Application section */

    /* Approved Job Seekers */
    Route::get('/dashboard/approved-job-seeker-applications', [SaApJsController::class, 'index']
    )->name('approved-job-seeker');

    Route::get('/dashboard/approved-case-manager-applications', [SaApCmController::class, 'index']
    )->name('approved-case-manager');


    Route::get('/dashboard/approved-employer-applications', [SaApEController::class, 'index']
    )->name('approved-employer');

     /* Roles Section */

     Route::get('/dashboard/roles-job-seeker', [SaRolesJsController::class, 'index']
     )->name('roles-job-seeker');

     Route::get('/dashboard/roles-case-manager', [SaRolesCmController::class, 'index']
     )->name('roles-case-manager');

     Route::get('/dashboard/roles-employer', [SaRolesEController::class, 'index']
     )->name('roles-employer');


    /* Reports Section */    
    Route::get('/dashboard/reports', function () {
        // Logic for agency registration
        return view('super-admin-related/reports');
    })->name('reports');

    /* All Users Section */    
    Route::get('/dashboard/users', function () {
        // Logic for agency registration
        return view('super-admin-related/users');
    })->name('users');
    
    /* Settings Section */
    Route::get('/dashboard/settings', function () {
        // Logic for agency registration
        return view('super-admin-related/settings');
    })->name('settings');
    

    

});

/* ********* */

require __DIR__.'/auth.php';
