<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required',
            'password' => 'required'
        ]);
        if(auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/listcompany');
        }
        return Redirect::back()->withErrors(['msg' => 'You have entered an invalid email or password']);
    }

    public function logout(Request $request)
    {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function index()
    {
        return view('login',[
            'title' => 'Login'
        ]);
    }
}
