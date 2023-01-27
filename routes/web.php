<?php

use App\Http\Controllers\AdminSettingsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Capsule\Manager;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ManageApplicantController;
use App\Http\Controllers\ManageScholarController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ScholarSubmitRequirementsController;

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
Route::view('sample-new', 'sample-new');

Route::middleware('auth')->group(function () {

    Route::view('applicant-report', 'applicant-report');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');

    Route::get('account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('account', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [UserProfileController::class, 'edit'])->name('account.edit');
    Route::patch('profile', [UserProfileController::class, 'update'])->name('account.update');

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
            Route::prefix('scholar')->as('scholar.')->group(function(){
                Route::get('/', [ManageScholarController::class, 'index'])->name('index');
                Route::post('/', [ManageScholarController::class, 'updateStatus'])->name('updatestatus');
                Route::get('{id}', [ManageScholarController::class, 'show'])->name('show');
                Route::get('{user_id}/edit-attendance', [ManageScholarController::class, 'editAttendance'])->name('attendance-edit');
                Route::patch('{applicant_user_id}', [ManageScholarController::class, 'update'])->name('update');
                Route::get('{user_id}/edit-requirements', [ManageScholarController::class, 'editRequirements'])->name('requirements-edit');
                Route::post('{user_id}/regi/{id}', [ManageScholarController::class, 'destroyRegi'])->name('regi-destroy');
                Route::post('{user_id}/report/{id}', [ManageScholarController::class, 'destroyReport'])->name('report-destroy');
                Route::post('{applicant_user_id}/resubmit', [ManageScholarController::class, 'resubmit'])->name('resubmit');
            });
            Route::post('updateyear', [AdminSettingsController::class, 'updateAcadYear'])->name('year-update');
            Route::post('submission', [AdminSettingsController::class, 'submission'])->name('submission-update');
            Route::get('report', [PDFController::class, 'index'])->name('report.index');
            Route::post('report', [PDFController::class, 'generateReport'])->name('report.generate');
        });
    });

    Route::middleware('scholar')->group(function() {
        Route::get('submit-requirements', [ScholarSubmitRequirementsController::class, 'index'])->name('submit-requirements.index');
        Route::post('submit-requirements', [ScholarSubmitRequirementsController::class, 'store'])->name('submit-requirements.store');
    });
});

require __DIR__.'/auth.php';
