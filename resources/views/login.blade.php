@extends('layout')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex items-center justify-center p-4">
    <!-- Main Wrapper -->
    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col md:flex-row">
        <!-- Left side -->
        <div class="bg-[#E6E6FA] flex flex-col justify-center items-center px-6 py-12 md:w-1/2 relative">
            <div class="max-w-md mx-auto">
                <h1 class="text-2xl md:text-3xl font-semibold text-black mb-2">
                    Welcome To
                    <span class="text-[#4A90E2] font-bold">Rekap Pasien</span>
                    <span class="text-[#4A90E2] font-bold">.</span>
                </h1>
                <p class="text-gray-600 text-sm mb-10">
                    Sistem kami membantu tenaga medis dalam pencatatan dan manajemen data pasien secara efisien.
                </p>
            </div>
            <img alt="Illustration" 
                 class="w-[320px] md:w-[400px] object-contain rounded-[20px]" 
                 src="https://storage.googleapis.com/a1aa/image/ea2a46e7-b526-455a-8a3c-7f8b5cce471f.jpg"/>
            <svg class="absolute top-6 left-6 w-20 h-20 stroke-gray-300 opacity-30" fill="none" stroke="currentColor" stroke-width="1" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 7s1-2 4-2 4 2 4 2M4 17s1-2 4-2 4 2 4 2M16 7s1-2 4-2 4 2 4 2M16 17s1-2 4-2 4 2 4 2" stroke-linecap="round" stroke-linejoin="round">
                </path>
            </svg>
        </div>
        
        <!-- Right side -->
        <div class="flex flex-col justify-center items-center px-6 py-12 md:w-1/2">
            <div class="w-full max-w-sm">
                <div class="flex justify-center mb-6">
                    <span class="text-[#4A90E2] font-bold text-xl">
                        <h2>🛡️ Login Pasien</h2>
                    </span>
                </div>
                <p class="text-center text-sm text-gray-600 mb-8 font-semibold">
                    Login With Your NIK
                </p>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 text-sm" role="alert">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm  text-gray-700 font-bold">NIK</label>
                            <input type="text" name="nik" required class="form-control">
                        </div>
                        <div>
                            <label class="block text-sm text-gray-700 font-bold">Password</label>
                            <input type="password" name="password" required class="form-control">
                        </div>
                        <div class="pt-2">
                            <button type="submit"> Masuk</button>
                        </div>
                        <div class="flex justify-between items-center mt-2">
                            <a class="text-xs text-[#4A90E2] hover:underline" href="#">
                                Forgot Password?
                            </a>
                            <a class="text-xs text-[#4A90E2] hover:underline" href="{{ url('/register') }}">
                                Registration
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection