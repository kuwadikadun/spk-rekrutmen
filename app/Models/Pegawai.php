<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Pegawai extends Model
{
    use HasFactory;
    

    

    // Anggap tabel yang digunakan untuk model Pegawai adalah 'pegawai'
    protected $table = 'pegawai';

    // Kolom yang dapat diisi massal (fillable)
    protected $fillable = [
        'name', 'email', 'password', 'jenis_kelamin','role',
    ];

 

    // public function getRoleAttribute(){
    //     return $this->attributes['role'];
    // }
}
