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


    public function destroy(string $id)
    {
        Police_officers::findOrFail($id)->delete();

        return response()->json('Agente eliminado com sucesso');
    }


    public function countOfficers()
    {
        $officer = Police_officers::all();

        $officer = $officer->count();

        return response($officer);
    }
}
