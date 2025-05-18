<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id', 12)->primary();
            $table->string('name');
            $table->string('nik')->unique();
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('address');
            $table->string('phone');
            $table->string('marital_status')->nullable();
            $table->string('job')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('religion')->nullable();
            $table->json('emergency_contact');
            $table->string('bpjs')->nullable();
            $table->text('medical_history')->nullable();
            $table->text('allergies')->nullable();
            $table->string('blood_type')->nullable();
            $table->json('riwayat_berobat')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};
