@extends('layouts.app')

@section('content')

<div class="max-w-425 mx-auto space-y-6 px-3 md:px-0">

    <!-- ===================================================== -->
    <!-- HEADER -->
    <!-- ===================================================== -->

    <div class="relative overflow-hidden rounded-[30px]
                bg-linear-to-r from-[#070b1f] via-[#0b1130] to-[#11193d]
                border border-white/10 shadow-2xl">

        <!-- Glow -->
        <div class="absolute -top-20 right-0 w-72 h-72
                    bg-[#d4af37]/10 rounded-full blur-3xl">
        </div>

        <div class="relative z-10 px-5 md:px-8 py-6 md:py-7">

            <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-5">

                <!-- Title -->
                <div>

                    <div class="inline-flex items-center gap-2
                                px-3 py-1 rounded-full
                                bg-green-500/10 border border-green-500/20
                                text-green-400 text-xs font-semibold mb-3">

                        <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>

                        INPUT AKTIVITAS

                    </div>

                    <h1 class="text-3xl md:text-5xl font-black text-white">

                        Lalu Lintas Penghuni

                    </h1>

                    <p class="text-[#d4af37]
                              mt-2
                              tracking-[0.15em]
                              uppercase
                              text-xs md:text-sm">

                        Tambah aktivitas keluar masuk penghuni

                    </p>

                </div>



                <!-- Back -->
                <a href="{{ route('dashboard') }}"
                   class="px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white hover:bg-white/10
                          transition font-semibold
                          text-center">

                    ← Kembali Dashboard

                </a>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- FORM -->
    <!-- ===================================================== -->

    <form id="lalu-lintas-form"
          method="POST"
          action="{{ route('input.lalu_lintas.store') }}">

        @csrf

        <div class="bg-white/5
                    border border-white/10
                    backdrop-blur-xl
                    rounded-[30px]
                    overflow-hidden">

            <!-- HEADER -->
            <div class="px-5 md:px-7 py-5 border-b border-white/10
                        flex flex-col xl:flex-row xl:items-center justify-between gap-4">

                <div>

                    <h3 class="text-2xl font-black text-white">

                        Data Aktivitas

                    </h3>

                    <p class="text-white/50 mt-1 text-sm">

                        Tambahkan aktivitas penghuni yang keluar / masuk lapas

                    </p>

                </div>



                <!-- Button -->
                <button type="button"
                        onclick="addActivityRow()"
                        class="px-6 py-4 rounded-2xl
                               bg-[#d4af37]
                               hover:bg-[#c29b24]
                               text-[#07044f]
                               font-black shadow-lg transition">

                    ➕ Tambah Baris

                </button>

            </div>



            <!-- ================================================= -->
            <!-- DESKTOP TABLE -->
            <!-- ================================================= -->

            <div class="hidden xl:block overflow-x-auto">

                <table class="w-full min-w-350">

                    <!-- HEADER -->
                    <thead>

                        <tr class="bg-[#0b1120]
                                   border-b border-white/10
                                   text-white/70
                                   uppercase tracking-[0.15em]
                                   text-xs font-semibold">

                            <th class="px-6 py-5 text-center w-20">
                                No
                            </th>

                            <th class="px-6 py-5 text-left">
                                Uraian Aktivitas
                            </th>

                            <th class="px-6 py-5 text-center w-32">
                                Jumlah
                            </th>

                            <th class="px-6 py-5 text-center w-40">
                                Jam Keluar
                            </th>

                            <th class="px-6 py-5 text-center w-40">
                                Jam Masuk
                            </th>

                            <th class="px-6 py-5 text-left">
                                Petugas
                            </th>

                            <th class="px-6 py-5 text-center w-40">
                                Status
                            </th>

                            <th class="px-6 py-5 text-center w-32">
                                Aksi
                            </th>

                        </tr>

                    </thead>



                    <!-- BODY -->
                    <tbody id="activity-table-desktop"
                           class="divide-y divide-white/5">

                    </tbody>

                </table>

            </div>



            <!-- ================================================= -->
            <!-- MOBILE CARD -->
            <!-- ================================================= -->

            <div id="activity-mobile"
                 class="xl:hidden space-y-4 p-4">

            </div>

        </div>



        <!-- ================================================= -->
        <!-- SUBMIT -->
        <!-- ================================================= -->

        <div class="flex justify-end">

            <button type="submit"
                    class="w-full md:w-auto
                           px-10 py-5 rounded-2xl
                           bg-[#d4af37]
                           hover:bg-[#c29b24]
                           text-[#07044f]
                           text-lg font-black
                           shadow-2xl transition-all">

                💾 Simpan Aktivitas

            </button>

        </div>

    </form>

</div>



<!-- ===================================================== -->
<!-- SCRIPT -->
<!-- ===================================================== -->

<script>

let rowCount = 0;



/*
|--------------------------------------------------------------------------
| TAMBAH ROW
|--------------------------------------------------------------------------
*/

function addActivityRow() {

    rowCount++;

    // Desktop
    if (window.innerWidth >= 1280) {

        createDesktopRow();

    } else {

        // Mobile
        createMobileRow();
    }
}



/*
|--------------------------------------------------------------------------
| DESKTOP ROW
|--------------------------------------------------------------------------
*/

function createDesktopRow() {

    const tbody = document.getElementById('activity-table-desktop');

    const row = document.createElement('tr');

    row.className = `
        hover:bg-white/[0.03]
        transition-all duration-300
    `;

    row.innerHTML = `

        <!-- NO -->
        <td class="px-6 py-5 text-center text-white font-bold">

            ${rowCount}

        </td>



        <!-- URAIAN -->
        <td class="px-6 py-5">

            <input type="text"
                   name="uraian[]"
                   required
                   placeholder="Uraian Aktivitas"

                   class="w-full px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white placeholder:text-white/30
                          focus:border-[#d4af37] focus:ring-0">

        </td>



        <!-- JUMLAH -->
        <td class="px-6 py-5">

            <input type="number"
                   name="jumlah[]"
                   value="1"
                   required

                   class="w-full px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white text-center
                          focus:border-[#d4af37] focus:ring-0">

        </td>



        <!-- JAM KELUAR -->
        <td class="px-6 py-5">

            <input type="time"
                   name="jam_keluar[]"
                   required

                   class="w-full px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white
                          focus:border-[#d4af37] focus:ring-0">

        </td>



        <!-- JAM MASUK -->
        <td class="px-6 py-5">

            <input type="time"
                   name="jam_masuk[]"
                   onchange="updateStatus(this)"

                   class="w-full px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white
                          focus:border-[#d4af37] focus:ring-0">

        </td>



        <!-- PETUGAS -->
        <td class="px-6 py-5">

            <input type="text"
                   name="petugas[]"
                   placeholder="Nama Petugas"

                   class="w-full px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white placeholder:text-white/30
                          focus:border-[#d4af37] focus:ring-0">

        </td>



        <!-- STATUS -->
        <td class="px-6 py-5 text-center">

            <span class="status-badge
                        px-4 py-2 rounded-full
                        bg-red-500/10
                        border border-red-500/20
                        text-red-400
                        text-xs font-bold">

                Keluar

            </span>

        </td>



        <!-- AKSI -->
        <td class="px-6 py-5 text-center">

            <button type="button"
                    onclick="this.closest('tr').remove()"

                    class="px-4 py-2 rounded-xl
                           bg-red-500/10
                           border border-red-500/20
                           text-red-400
                           hover:bg-red-500/20
                           text-sm font-bold transition">

                Hapus

            </button>

        </td>
    `;

    tbody.appendChild(row);
}



/*
|--------------------------------------------------------------------------
| MOBILE CARD
|--------------------------------------------------------------------------
*/

function createMobileRow() {

    const container = document.getElementById('activity-mobile');

    const card = document.createElement('div');

    card.className = `
        rounded-3xl
        bg-white/5
        border border-white/10
        p-5
        space-y-4
    `;

    card.innerHTML = `

        <!-- HEADER -->
        <div class="flex items-center justify-between">

            <div class="text-white font-black text-lg">

                Aktivitas #${rowCount}

            </div>

            <button type="button"
                    onclick="this.closest('.rounded-3xl').remove()"

                    class="text-red-400 text-sm font-bold">

                Hapus

            </button>

        </div>



        <!-- URAIAN -->
        <div>

            <label class="text-white/60 text-sm block mb-2">
                Uraian Aktivitas
            </label>

            <input type="text"
                   name="uraian[]"
                   required

                   class="w-full px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white">

        </div>



        <!-- JUMLAH & JAM -->
        <div class="grid grid-cols-2 gap-4">

            <div>

                <label class="text-white/60 text-sm block mb-2">
                    Jumlah
                </label>

                <input type="number"
                       name="jumlah[]"
                       value="1"
                       required

                       class="w-full px-5 py-4 rounded-2xl
                              bg-white/5 border border-white/10
                              text-white">

            </div>

            <div>

                <label class="text-white/60 text-sm block mb-2">
                    Jam Keluar
                </label>

                <input type="time"
                       name="jam_keluar[]"
                       required

                       class="w-full px-5 py-4 rounded-2xl
                              bg-white/5 border border-white/10
                              text-white">

            </div>

        </div>



        <!-- JAM MASUK -->
        <div>

            <label class="text-white/60 text-sm block mb-2">
                Jam Masuk
            </label>

            <input type="time"
                   name="jam_masuk[]"

                   class="w-full px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white">

        </div>



        <!-- PETUGAS -->
        <div>

            <label class="text-white/60 text-sm block mb-2">
                Petugas Pengawal
            </label>

            <input type="text"
                   name="petugas[]"

                   class="w-full px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white">

        </div>

    `;

    container.appendChild(card);
}



/*
|--------------------------------------------------------------------------
| UPDATE STATUS
|--------------------------------------------------------------------------
*/

function updateStatus(input) {

    const row = input.closest('tr');

    if (!row) return;

    const badge = row.querySelector('.status-badge');

    if (input.value !== '') {

        badge.className = `
            status-badge
            px-4 py-2 rounded-full
            bg-green-500/10
            border border-green-500/20
            text-green-400 text-xs font-bold
        `;

        badge.innerHTML = 'Kembali';

    } else {

        badge.className = `
            status-badge
            px-4 py-2 rounded-full
            bg-red-500/10
            border border-red-500/20
            text-red-400 text-xs font-bold
        `;

        badge.innerHTML = 'Keluar';
    }
}



/*
|--------------------------------------------------------------------------
| AUTO ROW
|--------------------------------------------------------------------------
*/

window.onload = function () {

    addActivityRow();
}

window.addEventListener('resize', () => {

    // optional future responsive handling

});

</script>

@endsection