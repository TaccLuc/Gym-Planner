<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\Movement;
use App\Http\Requests\StoreMovementRequest;
use App\Http\Requests\UpdateMovementRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Users\Workout;
use App\Models\Users\Week;
use App\Models\Users\Day;
use App\Models\Users\Exercise;

class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $movements = Movement::where('user_id', Auth::id())->get();
        return Inertia::render('Movements/Index', compact('movements'));
        
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
    public function store(StoreMovementRequest $request)
    {
        $data = $request->validated();

        Movement::create([
            'name' => strtolower($data['name']),
            'reps' => $data['reps'],
            'max_weight' => $data['max_weight'],
            'user_id' => $data['user_id']
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Movement $movement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movement $movement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovementRequest $request, Movement $movement)
    {
        $data = $request->validated();
        $movement->update($data);

        $user = User::where('id', Auth::id())->with('workouts.weeks.days.exercises')->firstOrFail();
        $exercises = $user->workouts->flatMap->weeks->flatMap->days->flatMap->exercises;

        foreach ($exercises as $exercise) {
            if ($exercise['name'] == $movement['name']) {
                $exercise['weight'] = $movement['max_weight'];
                $exercise->save();
            }
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movement $movement)
    {
        $movement->delete();
    }
}
