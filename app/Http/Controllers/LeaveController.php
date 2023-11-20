<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave_weapons;
use App\Models\Weapons;
use App\Models\Police_officers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class LeaveController extends Controller
{


    public function index()
    {
        $leave = Leave_weapons::all();

        return response()->json($leave);
    }


    public function store(Request $request)
    {
        $leave = $request->only([
            'officerReceive',
            'weaponReceive',
            'qtdBulletsReceive',
            'weaponNumberReceive',
        ]);

        $id_weapon = $request->weaponReceive;

        $officer = $request->officerReceive;

        $officer = Police_officers::where('name', $officer)->first();


        if (!$officer){
            return response("Usuário não encontrado", 404) ;
            die;
        }
        
        else{

            $weapon = Weapons::findOrFail($id_weapon);
        
            $weapon->decrement('quantity_stock');
    
           
    
            $data['officer'] = $officer->name;
            $data['nip_officer'] = $officer->nip;
            $data['weapon'] = $weapon->name ."-". $weapon->model;
            $data['qtd_bullets'] = $request->qtdBulletsReceive;
            $data['weapon_number'] = $request->weaponNumberReceive;

            
            Leave_weapons::create($data);
    
    
            return response('Saída registrada com sucesso');
        }
}




    public function show(string $id)
    
    {
        $leave = Leave_weapons::findOrFail($id)->first();

        return response()->json($leave);
    }




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
