<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pegawai extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    // Anggap tabel yang digunakan untuk model Pegawai adalah 'pegawai'
    protected $table = 'pegawais';

    // Kolom yang dapat diisi massal (fillable)
    protected $fillable = [
        'name', 'email', 'password', 'jenis_kelamin', 'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    // public function getRoleAttribute(){
    //     return $this->attributes['role'];
    // }
}
