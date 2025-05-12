@extends('layout')

@section('content')
    <div class="container mx-auto py-10 bg-gray-100 min-h-screen">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-5xl font-bold">👋 Selamat datang, <span class="text-[#4A90E2]">{{ $user->name }}</span></h2>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="cursor-pointer bg-red-500 rounded-md text-white font-semibold transition 
            duration-300 ease-in-out hover:bg-red-700 hover:ring-2 hover:ring-red-500 hover:shadow-xl hover:shadow-red-500 
            focus:ring-red-300 focus:shadow-red-400 px-4 py-2 flex" type="button"
                    onclick="showLogoutModal()">
                    <svg class="w-6 h-6 text-white mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 11-4 0v-1m4-8V7a2 2 0 10-4 0v1" />
                </svg> 
                Logout
                </button>
            </form>
        </div>

        @if (session('success'))
            <div class="text-green-600 mb-4 font-semibold">{{ session('success') }}</div>
        @endif

        <div class="bg-white shadow rounded-lg px-6 py-10">
            <h2 class="text-2xl font-bold mb-6">Data anda:</h2>
            <table class="w-full text-left table-auto">
                <tbody>
                    <tr class="bg-slate-100">
                        <th class="py-2 px-2">NIK</th>
                        <td>{{ $user->nik }}</td>
                    </tr>
                    <tr>
                        <th class="py-2 px-2">Nama</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr class="bg-slate-100">
                        <th class="py-2 px-2">Tempat Lahir</th>
                        <td>{{ $user->birth_place }}</td>
                    </tr>
                    <tr>
                        <th class="py-2 px-2">Tanggal Lahir</th>
                        <td>{{ \Carbon\Carbon::parse($user->birth_date)->format('Y-m-d') }}</td>
                    </tr>
                    <tr class="bg-slate-100">
                        <th class="py-2 px-2">Gender</th>
                        <td>{{ $user->gender }}</td>
                    </tr>
                    <tr>
                        <th class="py-2 px-2">Alamat</th>
                        <td>{{ $user->address }}</td>
                    </tr>
                    <tr class="bg-slate-100">
                        <th class="py-2 px-2">Phone</th>
                        <td>{{ $user->phone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="block md:flex md:justify-between gap-4 mt-8">
            <a onclick="showEditModal()" class="cursor-pointer bg-[#4A90E2] rounded-md text-white font-semibold transition 
            duration-300 ease-in-out hover:bg-blue-700 hover:ring-2 hover:ring-blue-500 hover:shadow-xl hover:shadow-[#4A90E2] 
            focus:ring-blue-300 focus:shadow-blue-400 px-5 py-3">
                ✏️ Edit Data</a>
            <div class="flex gap-4">
                <a onclick="showQRModal()" class="cursor-pointer bg-[#4A90E2] rounded-md text-white font-semibold transition 
                duration-300 ease-in-out hover:bg-blue-700 hover:ring-2 hover:ring-blue-500 hover:shadow-xl hover:shadow-[#4A90E2] 
                focus:ring-blue-300 focus:shadow-blue-400 px-5 py-3">
                    📱 Show QR</a>
                <a href="{{ route('download.qr') }}" class="text-center cursor-pointer bg-[#4A90E2] rounded-md text-white font-semibold transition 
                duration-300 ease-in-out hover:bg-blue-700 hover:ring-2 hover:ring-blue-500 hover:shadow-xl hover:shadow-[#4A90E2] focus:ring-blue-300 
                focus:shadow-blue-400 px-5 py-3">
                    ⬇️ Download QR</a>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="hideModals()"></div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center z-50 overflow-y-auto hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-lg my-10 max-h-screen overflow-y-auto">
            <form method="POST" action="{{ route('dashboard.update') }}">
                @csrf
                <div class="flex justify-between mb-4">
                    <h3 class="text-lg font-semibold">Edit Data</h3>
                    <button type="button" onclick="hideEditModal()" class=" text-white rounded">❌</button>
                </div>

                @foreach (['name' => 'Nama', 'nik' => 'NIK', 'birth_place' => 'Tempat Lahir', 'birth_date' => 'Tanggal Lahir', 'address' => 'Alamat', 'phone' => 'No HP', 'marital_status' => 'Status Perkawinan', 'job' => 'Pekerjaan', 'citizenship' => 'Kewarganegaraan', 'religion' => 'Agama', 'bpjs' => 'No BPJS', 'medical_history' => 'Riwayat Penyakit', 'allergies' => 'Alergi', 'blood_type' => 'Golongan Darah'] as $field => $label)
                    <input type="{{ $field == 'birth_date' ? 'date' : 'text' }}"
                           name="{{ $field }}"

                                          value="{{ old($field, $user->$field) }}"

                                          placeholder="{{ $label }}"

                              class="w-full mb-3 p-2 border rounded" required>
                @endforeach


                                   <select name="gender" class="w-full mb-3 p-2 border
                        rounded" required>
                    <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>

                <h4 class="mt-4 font-semibold">Kontak Darurat</h4>
                @php
                    $emergency = $user->emergency_contact ?? ['name' => '', 'phone' => '', 'relation' => ''];
                @endphp
                <input type="text" name="emergency_name" value="{{ $emergency['name'] ?? '' }}" placeholder="Nama" class="w-full mb-3 p-2 border rounded">
                <input type="text" name="emergency_phone" value="{{ $emergency['phone'] ?? '' }}" placeholder="No HP" class="w-full mb-3 p-2 border rounded">
                <input type="text" name="emergency_relation" value="{{ $emergency['relation'] ?? '' }}" placeholder="Hubungan" class="w-full mb-3 p-2 border rounded">

                <div class="flex justify-between mt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded">💾 Simpan</button>                    
                </div>
            </form>
        </div>
    </div>


    <!-- QR Modal -->
    <div id="qrModal" class="fixed inset-0 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center">
            <h3 class="text-lg font-semibold mb-4">📷 QR Code</h3>
            <img src="{{ route('generate.qr') }}" alt="QR Code" class="w-64 h-64 mb-4" />
            <button onclick="hideQRModal()" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">Tutup</button>
        </div>
    </div>

    <!-- Modal Logout -->
    <div id="logoutModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="absolute inset-0 bg-black bg-opacity-50" onclick="hideLogoutModal()"></div>
        <div class="bg-white rounded-lg shadow-lg z-50 p-6 w-full max-w-sm">
            <div class="flex items-center mb-4">                
                <h3 class="text-lg font-semibold text-gray-800">Konfirmasi Logout</h3>
            </div>
            <p class="text-sm text-gray-600">Apakah kamu yakin ingin logout?</p>
            <div class="mt-6 flex justify-end space-x-3">
                <button onclick="hideLogoutModal()" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</button>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="px-4 py-2 !bg-red-600 text-white rounded hover:!bg-red-700" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>


    <script>
        function showEditModal() {
            document.getElementById('editModal').classList.remove('hidden');
            document.getElementById('overlay').classList.remove('hidden');
        }

        function hideEditModal() {
            document.getElementById('editModal').classList.add('hidden');
            document.getElementById('overlay').classList.add('hidden');
        }

        function showQRModal() {
            document.getElementById('qrModal').classList.remove('hidden');
            document.getElementById('overlay').classList.remove('hidden');
        }

        function hideQRModal() {
            document.getElementById('qrModal').classList.add('hidden');
            document.getElementById('overlay').classList.add('hidden');
        }

        function hideModals() {
            hideEditModal();
            hideQRModal();
        }

        function showLogoutModal() {
            document.getElementById('logoutModal').classList.remove('hidden');
        }

        function hideLogoutModal() {
            document.getElementById('logoutModal').classList.add('hidden');
        }
    </script>
@endsection
