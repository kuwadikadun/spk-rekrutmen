<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Lamaran;
use App\Models\Wawancara;
use App\Models\Administrasi;
use App\Models\Keterampilan;
use App\Models\JadwalWawancara;
use Laravel\Sanctum\HasApiTokens;
use App\Models\JadwalKeterampilan;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nik',
        'name',
        'email',
        'password',
        'jenis_kelamin',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'no_telpon',
        'pendidikan_terakhir',
        'nama_institusi',
        'cv',
        'ijazah',
        'skck',
        'pas_foto',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Lamaran(){
        return $this->hasMany(Lamaran::class);
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

    // User.php

    public function lowongans()
{
    return $this->belongsToMany(Lowongan::class, 'lamarans', 'id_user', 'id_lowongan')->withTimestamps();
}

}
