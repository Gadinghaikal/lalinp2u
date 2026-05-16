<?php

namespace App\Http\Controllers;

use App\Models\Harian;
use App\Models\MasterPenghuni;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        /*
        |--------------------------------------------------------------------------
        | DATA HARIAN
        |--------------------------------------------------------------------------
        */

        $harian = Harian::with('laluLintas')
                        ->where('tanggal', $today)
                        ->first();

        $laluLintas = $harian
                        ? $harian->laluLintas
                        : collect();



        /*
        |--------------------------------------------------------------------------
        | MASTER PENGHUNI
        |--------------------------------------------------------------------------
        */

        $master = MasterPenghuni::first();



        /*
        |--------------------------------------------------------------------------
        | REALTIME
        |--------------------------------------------------------------------------
        */

        $isi = $master->isi ?? 0;

        $luarLapas = $harian->luar_lapas ?? 0;

        $dalamLapas = max(0, $isi - $luarLapas);



        return view('dashboard', [

            'harian'       => $harian,

            'master'       => $master,

            'laluLintas'   => $laluLintas,

            'luar'         => $luarLapas,

            'dalam'        => $dalamLapas,
        ]);
    }
}