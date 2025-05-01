@extends('layout')

@section('content')
<style>
    .modal, .modal-overlay {
        display: none;
    }
    .modal-overlay {
        position: fixed;
        top: 0; left: 0; right: 0; bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 998;
    }
    .modal {
        position: fixed;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        border-radius: 10px;
        z-index: 999;
        box-shadow: 0 0 10px rgba(0,0,0,0.2);
        max-width: 400px;
        width: 100%;
    }
    .modal input {
        display: block;
        width: 100%;
        margin-bottom: 10px;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }
    .modal button {
        margin-top: 10px;
    }
    .btn {
        padding: 8px 12px;
        margin-right: 10px;
        background: #007BFF;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }
    .btn:hover {
        background: #0056b3;
    }
    .btn-danger {
        background: #dc3545;
    }
    .btn-danger:hover {
        background: #a71d2a;
    }
</style>

<div class="container py-5">
    <h2>👋 Selamat datang, {{ $user->name }}</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <tr><th>NIK</th><td>{{ $user->nik }}</td></tr>
        <tr><th>Nama</th><td>{{ $user->name }}</td></tr>
        <tr><th>Tempat Lahir</th><td>{{ $user->birth_place }}</td></tr>
        <tr><th>Tanggal Lahir</th><td>{{ \Carbon\Carbon::parse($user->birth_date)->format('Y-m-d') }}</td></tr>
        <tr><th>Gender</th><td>{{ $user->gender }}</td></tr>
        <tr><th>Alamat</th><td>{{ $user->address }}</td></tr>
        <tr><th>Phone</th><td>{{ $user->phone }}</td></tr>
    </table>

    <div class="mt-3">
        <button class="btn" onclick="showEditModal()">✏️ Edit Data</button>
        <button class="btn" onclick="showQRModal()">📱 Show QR</button>
        <a class="btn" href="{{ route('download.qr') }}">⬇️ Download QR</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button class="btn btn-danger" type="submit">🚪 Logout</button>
        </form>
    </div>
</div>

<!-- Modal Overlay -->
<div class="modal-overlay" id="overlay" onclick="hideModals()"></div>

<!-- Modal Edit -->
<div id="editModal" class="modal">
    <form method="POST" action="{{ route('dashboard.update') }}">
        @csrf
        <h3>Edit Data</h3>
        <input type="text" name="name" value="{{ $user->name }}" required>
        <input type="text" name="nik" value="{{ $user->nik }}" required>
        <input type="text" name="birth_place" value="{{ $user->birth_place }}" required>
        <input type="date" name="birth_date" value="{{ $user->birth_date }}" required>
        <select name="gender" required>
            <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        <input type="text" name="address" value="{{ $user->address }}" required>
        <input type="text" name="phone" value="{{ $user->phone }}" required>
        <input type="text" name="marital_status" value="{{ $user->marital_status }}">
        <input type="text" name="job" value="{{ $user->job }}">
        <input type="text" name="citizenship" value="{{ $user->citizenship }}">
        <input type="text" name="religion" value="{{ $user->religion }}">
        <input type="text" name="bpjs" value="{{ $user->bpjs }}">
        <input type="text" name="medical_history" value="{{ $user->medical_history }}">
        <input type="text" name="allergies" value="{{ $user->allergies }}">
        <input type="text" name="blood_type" value="{{ $user->blood_type }}">

        @php
        $emergency = $user->emergency_contact ?? ['name' => '', 'phone' => '', 'relation' => ''];
        @endphp

        <h4>Kontak Darurat</h4>
        <input type="text" name="emergency_name" value="{{ $emergency['name'] ?? '' }}" placeholder="Nama Kontak Darurat">
        <input type="text" name="emergency_phone" value="{{ $emergency['phone'] ?? '' }}" placeholder="No HP Darurat">
        <input type="text" name="emergency_relation" value="{{ $emergency['relation'] ?? '' }}" placeholder="Hubungan">


        <button class="btn" type="submit">💾 Simpan</button>
        <button class="btn btn-danger" type="button" onclick="hideEditModal()">❌ Batal</button>
    </form>
</div>

<!-- Modal QR -->
<div id="qrModal" class="modal">
    <h3>📷 QR Code</h3>
    <object data="{{ route('generate.qr') }}" type="image/svg+xml" style="width:200px;height:200px;"></object>
    <button class="btn btn-danger" onclick="hideQRModal()">Tutup</button>
</div>

<script>
    function showEditModal() {
        document.getElementById('editModal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }
    function hideEditModal() {
        document.getElementById('editModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
    function showQRModal() {
        document.getElementById('qrModal').style.display = 'block';
        document.getElementById('overlay').style.display = 'block';
    }
    function hideQRModal() {
        document.getElementById('qrModal').style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
    function hideModals() {
        hideEditModal();
        hideQRModal();
    }
</script>
@endsection
