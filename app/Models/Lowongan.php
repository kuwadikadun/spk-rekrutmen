<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'nama_bidang',
        'posisi',
        'deskripsi',
        'kualifikasi',
        'tanggal_publish',
        'tanggal_tutup',
        'status',
        
    ];

    public function tutupLowongan(){
        $this->status = 'Tutup';
        $this->save();
    }

    public function Lamaran(){
        return $this->hasMany(Lamaran::class, 'id_lowongan', 'id');
    }

    public function peringkat(){
        return $this->hasMany(Peringkat::class, 'id_lowongan', 'id');
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'lamarans', 'id_lowongan', 'id_user')->withTimestamps();
}
}
