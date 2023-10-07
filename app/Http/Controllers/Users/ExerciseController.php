<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\Exercise;
use App\Http\Requests\StoreExerciseRequest;
use App\Http\Requests\UpdateExerciseRequest;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Users\Movement;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExerciseRequest $request)
    {
        $data = $request->validated();
        $weight = null;

        if (isset($data['percentage'])) {
            $movements = Movement::where('user_id', Auth::id())->get();
            foreach ($movements as $movement) {
                if ($movement['name'] === strtolower($data['name'])) {
                    $weight = $movement['max_weight'];
                    break;
                }
            }
        }
        else if (isset($data['weight'])) {
            $weight = $data['weight'];
        }

        Exercise::create([
            'name' => strtolower($data['name']),
            'sets' => $data['sets'],
            'reps' => $data['reps'],
            'percentage' => $data['percentage'],
            'weight' => $weight,
            'day_id' => $data['day_id']
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Exercise $exercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exercise $exercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseRequest $request, Exercise $exercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exercise $exercise)
    {
        //
    }
}
