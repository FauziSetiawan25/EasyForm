@extends('layout')

@section('content')
<div style="max-width: 400px; margin: auto; padding-top: 100px;">
    <h2 class="text-center">🛡️ Login Pasien</h2>

    @if ($errors->any())
        <div style="color: red;">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <div>
            <label>NIK</label>
            <input type="text" name="nik" required class="form-control">
        </div>
        <div style="margin-top: 10px;">
            <label>Password</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <div style="margin-top: 20px;" class="text-center">
            <button type="submit">🔐 Masuk</button>
        </div>
    </form>
</div>
@endsection
