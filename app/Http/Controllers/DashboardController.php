<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function handleIndex(){
        if(Auth::check()){
            return redirect('/dashboard');
        } else{
            return redirect('/login');
        }
    }

    public function showDashboard() 
    {
        $loans = Loan::with('book')->where('user_id', session('user_id'))->where('status', 1)->get();

        return view('dashboard', compact("loans"));
    }

}
