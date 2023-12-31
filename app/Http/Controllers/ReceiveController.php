<?php

namespace App\Http\Controllers;

use App\Events\ReceiveStock;
use Illuminate\Http\Request;
use App\Models\Receive_weapons;
use App\Models\Weapons;
use App\Models\Police_officers;
use App\Models\Leave_weapons;
use App\Models\Registers;

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
            'weaponReceive',
            'qtdBulletsReceive',
            'weaponNumberReceive',
            'nipReceive'
        ]);

        $id_weapon = $request->weaponReceive;

        $officer = $request->nipReceive;

        $officer = Police_officers::where('nip', $officer)->first();

        if (!$officer){
            return response("Agente não encontrado", 404) ;
            die;
        }

    
        
       
        $weapon = Weapons::findOrFail($id_weapon);

       if (!$weapon){
            return response('Arma não encontrada', 404);
            die;
        }
       
        
        
        $LeaveCheck = Leave_weapons::where('weapon_number', $request->weaponNumberReceive)->first();

        if (!$LeaveCheck){
            return response('Não foi possível completar a operação, saída de arma não registrada', 406);
            die;
        }

        
        
        $register = Registers::where('weapon_number', $request->weaponNumberReceive)
        ->where('status', 'não entregue')
        ->first();

        if(!$register){
            return response('Registro de arma não encontrado', 404);
            die;
        }

        if ($register->nip_officer != $officer->nip ){
            return response('O agente não corresponde com o registro', 406);
        }
        
        $weapon->increment('quantity_stock');
    
        
        $data['officer'] = $officer->name;
        $data['nip_officer'] = $officer->nip;
        $data['weapon'] = $weapon->name ."-". $weapon->model;
        $data['qtd_bullets'] = $request->qtdBulletsReceive;
        $data['weapon_number'] = $request->weaponNumberReceive;
        
        $status['status'] = 'entregue';
        
        Registers::where('weapon_number', $request->weaponNumberReceive)
        ->where('status' ,'não entregue')
        ->update(['status' => 'entregue']);

        Receive_weapons::create($data);

        return response('Entrada registrada com sucesso', 200);
       
        
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
