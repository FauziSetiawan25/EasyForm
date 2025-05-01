@extends('layout')

@section('content')
<div class="container">
    <h2>Register</h2>
    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <input type="text" name="name" placeholder="Nama" required><br>
        <input type="text" name="nik" placeholder="NIK" required><br>
        <input type="text" name="birth_place" placeholder="Tempat Lahir" required><br>
        <input type="date" name="birth_date" required><br>
        <select name="gender">
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br>
        <input type="text" name="address" placeholder="Alamat" required><br>
        <input type="text" name="phone" placeholder="No HP" required><br>
        <!-- Optional -->
        <input type="text" name="marital_status" placeholder="Status Pernikahan"><br>
        <input type="text" name="job" placeholder="Pekerjaan"><br>
        <input type="text" name="citizenship" placeholder="Kewarganegaraan"><br>
        <input type="text" name="religion" placeholder="Agama"><br>
        <input type="text" name="bpjs" placeholder="No. BPJS"><br>
        <input type="text" name="medical_history" placeholder="Riwayat Penyakit"><br>
        <input type="text" name="allergies" placeholder="Alergi"><br>
        <input type="text" name="blood_type" placeholder="Golongan Darah"><br>
        <br>
        <!-- Emergency contact -->
        <h4>Kontak Darurat</h4>
        <input type="text" name="emergency_name" placeholder="Nama Kontak Darurat" required><br>
        <input type="text" name="emergency_phone" placeholder="No HP Darurat" required><br>
        <input type="text" name="emergency_relation" placeholder="Hubungan" required><br>

        <br>
        <!-- Password -->
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br>

        <button type="submit">Daftar</button>
    </form>
</div>
@endsection
