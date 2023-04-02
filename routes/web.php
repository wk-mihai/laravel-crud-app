<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TrainingsController;
use App\Http\Controllers\FilesController;

Auth::routes([
    'register' => false,
    'verify'   => false,
    'confirm'  => false
]);


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

Route::middleware('auth')->group(function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('trainings')->group(function () {
        Route::get('/{type?}', [TrainingsController::class, 'index'])->name('trainings.index');
        Route::get('training-page/{training}', [TrainingsController::class, 'show'])->name('trainings.show');
    
        Route::get('{id}/file/{fileId}', [FilesController::class, 'getFile'])->name('training.files');
    });
});