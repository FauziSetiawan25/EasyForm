@extends('layout')

@section('content')
<div style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; max-width: 800px; margin: 0 auto; padding: 25px; background-color: #f8f9fa; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
    <!-- Judul yang diperbaiki -->
    <div style="text-align: center; margin-bottom: 30px;">
        <h1 style="color: #2c3e50; font-size: 28px; font-weight: 600; letter-spacing: 0.5px; margin-bottom: 10px; position: relative; display: inline-block;">
            Patient Registration
            <span style="position: absolute; bottom: -8px; left: 0; right: 0; margin: auto; width: 60px; height: 3px; background-color: #3498db;"></span>
        </h1>
        <p style="color: #7f8c8d; font-size: 14px; margin-top: 8px;">
            Please fill in all required fields marked with *
        </p>
    </div>

    @if ($errors->any())
        <div style="color: #e74c3c; background-color: #fadbd8; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register.store') }}" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        @csrf

        <!-- Kolom 1 -->
        <div style="grid-column: 1;">
            <!-- Informasi Pribadi -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #2c3e50; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-bottom: 15px;">Informasi Pribadi</h3>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Nama Lengkap*</label>
                    <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('name') border-color: #e74c3c; @enderror">
                    @error('name')
                        <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">NIK* (16 digit)</label>
                    <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('nik') border-color: #e74c3c; @enderror">
                    @error('nik')
                        <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Tempat Lahir*</label>
                        <input type="text" name="birth_place" value="{{ old('birth_place') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('birth_place') border-color: #e74c3c; @enderror">
                        @error('birth_place')
                            <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Tanggal Lahir*</label>
                        <input type="date" name="birth_date" value="{{ old('birth_date') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('birth_date') border-color: #e74c3c; @enderror">
                        @error('birth_date')
                            <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Jenis Kelamin*</label>
                    <select name="gender" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('gender') border-color: #e74c3c; @enderror">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('gender')
                        <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Alamat Lengkap*</label>
                    <textarea name="address" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 80px; @error('address') border-color: #e74c3c; @enderror">{{ old('address') }}</textarea>
                    @error('address')
                        <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Nomor Telepon*</label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('phone') border-color: #e74c3c; @enderror">
                    @error('phone')
                        <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Kolom 2 -->
        <div style="grid-column: 2;">
            <!-- Informasi Tambahan -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #2c3e50; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-bottom: 15px;">Informasi Tambahan</h3>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Status Pernikahan</label>
                    <select name="marital_status" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="">Pilih Status</option>
                        <option value="Belum Menikah" {{ old('marital_status') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                        <option value="Menikah" {{ old('marital_status') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                        <option value="Duda/Janda" {{ old('marital_status') == 'Duda/Janda' ? 'selected' : '' }}>Duda/Janda</option>
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Pekerjaan</label>
                    <input type="text" name="job" value="{{ old('job') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Kewarganegaraan</label>
                    <input type="text" name="citizenship" value="{{ old('citizenship') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Agama</label>
                    <select name="religion" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="">Pilih Agama</option>
                        <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                        <option value="Kristen" {{ old('religion') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                        <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                        <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                        <option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                        <option value="Konghucu" {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                    </select>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Nomor BPJS</label>
                    <input type="text" name="bpjs" value="{{ old('bpjs') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Golongan Darah</label>
                    <select name="blood_type" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <option value="">Pilih Golongan Darah</option>
                        <option value="A" {{ old('blood_type') == 'A' ? 'selected' : '' }}>A</option>
                        <option value="B" {{ old('blood_type') == 'B' ? 'selected' : '' }}>B</option>
                        <option value="AB" {{ old('blood_type') == 'AB' ? 'selected' : '' }}>AB</option>
                        <option value="O" {{ old('blood_type') == 'O' ? 'selected' : '' }}>O</option>
                        <option value="Tidak Tahu" {{ old('blood_type') == 'Tidak Tahu' ? 'selected' : '' }}>Tidak Tahu</option>
                    </select>
                </div>
            </div>

            <!-- Informasi Medis -->
            <div style="margin-bottom: 20px;">
                <h3 style="color: #2c3e50; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-bottom: 15px;">Informasi Medis</h3>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Riwayat Penyakit</label>
                    <textarea name="medical_history" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 60px;">{{ old('medical_history') }}</textarea>
                </div>

                <div style="margin-bottom: 15px;">
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Alergi</label>
                    <textarea name="allergies" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 60px;">{{ old('allergies') }}</textarea>
                </div>
            </div>
        </div>

        <!-- Kontak Darurat (Full Width) -->
        <div style="grid-column: 1 / span 2; margin-top: 20px; border-top: 1px solid #eee; padding-top: 20px;">
            <h3 style="color: #2c3e50; margin-bottom: 15px;">Kontak Darurat*</h3>

            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px;">
                <div>
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Nama*</label>
                    <input type="text" name="emergency_name" value="{{ old('emergency_name') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('emergency_name') border-color: #e74c3c; @enderror">
                    @error('emergency_name')
                        <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Nomor Telepon*</label>
                    <input type="tel" name="emergency_phone" value="{{ old('emergency_phone') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('emergency_phone') border-color: #e74c3c; @enderror">
                    @error('emergency_phone')
                        <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Hubungan*</label>
                    <input type="text" name="emergency_relation" value="{{ old('emergency_relation') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('emergency_relation') border-color: #e74c3c; @enderror">
                    @error('emergency_relation')
                        <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Akun (Full Width) -->
        <div style="grid-column: 1 / span 2; margin-top: 20px;">
            <h3 style="color: #2c3e50; border-bottom: 1px solid #eee; padding-bottom: 5px; margin-bottom: 15px;">Informasi Akun*</h3>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Password* (minimal 6 karakter)</label>
                <input type="password" name="password" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; @error('password') border-color: #e74c3c; @enderror">
                @error('password')
                    <span style="color: #e74c3c; font-size: 12px;">{{ $message }}</span>
                @enderror
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; color: #2c3e50;">Konfirmasi Password*</label>
                <input type="password" name="password_confirmation" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <button type="submit" style="width: 100%; padding: 12px; background-color: #3498db; color: white; border: none; border-radius: 5px; font-size: 16px; cursor: pointer;">Daftar</button>

           <div style="text-align: center; margin-top: 15px; position: relative; z-index: 1;">
                <span style="color: #7f8c8d;">
                    Sudah punya akun?
                    <a href="{{ route('login') }}"
                    style="color: #3498db; text-decoration: none; position: relative; z-index: 2;">
                    Login disini
                    </a>
                </span>
            </div>
