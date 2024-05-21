<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRegister() {

        $userTypes = UserType::all();

        return view('register', compact("userTypes"));
    }

    public function createUser(Request $request) {

        $isRequestValid = $request->validate(
            [
                "name"=>"required",
                "email"=>"required|email",
                "password"=>"required",
                "type"=>"required"
            ],
            [
                "name.required"=>"Insira o Nome",
                "email.required"=>"Insira um Email",
                "email.email"=>"Email Inválido",
                "password.required"=>"Insira uma Senha",
                "type.required"=>"Selecione um Tipo"
            ]
        );

        $isEmailRegistered = User::where('email', $request->email)->count();

        if($isRequestValid && $isEmailRegistered === 0){

            $user = User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>$request->password,
                "type"=>$request->type
            ]);
    
            $user->save();

            return redirect("/login")->with("response", [200, "Cadastro Realizado"]);
            
        }
        
        return redirect("/register")->back()->with("response", [400, "Ocorreu um erro"]);
        
    }
}
