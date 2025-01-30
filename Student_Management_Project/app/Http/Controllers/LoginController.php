<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function showloginform()
    {
        return view('Login');
    }

    public function login(Request $request)
    {
        $credentials = request(['phone_number', 'password']);
        if (Auth::guard('web')->attempt($credentials)) {
            $user = Auth::guard('web')->user();
            if ($user->role == 'admin') {
                return route('home');
            }
            else{
                return response()->json('you are not an admin');
            }
        }
        return redirect('login_form');
    }

    public function logout()
    {
        Session::flush();

        return redirect('login_form');
    }

    public function guard()
    {
        return Auth::guard('web');
    }

    
}
