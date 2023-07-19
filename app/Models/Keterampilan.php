<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterampilan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lamaran',
        'id_jadwalKeterampilan',  
        'id_user',
        'psikotes',
        'ketangkasan',
        'nilaiasli_psikotes',
        'nilaiasli_ketangkasan',
        'nilaibobot_psikotes',
        'nilaibobot_ketangkasan',
        'cf',
        'sf',
        'total',
     
    ];

    public function Peringkat(){
        return $this->hasMany(Peringkat::class);
    }
    public function Lamaran(){
        return $this->belongsTo(Lamaran::class, 'id_lamaran', 'id');
    }

    public function JadwalKeterampilan(){
        return $this->belongsTo(JadwalKeterampilan::class, 'id_lamaran', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}
