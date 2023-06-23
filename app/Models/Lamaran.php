<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lowongan',
        'id_user',
        'tanggal_lamaran',
        'status',
        'catatan',
     
    ];


    public function Lowongan(){
        return $this->belongsTo(Lowongan::class, 'id_lowongan', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function Administrasi(){
        return $this->hasMany(Administrasi::class);
    }

    public function JadwalKeterampilan(){
        return $this->hasMany(JadwalKeterampilan::class);
    }

    public function JadwalWawancara(){
        return $this->hasMany(JadwalWawancara::class);
    }

    public function Keterampilan(){
        return $this->hasMany(Keterampilan::class);
    }

    public function Wawancara(){
        return $this->hasMany(Wawancara::class);
    }

    public function Peringkat(){
        return $this->hasMany(Peringkat::class);
    }
}
