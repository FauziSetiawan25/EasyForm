<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name', 'nik', 'birth_place', 'birth_date', 'gender', 'address', 'phone',
        'marital_status', 'job', 'citizenship', 'religion',
        'emergency_contact', 'bpjs', 'medical_history', 'allergies',
        'blood_type', 'riwayat_berobat', 'password',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'birth_date' => 'date',
        'emergency_contact' => 'array',
        'riwayat_berobat' => 'array',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            // Generate ID unik 12 digit angka
            do {
                $id = str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT);
            } while (self::where('id', $id)->exists());

            $user->id = $id;
        });
    }
}
