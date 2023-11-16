<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weapons;
use App\Http\Requests\WeaponStoreRequest;
use App\Http\Requests\WeaponUpdateRequest;

class WeaponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weapons = Weapons::all();

        return response()->json($weapons);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeaponStoreRequest $request)
    {
        $weapon = $request->validated();

        Weapons::create($weapon);

        return response()->json('Arma adicionada com sucesso');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $weapon = Weapons::findOrFail($id);

        return response()->json($weapon);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeaponUpdateRequest $request, string $id)
    {
        $weapon = Weapons::findOrFail($id)->update($request->validated());
        return response()->json('Arma atualizada com sucesso');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Weapons::findOrFail($id)->delete();
    }
}
