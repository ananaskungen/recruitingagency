<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/register/case_manager/application-form-case-manager', function () {
    // Logic for case manager registration
    return view('application-forms/case_manager_application');
})->name('application-form-case-manager');

Route::get('/register/employer/application-form-employer', function () {
    // Logic for agency registration
    return view('application-forms/employer_application');
})->name('application-form-employer');


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



/* Super Admin Panel Related */
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/dashboard/recruiting', function () {
        // Logic for agency registration
        return view('super-admin-related/recruiting');
    })->name('recruiting');

    Route::get('/dashboard/approved-applicants', function () {
        // Logic for agency registration
        return view('super-admin-related/approved_applicants');
    })->name('approved-applicants');
    
    Route::get('/dashboard/reports', function () {
        // Logic for agency registration
        return view('super-admin-related/reports');
    })->name('reports');

    Route::get('/dashboard/users', function () {
        // Logic for agency registration
        return view('super-admin-related/users');
    })->name('users');
    
    Route::get('/dashboard/settings', function () {
        // Logic for agency registration
        return view('super-admin-related/settings');
    })->name('settings');
    

    

});

/* ********* */

require __DIR__.'/auth.php';
