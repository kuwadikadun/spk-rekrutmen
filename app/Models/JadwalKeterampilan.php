<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKeterampilan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lamaran',
        'id_user',
        'tanggal_tes',
        'jam',
        'lokasi',
     
    ];

    public function Lamaran(){
        return $this->belongsTo(Lamaran::class, 'id_lamaran', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function Keterampilan(){
        return $this->hasMany(Keterampilan::class);
    }
}
