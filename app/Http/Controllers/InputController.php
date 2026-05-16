<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Harian;
use App\Models\MasterPenghuni;
use App\Models\LaluLintas;
use Carbon\Carbon;

class InputController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | RECALCULATE REALTIME
    |--------------------------------------------------------------------------
    */

    private function recalculateHarian($harianId)
    {
        $harian = Harian::find($harianId);

        if (!$harian) {
            return;
        }

        $master = MasterPenghuni::first();

        $isi = $master->isi ?? 0;

        /*
        |--------------------------------------------------------------------------
        | HITUNG YANG MASIH KELUAR
        |--------------------------------------------------------------------------
        */

        $luarLapas = LaluLintas::where('harian_id', $harian->id)
                            ->where('status', 'Keluar')
                            ->sum('jumlah');

        /*
        |--------------------------------------------------------------------------
        | HITUNG DALAM LAPAS
        |--------------------------------------------------------------------------
        */

        $dalamLapas = max(0, $isi - $luarLapas);

        /*
        |--------------------------------------------------------------------------
        | UPDATE HARIAN
        |--------------------------------------------------------------------------
        */

        $harian->update([

            'luar_lapas'  => $luarLapas,

            'dalam_lapas' => $dalamLapas,
        ]);
    }



    /*
    |--------------------------------------------------------------------------
    | SIMPAN AKTIVITAS LALU LINTAS
    |--------------------------------------------------------------------------
    */

    public function storeLaluLintas(Request $request)
    {
        $request->validate([

            'uraian.*'     => 'required|string|max:255',

            'jumlah.*'     => 'required|integer|min:1',

            'jam_keluar.*' => 'required',

            'jam_masuk.*'  => 'nullable',

            'petugas.*'    => 'nullable|string|max:100',
        ]);

        $tanggal = Carbon::today();

        /*
        |--------------------------------------------------------------------------
        | DATA HARIAN
        |--------------------------------------------------------------------------
        */

        $harian = Harian::firstOrCreate(
            [
                'tanggal' => $tanggal
            ],
            [
                'rupam'        => null,
                'karupam'      => null,
                'wakarupam'    => null,
                'petugas_1'    => null,
                'petugas_2'    => null,
                'luar_lapas'   => 0,
                'dalam_lapas'  => 0,
            ]
        );



        /*
        |--------------------------------------------------------------------------
        | SIMPAN AKTIVITAS
        |--------------------------------------------------------------------------
        */

        foreach ($request->uraian as $key => $uraian) {

            $jamMasuk = $request->jam_masuk[$key] ?? null;

            LaluLintas::create([

                'harian_id'   => $harian->id,

                'uraian'      => $uraian,

                'jumlah'      => $request->jumlah[$key],

                'jam_keluar'  => $request->jam_keluar[$key],

                'jam_masuk'   => $jamMasuk,

                'status'      => $jamMasuk
                                    ? 'Kembali'
                                    : 'Keluar',

                'petugas'     => $request->petugas[$key] ?? null,

                'keterangan'  => null,
            ]);
        }



        /*
        |--------------------------------------------------------------------------
        | RECALCULATE
        |--------------------------------------------------------------------------
        */

        $this->recalculateHarian($harian->id);



        return redirect()
                ->route('dashboard')
                ->with('success', 'Aktivitas berhasil disimpan!');
    }



    /*
    |--------------------------------------------------------------------------
    | EDIT JAM MASUK
    |--------------------------------------------------------------------------
    */

    public function editJamMasuk(LaluLintas $laluLintas)
    {
        return view('input.edit_jam_masuk', compact('laluLintas'));
    }



    /*
    |--------------------------------------------------------------------------
    | UPDATE JAM MASUK
    |--------------------------------------------------------------------------
    */

    public function updateJamMasuk(Request $request, LaluLintas $laluLintas)
    {
        $request->validate([
            'jam_masuk' => 'required|date_format:H:i',
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS
        |--------------------------------------------------------------------------
        */

        $laluLintas->update([

            'jam_masuk' => $request->jam_masuk,

            'status'    => 'Kembali',
        ]);


        /*
        |--------------------------------------------------------------------------
        | RECALCULATE
        |--------------------------------------------------------------------------
        */

        $this->recalculateHarian($laluLintas->harian_id);



        return redirect()
                ->route('dashboard')
                ->with('success', 'Jam masuk berhasil diperbarui!');
    }



    /*
    |--------------------------------------------------------------------------
    | HALAMAN EDIT AKTIVITAS
    |--------------------------------------------------------------------------
    */

    public function editAktivitas()
    {
        $laluLintas = LaluLintas::latest()->get();

        return view('input.edit_aktivitas', compact('laluLintas'));
    }



    /*
    |--------------------------------------------------------------------------
    | BULK UPDATE AKTIVITAS
    |--------------------------------------------------------------------------
    */

    public function bulkUpdateLaluLintas(Request $request)
    {
        $request->validate([

            'activities.*.uraian'     => 'required|string|max:255',

            'activities.*.jumlah'     => 'required|integer|min:1',

            'activities.*.jam_keluar' => 'required',

            'activities.*.jam_masuk'  => 'nullable',

            'activities.*.petugas'    => 'nullable|string|max:100',
        ]);


        $updatedCount = 0;

        $affectedHarian = [];


        /*
        |--------------------------------------------------------------------------
        | UPDATE AKTIVITAS
        |--------------------------------------------------------------------------
        */

        foreach ($request->activities as $id => $data) {

            $aktivitas = LaluLintas::find($id);

            if ($aktivitas) {

                /*
                |--------------------------------------------------------------------------
                | AUTO STATUS
                |--------------------------------------------------------------------------
                */

                $status = !empty($data['jam_masuk'])
                            ? 'Kembali'
                            : 'Keluar';


                $aktivitas->update([

                    'uraian'      => $data['uraian'],

                    'jumlah'      => $data['jumlah'],

                    'jam_keluar'  => $data['jam_keluar'],

                    'jam_masuk'   => $data['jam_masuk'] ?: null,

                    'status'      => $status,

                    'petugas'     => $data['petugas'] ?: null,
                ]);


                /*
                |--------------------------------------------------------------------------
                | SIMPAN HARIAN TERPENGARUH
                |--------------------------------------------------------------------------
                */

                $affectedHarian[] = $aktivitas->harian_id;

                $updatedCount++;
            }
        }



        /*
        |--------------------------------------------------------------------------
        | RECALCULATE SEMUA HARIAN TERPENGARUH
        |--------------------------------------------------------------------------
        */

        foreach (array_unique($affectedHarian) as $harianId) {

            $this->recalculateHarian($harianId);
        }



        return redirect()
                ->route('dashboard')
                ->with(
                    'success',
                    "$updatedCount aktivitas berhasil diperbarui!"
                );
    }



    /*
    |--------------------------------------------------------------------------
    | FORM PENGHUNI
    |--------------------------------------------------------------------------
    */

    public function penghuniForm()
    {
        $master = MasterPenghuni::first();

        return view('input.penghuni', compact('master'));
    }



    /*
    |--------------------------------------------------------------------------
    | SIMPAN MASTER PENGHUNI
    |--------------------------------------------------------------------------
    */

    public function storePenghuni(Request $request)
    {
        $request->validate([

            'kapasitas'   => 'required|integer|min:0',

            'pria'        => 'required|integer|min:0',

            'wanita'      => 'required|integer|min:0',

            'tahanan'     => 'required|integer|min:0',

            'narapidana'  => 'required|integer|min:0',

            'wna'         => 'required|integer|min:0',

            'lansia'      => 'required|integer|min:0',

            'andikpas'    => 'required|integer|min:0',
        ]);


        /*
        |--------------------------------------------------------------------------
        | HITUNG OTOMATIS
        |--------------------------------------------------------------------------
        */

        $isi = $request->pria + $request->wanita;


        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $totalStatus = $request->tahanan + $request->narapidana;

        if ($totalStatus != $isi) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Jumlah tahanan dan narapidana harus sama dengan total penghuni.'
                );
        }



        /*
        |--------------------------------------------------------------------------
        | UPDATE / CREATE MASTER
        |--------------------------------------------------------------------------
        */

        MasterPenghuni::updateOrCreate(

            ['id' => 1],

            [

                'kapasitas'   => $request->kapasitas,

                'pria'        => $request->pria,

                'wanita'      => $request->wanita,

                'isi'         => $isi,

                'tahanan'     => $request->tahanan,

                'narapidana'  => $request->narapidana,

                'wna'         => $request->wna,

                'lansia'      => $request->lansia,

                'andikpas'    => $request->andikpas,
            ]
        );



        /*
        |--------------------------------------------------------------------------
        | UPDATE REALTIME HARIAN HARI INI
        |--------------------------------------------------------------------------
        */

        $today = now()->toDateString();

        $harian = Harian::where('tanggal', $today)->first();

        if ($harian) {

            $this->recalculateHarian($harian->id);
        }



        return redirect()
                ->route('dashboard')
                ->with('success', 'Statistik penghuni berhasil diperbarui!');
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN PETUGAS JAGA
    |--------------------------------------------------------------------------
    */

    public function storePetugas(Request $request)
    {
        $request->validate([

            'rupam'       => 'required|string|max:50',

            'karupam'     => 'required|string|max:100',

            'wakarupam'   => 'required|string|max:100',

            'petugas_1'   => 'required|string|max:100',

            'petugas_2'   => 'required|string|max:100',
        ]);


        $today = now()->toDateString();


        /*
        |--------------------------------------------------------------------------
        | CREATE / UPDATE HARIAN
        |--------------------------------------------------------------------------
        */

        Harian::updateOrCreate(

            [
                'tanggal' => $today
            ],

            [

                'rupam'       => $request->rupam,

                'karupam'     => $request->karupam,

                'wakarupam'   => $request->wakarupam,

                'petugas_1'   => $request->petugas_1,

                'petugas_2'   => $request->petugas_2,
            ]
        );


        return redirect()
                ->route('dashboard')
                ->with('success', 'Petugas jaga berhasil diperbarui!');
    }
}