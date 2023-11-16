<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave_weapons;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leave = Leave_weapons::all();

        return response()->json($leave);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $leave = $request->validated();

        Leave_weapons::create($leave);

        return response()->json('Saída registrada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $leave = Leave_weapons::findOrFail($id)->first();

        return response()->json($leave);
    }

    /**
     * Update the specified resource in     storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // User::findOrFail($id)->delete();

        // return response()->json('Saída eliminada com sucesso');
    }
}
