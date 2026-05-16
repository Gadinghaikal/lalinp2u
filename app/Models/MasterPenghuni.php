<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterPenghuni extends Model
{
    protected $table = 'master_penghuni';

    protected $fillable = [

        'kapasitas',

        'pria',

        'wanita',

        'isi',

        'tahanan',

        'narapidana',

        'wna',

        'lansia',

        'andikpas',
    ];
}