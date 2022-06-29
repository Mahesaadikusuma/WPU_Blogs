<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register.index', [
            'title' => 'register',
            "active" => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        // $data['password'] = bcrypt($data['password']);
        $data['password'] = Hash::make($data['password']);

        user::create($data);
        // $request->session()->flash('success', 'registration successful! please login');
        return redirect('/login')->with('success', 'registration successful! please login');
    }
}
