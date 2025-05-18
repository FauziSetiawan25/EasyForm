<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


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

    public function showResetPasswordForm()
    {
        return view('reset_password');
    }

    public function resetPassword(Request $request) {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nik' => 'required|exists:users,nik',
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cari user berdasarkan NIK
        $user = User::where('nik', $request->nik)->first();

        // Periksa apakah password lama cocok
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['old_password' => 'Password lama tidak cocok']);
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('login')->with('success', 'Password berhasil diperbarui.');
    }
}
