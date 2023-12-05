<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Models\Leave_weapons;
use App\Models\Weapons;
use App\Models\Police_officers;
use App\Models\Registers;


class LeaveController extends Controller
{


    public function index()
    {
        $leave = Leave_weapons::limit(5)->orderBy('id', 'desc')->get();

        return response()->json($leave);
    }


    public function store(Request $request)
    {
        $leave = $request->only([
            'officerLeave',
            'weaponLeave',
            'qtdBulletsLeave',
            'weaponNumberLeave',
        ]);

        $id_weapon = $request->weaponLeave;

        $officer = $request->officerLeave;

        $officer = Police_officers::where('name', $officer)->first();


        if (!$officer){
            return response("Agente não encontrado", 404) ;
            die;
        }

        $weapon = Weapons::findOrFail($id_weapon);

        if (!$weapon){
            return response('Arma não encontrada', 404);
            die;
        }
        
        if($weapon->quantity_stock <= 0){

            return response('Arma indisponivel em estoque', 406);
            die;

        }

        $leave = Leave_weapons::where('weapon_number', $request->weaponNumberLeave)->first();

        if($leave->weapon_number === $request->weaponNumberLeave){
            return response('Não foi possível completar essa operação, arma já registrada', 406);
            die;
        }

        $register = Registers::where('weapon_number', $request->weaponNumberLeave)->first();

        if($register->weapon_number === $request->weaponNumberLeave){
            return response('Não foi possível completar essa operação, arma já registrada', 406);
            die;
        }
        
        $weapon->decrement('quantity_stock');
    
           
    
        $data['officer'] = $officer->name;
        $data['nip_officer'] = $officer->nip;
        $data['weapon'] = $weapon->name ."-". $weapon->model;
        $data['qtd_bullets'] = $request->qtdBulletsLeave;
        $data['weapon_number'] = $request->weaponNumberLeave;

            
        Leave_weapons::create($data);

        Registers::create($data);
    
    
        return response('Saída registrada com sucesso');
        
    }

    public function countLeaves()
    {
        $leave = Leave_weapons::count();

        return response($leave);
    }







    // public function show(string $id)
    
    // {
    //     $leave = Leave_weapons::findOrFail($id)->first();

    //     return response()->json($leave);
    // }




    // public function destroy(string $id)
    // {
    //     // User::findOrFail($id)->delete();

    //     // return response()->json('Saída eliminada com sucesso');
    // }


}
