<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave_weapons;
use App\Models\Weapons;
use App\Models\Police_officers;

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
        $leave = $request->only([
            'id_officer',
            'id_weapon',
            'qtd_bullets',
            'weapon_number',
        ]);

        $id_weapon = $leave['id_weapon'];

        $id_officer = $leave['id_officer'];

        $officer = Police_officers::findOrFail($id_officer);

        $weapon = Weapons::findOrFail($id_weapon);
        
        $weapon->decrement('quantity_stock');

        $data['officer'] = $officer->name;
        $data['nip_officer'] = $officer->nip;
        $data['weapon'] = $weapon->name ."-". $weapon->model;
        $data['qtd_bullets'] = $request->qtd_bullets;
        $data['weapon_number'] = $request->weapon_number;

        // dd($leave);

        // dd($weapon);
        #acessar o stock e diminuir 
        
        Leave_weapons::create($data);


        return response('Saída registrada com sucesso');

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

    public function countLeaves()
    {
        $leave = Leave_weapons::count();

        return response($leave);
    }
}
