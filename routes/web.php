<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Capsule\Manager;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ManageApplicantController;
use App\Http\Controllers\ManageScholarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::view('/', 'welcome');
Route::view('sample', 'sample');

Route::middleware('auth')->group(function () {

    Route::view('applicant.registration-new', 'applicant.registration-new');
    Route::view('dashboard-impo', 'dashboard-impo');
    Route::view('scholar.dashboard', 'scholar.dashboard');
    Route::view('admin.scholar-index', 'admin.scholar-index');

    //Temp Routes for view
    Route::view('admin-scholar-edit-attendance', 'admin-scholar-edit-attendance');
    Route::view('admin.scholar-attendance-show', 'admin.scholar-attendance-show');
    Route::view('admin.scholar-attendance-edit', 'admin.scholar-attendance-edit');
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');
    // Route::get('registerrr', [DashboardController::class, 'edit'])->name('register.edit');
    // Route::post('registerrr', [DashboardController::class, 'store'])->name('register.store');

  
    Route::get('account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('account', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [UserProfileController::class, 'edit'])->name('account.edit');
    Route::patch('profile', [UserProfileController::class, 'update'])->name('account.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('applicant')->group(function(){
        Route::get('registration', [ApplicantController::class, 'edit'])->name('registration.edit');
        Route::post('registration', [ApplicantController::class, 'update'])->name('registration.update');
        Route::post('applicant/setinterviewdate', [ManageApplicantController::class, 'setInterviewDate'])->name('applicant.setinterviewdate');
    });
    
    Route::middleware('secretary')->group(function(){
        Route::prefix('admin')->as('admin.')->group(function(){
            Route::resource('user', ManageUserController::class);
            Route::prefix('applicant')->as('applicant.')->group(function(){
                Route::get('/', [ManageApplicantController::class, 'index'])->name('index');
                Route::get('review', [ManageApplicantController::class, 'review'])->name('review.index');
                Route::post('review', [ManageApplicantController::class, 'updateApplicantReview'])->name('review.update');
                Route::get('review/{user_id}', [ManageApplicantController::class, 'reviewShow'])->name('review.show');
                Route::patch('review/{user_id}', [ManageApplicantController::class, 'resubmit'])->name('review.resubmit');
                Route::get('selected', [ManageApplicantController::class, 'selected'])->name('selected.index');
                Route::post('selected', [ManageApplicantController::class, 'updateApplicantSelected'])->name('selected.update');
                Route::get('rejected', [ManageApplicantController::class, 'rejected'])->name('rejected.index');
            });
            Route::get('scholar', [ManageScholarController::class, 'index'])->name('scholar.index');
            Route::get('scholar/{id}', [ManageScholarController::class, 'show'])->name('scholar.show');
            // Route::get('scholar/{user_id}/edit', [ManageScholarController::class, 'show'])->name('scholar.show');

            
        });
    });
});

require __DIR__.'/auth.php';
