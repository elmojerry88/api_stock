<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registers;

class RegisterController extends Controller
{
  
    public function index()
    {
        $register = Registers::all();

        return response()->json($register);
    }


    // public function store(Request $request)
    // {
    //     //
    // }


    // public function show(string $id)
    // {
    //     //
    // }


    // public function update(Request $request, string $id)
    // {
    //     //
    // }


    // public function destroy(string $id)
    // {
    //     //
    // }
}
