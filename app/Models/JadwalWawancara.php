<?php

namespace App\Models;

use App\Models\Lamaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalWawancara extends Model
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

    public function Wawancara(){
        return $this->hasMany(Wawancara::class);
    }
}
