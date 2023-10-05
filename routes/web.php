<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use Inertia\Inertia;

// Controllers
use App\Http\Controllers\Users\PlannerController;
use App\Http\Controllers\Users\MovementController;
use App\Http\Controllers\Users\ExerciseController;
use App\Http\Controllers\Users\DayController;
use App\Http\Controllers\Users\WorkoutController;

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

Route::get('/', function () {
    return Inertia::render('Auth/Login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/planner', [PlannerController::class, 'index'])->name('planner');
    Route::resource('movements', MovementController::class);
    Route::resource('exercises', ExerciseController::class);
    Route::resource('days', DayController::class);
    Route::resource('workouts', WorkoutController::class)->parameters(['slug' => 'slug']);

});

require __DIR__.'/auth.php';
