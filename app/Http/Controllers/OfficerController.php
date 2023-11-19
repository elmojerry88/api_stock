<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Police_officers;
use App\Http\Requests\OfficerStoreRequest;
use App\Http\Requests\OfficerUpdateRequest;

class OfficerController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $officers = Police_officers::all();

        return response()->json($officers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OfficerStoreRequest $request)
    {
        $officers = $request->validated();

        Police_officers::create($officers);

        return response()->json('Agente criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $officers = Police_officers::findOrFail($id);

        return response()->json($officers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->only([
        //     'name',
        //     'division',
        //     'nip'

        // ]));
        
        // $officers = Police_officers::findOrFail($id)->update($request->validated());

        // return response()->json('Agente atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Police_officers::findOrFail($id)->delete();

        return response()->json('Agente eliminado com sucesso');
    }

    public function countOfficers()
    {
        $officer = Police_officers::count();

        return response($officer);
    }
}
