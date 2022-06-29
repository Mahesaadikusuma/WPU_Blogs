<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login.index', [
            'title' => 'login',
            "active" => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            // required|email:dns bisa pake ini kalo login keamananya jadi ketat misalnya harus pake @gamail.com kalau tidak pake :dns maka data faker bisa masuk
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // DIBAWAH INI AKAN MENGEMBALIAKN ATAU SETELAH LOGIN AKAN MENUJU URL DASHBOARD
            return redirect()->intended('/dashboard');
        }

        return back()->with('Login Error', 'LoginFailed');
        // validasi eror kalo erorr
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
