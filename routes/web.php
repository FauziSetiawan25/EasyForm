<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'showLogin']);

Route::get('register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/reset_password', [AuthController::class, 'showResetPasswordForm'])->name('reset_password.form');
Route::post('/reset_password', [AuthController::class, 'resetPassword'])->name('reset_password.submit');


Route::middleware('checkLogin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/update', [DashboardController::class, 'update'])->name('dashboard.update');
});

Route::get('/qr', function () {
    $user = \App\Models\User::find(session('user_id'));

    $qr = QrCode::format('png') // Gunakan format PNG
        ->size(200)
        ->margin(1)
        ->generate($user->id);

    return response($qr, 200, ['Content-Type' => 'image/png']); // Content-Type untuk PNG
})->name('generate.qr');

Route::get('/qr/download', function () {
    $user = \App\Models\User::find(session('user_id'));

    $qr = QrCode::format('png') // Gunakan format PNG
        ->size(300)
        ->margin(1)
        ->generate($user->id);

    return response($qr)
        ->header('Content-Type', 'image/png') // Content-Type untuk PNG
        ->header('Content-Disposition', 'attachment; filename="qr-code.png"');
})->name('download.qr');
