<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Database\Capsule\Manager;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ManageApplicantController;

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
    // Route::view('applicant.registration-copy', 'applicant.registration-copy');
    Route::view('dashboard-impo', 'dashboard-impo');
    Route::view('admin.applicant-rejected', 'admin.applicant-rejected');
    
    
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');
    // Route::get('registerrr', [DashboardController::class, 'edit'])->name('register.edit');
    // Route::post('registerrr', [DashboardController::class, 'store'])->name('register.store');


    Route::get('registration', [ApplicantController::class, 'edit'])->name('registration.edit');
    Route::post('registration', [ApplicantController::class, 'update'])->name('registration.update');

    Route::get('account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('account', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [UserProfileController::class, 'edit'])->name('account.edit');
    Route::patch('profile', [UserProfileController::class, 'update'])->name('account.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('applicant')->group(function(){
        Route::post('applicant/setinterviewdate', [ManageApplicantController::class, 'setInterviewDate'])->name('applicant.setinterviewdate');
    });
    
    Route::middleware('secretary')->group(function(){
        Route::prefix('admin')->as('admin.')->group(function(){
            Route::resource('user', ManageUserController::class);

            Route::get('applicant', [ManageApplicantController::class, 'index'])->name('applicant.index');
            Route::get('applicant/review', [ManageApplicantController::class, 'review'])->name('applicant.review.index');
            Route::post('applicant/review', [ManageApplicantController::class, 'updateApplicantReview'])->name('applicant.review.update');
            Route::get('applicant/review/{user_id}', [ManageApplicantController::class, 'reviewShow'])->name('applicant.review.show');
            Route::patch('applicant/review/{user_id}', [ManageApplicantController::class, 'resubmit'])->name('applicant.review.resubmit');
            Route::get('applicant/selected', [ManageApplicantController::class, 'selected'])->name('applicant.selected.index');
            Route::post('applicant/selected', [ManageApplicantController::class, 'updateApplicantSelected'])->name('applicant.selected.update');
            Route::get('applicant/rejected', [ManageApplicantController::class, 'rejected'])->name('applicant.rejected.index');

            
        });
    });
});

require __DIR__.'/auth.php';
