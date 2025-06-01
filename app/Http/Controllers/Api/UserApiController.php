<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function getAll()
    {
        $user = User::all();

        return response()->json([
            'data' => $user
        ]);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'nik' => $user->nik,
            'birth_place' => $user->birth_place,
            'birth_date' => $user->birth_date->toDateString(),
            'gender' => $user->gender,
            'address' => $user->address,
            'phone' => $user->phone,
            'marital_status' => $user->marital_status,
            'job' => $user->job,
            'citizenship' => $user->citizenship,
            'religion' => $user->religion,
            'emergency_contact' => $user->emergency_contact,
            'bpjs' => $user->bpjs,
            'medical_history' => $user->medical_history,
            'allergies' => $user->allergies,
            'blood_type' => $user->blood_type,
            'riwayat_berobat' => $user->riwayat_berobat ?? [],
        ]);
    }

    public function input(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->all();

        $user->update($data);

        return response()->json(['message' => 'Updated successfully'], 200);
    }


    public function apiUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'address' => 'required|string',
            'phone' => 'required|string',
            // Optional: validasi emergency contact jika diisi
            'emergency_name' => 'nullable|string',
            'emergency_phone' => 'nullable|string',
            'emergency_relation' => 'nullable|string',
        ]);

        $user = $request->user(); // Dapatkan user dari token API Sanctum

        // Update data pribadi
        $user->update($request->only([
            'name', 'birth_place', 'birth_date', 'gender', 'address',
            'phone', 'marital_status', 'job', 'citizenship', 'religion',
            'bpjs', 'medical_history', 'allergies', 'blood_type'
        ]));

        // Update emergency_contact sebagai JSON (array)
        $user->emergency_contact = [
            'name' => $request->emergency_name,
            'phone' => $request->emergency_phone,
            'relation' => $request->emergency_relation,
        ];
        $user->save();

        return response()->json([
            'message' => '✅ Data berhasil diperbarui.',
            'user' => $user
        ]);
    }
}
