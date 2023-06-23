<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peringkat extends Model
{
    use HasFactory;

    public function pelamar(){
        return $this->belongsTo(User::class);
    }

    public function Administrasi(){
        return $this->belongsTo(Administrasi::class);
    }

    public function Keterampilan(){
        return $this->belongsTo(Keterampilan::class);
    }

    public function Wawancara(){
        return $this->belongsTo(Wawancara::class);
    }
}
