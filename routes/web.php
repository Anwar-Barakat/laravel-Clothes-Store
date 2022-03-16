<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\SectionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Auth::routes();

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::namespace('Admin')->prefix('/admin')->as('admin.')->group(function () {

            Route::group(['middleware' => 'admin'], function () {

                Route::get('/dashboard', function () {
                    return view('index');
                })->name('dashboard');

                Route::get('settings',                              [AdminSettingController::class, 'settings'])->name('settings');

                Route::post('check-current-password',               [AdminSettingController::class, 'checkCurrentPassword'])->name('check.currnet.pwd');

                Route::post('update-password',                      [AdminSettingController::class, 'updatePassword'])->name('update.password');

                Route::match(['get', 'post'], 'update-detail',      [AdminSettingController::class, 'updateDetails'])->name('update.details');

                // Sections :
                Route::get('sections/index',                        [SectionController::class, 'index'])->name('sections.index');

                Route::post('update-section-status',       [SectionController::class, 'updateSectionStatus']);


                Route::get('logout',                                [AdminController::class, 'logout'])->name('logout');
            });
            Route::match(['get', 'post'], '/login',                 [AdminController::class, 'login'])->name('login');
        });
        Route::get('/{page}',                                       [AdminController::class, 'index']);
    }
);
