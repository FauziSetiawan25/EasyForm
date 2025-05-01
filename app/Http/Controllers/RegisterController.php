<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm() {
        return view('register');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:16|unique:users,nik',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'marital_status' => 'nullable|string',
            'job' => 'nullable|string',
            'citizenship' => 'nullable|string',
            'religion' => 'nullable|string',
            'bpjs' => 'nullable|string',
            'medical_history' => 'nullable|string',
            'allergies' => 'nullable|string',
            'blood_type' => 'nullable|string',
            'emergency_name' => 'required|string',
            'emergency_phone' => 'required|string',
            'emergency_relation' => 'required|string',
            'password' => 'required|string|confirmed|min:6',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $validated['emergency_contact'] = [
            'name' => $validated['emergency_name'],
            'phone' => $validated['emergency_phone'],
            'relation' => $validated['emergency_relation']
        ];

        unset($validated['emergency_name'], $validated['emergency_phone'], $validated['emergency_relation']);

        $user = User::create($validated); // ID otomatis di-generate oleh model

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
