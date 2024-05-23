<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function showLogin()
    {
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Digite um Email',
                'email.email' => 'Email Inválido',
                'password.required' => 'Digite a Senha',
            ]
        );
 
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            $user = Auth::user();

            session([
                'user_id' => Auth::id(),
                'user_type' => $user->type,
                'user_name' => $user->name,
            ]);
            
            return redirect("/");
            
        }
 
        return back()->with('response', [400, 'Credenciais inválidas.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

}
