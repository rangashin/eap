<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\UserProfileController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

    Route::view('profile.kawan-profile-new', 'profile.kawan-profile-new');
    Route::view('profile.subadmin-profile-new', 'profile.subadmin-profile-new');
    Route::view('dashboard-impo', 'dashboard-impo');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('verified');

    Route::get('account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('account', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [UserProfileController::class, 'edit'])->name('account.edit');
    Route::patch('profile', [UserProfileController::class, 'update'])->name('account.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::middleware('secretary')->group(function(){
        Route::prefix('admin')->as('admin.')->group(function(){
            Route::resource('user', ManageUserController::class);
        });
    });
});

require __DIR__.'/auth.php';
