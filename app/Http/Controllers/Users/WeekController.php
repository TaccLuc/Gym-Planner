<?php

namespace App\Http\Controllers\Users;

use App\Models\Users\Week;
use App\Http\Requests\StoreWeekRequest;
use App\Http\Requests\UpdateWeekRequest;
use App\Http\Controllers\Controller;

class WeekController extends Controller
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
    public function store(StoreWeekRequest $request)
    {
        $data = $request->validated();

        Week::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Week $week)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Week $week)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWeekRequest $request, Week $week)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Week $week)
    {
        //
    }
}
