<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

use Inertia\Inertia;

// Controllers
use App\Http\Controllers\Users\PlannerController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\WorkoutController;
use App\Models\Users\Exercise;
use App\Models\Users\Movement;

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

    Route::resource('movements', Movement::class);
    Route::resource('exercises', Exercise::class);
    Route::resource('days', Day::class);
    Route::resource('workouts', Workout::class);
});

require __DIR__.'/auth.php';
