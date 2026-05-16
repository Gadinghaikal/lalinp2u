<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harian extends Model
{
    protected $table = 'harian';

    protected $fillable = [

        'tanggal',

        'rupam',

        'karupam',

        'wakarupam',

        'petugas_1',

        'petugas_2',

        'dalam_lapas',

        'luar_lapas',
    ];


    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function laluLintas()
    {
        return $this->hasMany(LaluLintas::class);
    }
}