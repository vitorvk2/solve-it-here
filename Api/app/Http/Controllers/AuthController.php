<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        // Autenticação via JWT 
        $token = auth('api')->attempt($request->all(['nickname', 'password']));
        
        if($token){ // Usuário autenticado
            return response()->json(['token' => $token], 200);
        } else { // Erro
            return response()->json(['erro' => 'Usuario ou senha inválido'], 403);
        }
    }

    public function logout(){
        auth('api')->logout();
        return response()->json(['msg' => 'Logout foi realizado com sucesso!']);
    }

    public function refresh(){
        $token = auth('api')->refresh(); //Cliente encaminha um jwt válido
        return response()->json($token);
    }

    public function me(){
        return response()->json(auth()->user());
    }

}
