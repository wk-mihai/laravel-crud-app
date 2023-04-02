<?php
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\TrainingsController;
use App\Http\Controllers\Admin\TypesController;

Route::prefix('trainings')->group(function () {
    Route::get('/', [TrainingsController::class, 'index'])->name('admin.trainings.index');
    Route::get('create', [TrainingsController::class, 'create'])->name('admin.trainings.create');
    Route::get('{training}/edit', [TrainingsController::class, 'edit'])->name('admin.trainings.edit');
    Route::get('{training}', [TrainingsController::class, 'show'])->name('admin.trainings.show');
    Route::post('/', [TrainingsController::class, 'store'])->name('admin.trainings.store');
    Route::patch('{training}', [TrainingsController::class, 'update'])->name('admin.trainings.update');
    Route::delete('{training}', [TrainingsController::class, 'destroy'])->name('admin.trainings.destroy');
});

Route::prefix('types')->group(function () {
    Route::get('/', [TypesController::class, 'index'])->name('admin.types.index');
    Route::get('create', [TypesController::class, 'create'])->name('admin.types.create');
    Route::get('{type}/edit', [TypesController::class, 'edit'])->name('admin.types.edit');
    Route::get('{type}', [TypesController::class, 'show'])->name('admin.types.show');
    Route::post('/', [TypesController::class, 'store'])->name('admin.types.store');
    Route::patch('{type}', [TypesController::class, 'update'])->name('admin.types.update');
    Route::delete('{type}', [TypesController::class, 'destroy'])->name('admin.types.destroy');
});

Route::prefix('users')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('admin.users.index');
    Route::get('create', [UsersController::class, 'create'])->name('admin.users.create');
    Route::get('{user}/edit', [UsersController::class, 'edit'])->name('admin.users.edit');
    Route::get('{user}', [UsersController::class, 'show'])->name('admin.users.show');
    Route::post('/', [UsersController::class, 'store'])->name('admin.users.store');
    Route::patch('{user}', [UsersController::class, 'update'])->name('admin.users.update');
    Route::delete('{user}', [UsersController::class, 'destroy'])->name('admin.users.destroy');
});

Route::prefix('roles')->group(function () {
    Route::get('/', [RolesController::class, 'index'])->name('admin.roles.index');
    Route::get('create', [RolesController::class, 'create'])->name('admin.roles.create');
    Route::get('{role}/edit', [RolesController::class, 'edit'])->name('admin.roles.edit');
    Route::get('{role}', [RolesController::class, 'show'])->name('admin.roles.show');
    Route::post('/', [RolesController::class, 'store'])->name('admin.roles.store');
    Route::patch('{role}', [RolesController::class, 'update'])->name('admin.roles.update');
    Route::delete('{role}', [RolesController::class, 'destroy'])->name('admin.roles.destroy');
});