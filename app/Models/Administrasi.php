<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lamaran',
        'id_user',
        'kelengkapan',
        'kerapihan',
        'nilai_ijazah',
        'total',
     
    ];

    public function Peringkat(){
        return $this->hasMany(Peringkat::class);
    }
    public function Lamaran(){
        return $this->belongsTo(Lamaran::class, 'id_lamaran', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
