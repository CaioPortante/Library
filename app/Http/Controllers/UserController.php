<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRegister($errors = []) {

        $userTypes = UserType::all();

        return view('register', compact("userTypes"))->with("errors", $errors);
    }

    public function createUser(Request $request) {

        $isRequestValid = $request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "password"=>"required",
            "type"=>"required"
        ]);

        $isEmailRegistered = User::where('email', $request->email)->count();

        if($isRequestValid && $isEmailRegistered === 0){

            $user = User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>$request->password,
                "type"=>$request->type
            ]);
    
            $user->save();

            return redirect("/login")->with("errors", [200, "Cadastro Realizado"]);
            
        }
        
        return $this->showRegister([400, "Ocorreu um erro"]);
        
    }
}
