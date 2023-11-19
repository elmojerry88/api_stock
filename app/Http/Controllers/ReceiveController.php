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
        $receive = $request->only([
            'id_officer',
            'id_weapon',
            'qtd_bullets',
            'weapon_number',
        ]);

        $id_weapon = $receive['id_weapon'];

        $id_officer = $receive['id_officer'];

        $officer = Police_officers::findOrFail($id_officer);

        $weapon = Weapons::findOrFail($id_weapon);
        
        $weapon->increment('quantity_stock');

        $data['officer'] = $officer->name;
        $data['nip_officer'] = $officer->nip;
        $data['weapon'] = $weapon->name ."-". $weapon->model;
        $data['qtd_bullets'] = $request->qtd_bullets;
        $data['weapon_number'] = $request->weapon_number;

        // dd($leave);

        // dd($weapon);
        #acessar o stock e diminuir 
        
        receive_weapons::create($data);


        return response('Saída registrada com sucesso');


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

    public function countReceives()
    {
        $receive = Receive_weapons::count();

        return response($receive);
    }

    public function receive()
    {
        #criar uma tabela


        
        #chama a tabela de armas 

        #aumena a quantidade 



    }
}
