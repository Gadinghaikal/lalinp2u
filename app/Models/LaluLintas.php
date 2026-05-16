<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaluLintas extends Model
{
    protected $fillable = [
        'harian_id',
        'uraian',
        'jumlah',
        'jam_keluar',
        'jam_masuk',
        'status',
        'petugas',
        'keterangan',
    ];

    public function harian()
    {
        return $this->belongsTo(Harian::class);
    }
}