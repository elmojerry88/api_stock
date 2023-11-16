<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credencials = $request->only([
            'email',
            'password',
            'device_name',
        ]);
        
        $user = Customers::where('email', $request->email)->first();
 
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }


        
        $user->tokens()->delete();


        
        $user = $user->createToken($request->device_name)->plainTextToken;
        return response($user, 200)
                    ->header('Content-Type', 'aplication/json');
    }


    public function logout()
    
    {
        auth('sanctum')->user()->currentAccessToken()->delete();

        return response()->json('LogOut com sucesso');
    }
}
