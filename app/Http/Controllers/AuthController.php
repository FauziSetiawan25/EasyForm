<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('nik', $request->nik)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user_id', $user->id);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['login' => 'NIK atau Password salah']);
    }

    public function logout()
    {
        Session::forget('user_id');
        return redirect()->route('login');
    }
}
