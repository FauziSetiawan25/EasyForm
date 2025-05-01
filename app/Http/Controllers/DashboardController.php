<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(Session::get('user_id'));
        return view('dashboard', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $user = User::find(Session::get('user_id'));

        // Update field biasa
        $user->update($request->only([
            'name', 'birth_place', 'birth_date', 'gender', 'address',
            'phone', 'marital_status', 'job', 'citizenship', 'religion',
            'bpjs', 'medical_history', 'allergies', 'blood_type'
        ]));

        // Simpan kontak darurat sebagai array (akan otomatis diserialisasi jika ada cast)
        $user->emergency_contact = [
            'name' => $request->emergency_name,
            'phone' => $request->emergency_phone,
            'relation' => $request->emergency_relation,
        ];

        $user->save();

        return back()->with('success', '✅ Data berhasil diperbarui.');
    }
}
