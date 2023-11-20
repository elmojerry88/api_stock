<?php

namespace App\Http\Controllers;

use App\Events\ReceiveStock;
use Illuminate\Http\Request;
use App\Models\Receive_weapons;
use App\Models\Weapons;
use App\Models\Police_officers;

class ReceiveController extends Controller
{
  
    
    public function index()
    {
        $receive = Receive_weapons::all();

        return response()->json($receive);
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

        if (!$officer)
        
        {
            return response("Usuário não encontrado", 404) ;
            die;
        }
        
        else{

            $weapon = Weapons::findOrFail($id_weapon);
        
            $weapon->increment('quantity_stock');
    
            $data['officer'] = $officer->name;
            $data['nip_officer'] = $officer->nip;
            $data['weapon'] = $weapon->name ."-". $weapon->model;
            $data['qtd_bullets'] = $request->qtdBulletsReceive;
            $data['weapon_number'] = $request->weaponNumberReceive;
            
            Receive_weapons::create($data);

            return response('Entrada registrada com sucesso');
        }
        
    }

    
    public function show(string $id)
    {
        $receive = Receive_weapons::findOrFail($id)->first();

        return response()->json($receive);
    }
    


    public function destroy(string $id)
    {
        Receive_weapons::findOrFail($id)->delete();
    }



    public function countReceives()
    {
        $receive = Receive_weapons::count();

        return response($receive);
    }

}
