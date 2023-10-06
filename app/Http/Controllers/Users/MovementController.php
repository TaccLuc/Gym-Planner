<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\Movement;
use App\Http\Requests\StoreMovementRequest;
use App\Http\Requests\UpdateMovementRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


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

        Movement::create($data);

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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movement $movement)
    {
        //
    }
}
