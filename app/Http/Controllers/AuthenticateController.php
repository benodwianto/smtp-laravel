<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticateController extends Controller
{
    public function index()
    {
        return view('auth.index', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('blog');
        }

        return redirect('login')->with('logError', 'wrong email or password');
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Registrasi'
        ]);
    }

    public function registration(Request $request)
    {
        $rule = $request->validate([
            'username' => 'required',
            'email' => 'required|email|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $rule['password'] = Hash::make($rule['password']);

        User::create($rule);

        return redirect('login')->with('success', 'account already taken');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();

        return redirect('login')->with('success', 'Berhasil Logout');
    }
}
