<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wawancara extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lamaran',
        'id_jadwalWawancara',    
        'id_user',
        'ketegasan',
        'atitude',
        'grooming',
        'total',
     
    ];

    public function Lamaran(){
        return $this->belongsTo(Lamaran::class, 'id_lamaran', 'id');
    }

    public function JadwalWawancara(){
        return $this->belongsTo(JadwalWawancara::class, 'id_lamaran', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function Peringkat(){
        return $this->hasMany(Peringkat::class);
    }
}
