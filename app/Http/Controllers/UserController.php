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

        $isRequestValid = $request->validate([
            "name"=>"required",
            "email"=>"required|email",
            "password"=>"required",
            "type"=>"required"
        ]);

        if($isRequestValid){

            $user = User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>$request->password,
                "type"=>$request->type
            ]);
    
            $user->save();

            return redirect()->intended("/login");
            
        }
        
        return view("register")->with("status", "Dados inválidos");
        
    }
}
