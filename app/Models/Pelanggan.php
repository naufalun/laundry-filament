<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'nomor_telepon',
        'jenis_kelamin',
        'alamat',
    ];

    protected $casts = [
        'jenis_kelamin' => 'string',
    ];

    // Relasi: satu pelanggan bisa punya banyak pesanan
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'pelanggan_id');
    }
}