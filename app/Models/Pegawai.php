<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nama', 
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'kelurahan_id',
        'kecamatan_id',
        'provinsi_id',
    ];

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }
    
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
    
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
