<?php

namespace App\Http\Controllers;

use App\Events\ReceiveStock;
use Illuminate\Http\Request;
use App\Models\Receive_weapons;
use App\Models\Weapons;

class ReceiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $receive = Receive_weapons::all();

        return response()->json($receive);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $receive = $request->validated();

        //$weapon = Weapons::findOrfail($id);

        Receive_weapons::create($receive);

        event(new ReceiveStock($receive));

        return response()->json('Entrada registrada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $receive = Receive_weapons::findOrFail($id)->first();

        return response()->json($receive);
    }
    

    /**
     * Update the specified resource in storage.
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
        Receive_weapons::findOrFail($id)->delete();
    }
}
