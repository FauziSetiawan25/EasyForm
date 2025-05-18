@extends('layout')

@section('title', 'Forgot Password')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold mb-4 text-center text-[#4A90E2]">Reset Password</h2>
        <p class="text-sm text-gray-600 mb-6 text-center">
            Masukkan alamat email Anda yang terdaftar untuk menerima tautan pengaturan ulang kata sandi.
        </p>

        @if (session('status'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('reset_password.submit') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">NIK</label>
                <input type="text" name="nik" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Password Lama</label>
                <input type="password" name="old_password" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Password Baru</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-semibold text-gray-700">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" class="form-control" required>
            </div>

            <button type="submit" class="w-full bg-[#4A90E2] text-white font-bold py-2 px-4 rounded hover:bg-[#3b82c6]">
                Reset Password
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="text-[#4A90E2] hover:underline">Kembali ke Login</a>
        </div>
    </div>
</div>
@endsection
