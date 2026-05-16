@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-3 md:px-0 pb-32 md:pb-10">

    <!-- ================================================= -->
    <!-- HEADER -->
    <!-- ================================================= -->

    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-5 mb-8">

        <div>

            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl
                            bg-linear-to-br from-[#d4af37] to-yellow-500
                            flex items-center justify-center
                            text-black text-2xl shadow-lg">

                    ✏️

                </div>

                <div>

                    <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight">
                        Edit Aktivitas
                    </h1>

                    <p class="text-white/60 mt-1">
                        Kelola dan perbarui aktivitas lalu lintas penghuni
                    </p>

                </div>

            </div>

        </div>


        <!-- BACK -->
        <a href="{{ route('dashboard') }}"
           class="inline-flex items-center justify-center gap-2
                  px-6 py-3 rounded-2xl
                  bg-white/5 border border-white/10
                  hover:bg-white/10
                  text-white/80 hover:text-white
                  transition-all backdrop-blur-xl">

            ← Kembali Dashboard

        </a>

    </div>



    <!-- ================================================= -->
    <!-- ALERT -->
    <!-- ================================================= -->

    @if(session('success'))

    <div class="mb-6 px-5 py-4 rounded-2xl
                bg-emerald-500/10
                border border-emerald-500/20
                text-emerald-300">

        {{ session('success') }}

    </div>

    @endif



    <!-- ================================================= -->
    <!-- FORM -->
    <!-- ================================================= -->

    <form action="{{ route('input.edit_aktivitas.bulk') }}"
          method="POST">

        @csrf
        @method('PUT')



        <!-- ================================================= -->
        <!-- DESKTOP TABLE -->
        <!-- ================================================= -->

        <div class="hidden lg:block overflow-hidden rounded-3xl
                    border border-white/10
                    bg-[#0f172a]/90 backdrop-blur-2xl">

            <!-- HEADER -->
            <div class="grid grid-cols-6
                        bg-white/5
                        border-b border-white/10
                        text-white/60
                        uppercase tracking-[0.18em]
                        text-xs font-bold">

                <div class="px-6 py-5">
                    Aktivitas
                </div>

                <div class="px-6 py-5 text-center">
                    Jumlah
                </div>

                <div class="px-6 py-5 text-center">
                    Keluar
                </div>

                <div class="px-6 py-5 text-center">
                    Masuk
                </div>

                <div class="px-6 py-5 text-center">
                    Status
                </div>

                <div class="px-6 py-5">
                    Petugas
                </div>

            </div>



            <!-- DATA -->
            @foreach($laluLintas as $item)

            <div class="grid grid-cols-6
                        border-b border-white/5
                        hover:bg-white/3
                        transition-all">

                <!-- Aktivitas -->
                <div class="p-4">

                    <input type="text"
                           name="activities[{{ $item->id }}][uraian]"
                           value="{{ $item->uraian }}"
                           class="desktop-input w-full rounded-2xl
                                  bg-white/5 border border-white/10
                                  text-white placeholder-white/20
                                  focus:border-[#d4af37]
                                  focus:ring-0">

                </div>


                <!-- Jumlah -->
                <div class="p-4">

                    <input type="number"
                           name="activities[{{ $item->id }}][jumlah]"
                           value="{{ $item->jumlah }}"
                           class="desktop-input w-full rounded-2xl text-center
                                  bg-white/5 border border-white/10
                                  text-white
                                  focus:border-[#d4af37]
                                  focus:ring-0">

                </div>


                <!-- Keluar -->
                <div class="p-4">

                    <input type="time"
                           name="activities[{{ $item->id }}][jam_keluar]"
                           value="{{ $item->jam_keluar }}"
                           class="desktop-input w-full rounded-2xl
                                  bg-white/5 border border-white/10
                                  text-white
                                  focus:border-[#d4af37]
                                  focus:ring-0">

                </div>


                <!-- Masuk -->
                <div class="p-4">

                    <input type="time"
                           name="activities[{{ $item->id }}][jam_masuk]"
                           value="{{ $item->jam_masuk }}"
                           class="desktop-input jam-masuk w-full rounded-2xl
                                  bg-white/5 border border-white/10
                                  text-white
                                  focus:border-[#d4af37]
                                  focus:ring-0">

                </div>


                <!-- STATUS -->
                <div class="p-4 flex items-center justify-center">

                    <span class="desktop-status px-4 py-2 rounded-full text-xs font-bold
                        {{ $item->jam_masuk
                            ? 'bg-emerald-500/10 text-emerald-300 border border-emerald-500/20'
                            : 'bg-red-500/10 text-red-300 border border-red-500/20' }}">

                        {{ $item->jam_masuk ? 'Kembali' : 'Keluar' }}

                    </span>

                </div>


                <!-- PETUGAS -->
                <div class="p-4">

                    <input type="text"
                           name="activities[{{ $item->id }}][petugas]"
                           value="{{ $item->petugas }}"
                           class="desktop-input w-full rounded-2xl
                                  bg-white/5 border border-white/10
                                  text-white
                                  focus:border-[#d4af37]
                                  focus:ring-0">

                </div>

            </div>

            @endforeach

        </div>



        <!-- ================================================= -->
        <!-- MOBILE -->
        <!-- ================================================= -->

        <div class="lg:hidden space-y-4">

            @foreach($laluLintas as $item)

            <div class="rounded-3xl
                        border border-white/10
                        bg-[#0f172a]/90 backdrop-blur-2xl
                        p-5 space-y-5">

                <!-- TOP -->
                <div class="flex items-start justify-between gap-4">

                    <div class="flex-1">

                        <label class="text-xs uppercase tracking-wider text-white/40">
                            Aktivitas
                        </label>

                        <input type="text"
                               name="activities[{{ $item->id }}][uraian]"
                               value="{{ $item->uraian }}"
                               class="mobile-input w-full mt-2 rounded-2xl
                                      bg-white/5 border border-white/10
                                      text-white
                                      focus:border-[#d4af37]
                                      focus:ring-0">

                    </div>

                    <div>

                        <span class="mobile-status px-3 py-2 rounded-full text-[11px] font-bold
                            {{ $item->jam_masuk
                                ? 'bg-emerald-500/10 text-emerald-300 border border-emerald-500/20'
                                : 'bg-red-500/10 text-red-300 border border-red-500/20' }}">

                            {{ $item->jam_masuk ? 'Kembali' : 'Keluar' }}

                        </span>

                    </div>

                </div>



                <!-- GRID -->
                <div class="grid grid-cols-2 gap-4">

                    <!-- Jumlah -->
                    <div>

                        <label class="text-xs uppercase tracking-wider text-white/40">
                            Jumlah
                        </label>

                        <input type="number"
                               name="activities[{{ $item->id }}][jumlah]"
                               value="{{ $item->jumlah }}"
                               class="mobile-input w-full mt-2 rounded-2xl
                                      bg-white/5 border border-white/10
                                      text-white text-center
                                      focus:border-[#d4af37]
                                      focus:ring-0">

                    </div>


                    <!-- Petugas -->
                    <div>

                        <label class="text-xs uppercase tracking-wider text-white/40">
                            Petugas
                        </label>

                        <input type="text"
                               name="activities[{{ $item->id }}][petugas]"
                               value="{{ $item->petugas }}"
                               class="mobile-input w-full mt-2 rounded-2xl
                                      bg-white/5 border border-white/10
                                      text-white
                                      focus:border-[#d4af37]
                                      focus:ring-0">

                    </div>


                    <!-- Keluar -->
                    <div>

                        <label class="text-xs uppercase tracking-wider text-white/40">
                            Jam Keluar
                        </label>

                        <input type="time"
                               name="activities[{{ $item->id }}][jam_keluar]"
                               value="{{ $item->jam_keluar }}"
                               class="mobile-input w-full mt-2 rounded-2xl
                                      bg-white/5 border border-white/10
                                      text-white
                                      focus:border-[#d4af37]
                                      focus:ring-0">

                    </div>


                    <!-- Masuk -->
                    <div>

                        <label class="text-xs uppercase tracking-wider text-white/40">
                            Jam Masuk
                        </label>

                        <input type="time"
                               name="activities[{{ $item->id }}][jam_masuk]"
                               value="{{ $item->jam_masuk }}"
                               class="mobile-input jam-masuk-mobile w-full mt-2 rounded-2xl
                                      bg-white/5 border border-white/10
                                      text-white
                                      focus:border-[#d4af37]
                                      focus:ring-0">

                    </div>

                </div>

            </div>

            @endforeach

        </div>



        <!-- ================================================= -->
        <!-- SAVE BUTTON -->
        <!-- ================================================= -->

        <div class="hidden lg:flex justify-end mt-8">

            <button type="submit"
                    class="px-8 py-4 rounded-2xl
                           bg-linear-to-r from-[#d4af37] to-yellow-500
                           text-black font-black
                           shadow-2xl shadow-yellow-500/20
                           hover:scale-[1.02]
                           transition-all">

                Simpan Perubahan

            </button>

        </div>



        <!-- MOBILE SAVE -->
        <div class="lg:hidden fixed bottom-0 left-0 right-0
                    bg-[#0b1120]/95 backdrop-blur-2xl
                    border-t border-white/10
                    p-4 z-50">

            <button type="submit"
                    class="w-full py-4 rounded-2xl
                           bg-linear-to-r from-[#d4af37] to-yellow-500
                           text-black font-black shadow-lg">

                Simpan Perubahan

            </button>

        </div>

    </form>

</div>



<!-- ================================================= -->
<!-- AUTO STATUS -->
<!-- ================================================= -->

<script>

document.querySelectorAll('.jam-masuk, .jam-masuk-mobile')
.forEach(input => {

    input.addEventListener('input', function () {

        const parent = this.closest('.grid, .rounded-3xl');

        if (!parent) return;

        const badge =
            parent.querySelector('.desktop-status') ||
            parent.querySelector('.mobile-status');

        if (!badge) return;

        if (this.value) {

            badge.textContent = 'Kembali';

            badge.className =
                badge.className.replace(
                    /bg-red-500\/10 text-red-300 border border-red-500\/20/g,
                    'bg-emerald-500/10 text-emerald-300 border border-emerald-500/20'
                );

        } else {

            badge.textContent = 'Keluar';

            badge.className =
                badge.className.replace(
                    /bg-emerald-500\/10 text-emerald-300 border border-emerald-500\/20/g,
                    'bg-red-500/10 text-red-300 border border-red-500\/20'
                );
        }

    });

});



/*
|--------------------------------------------------------------------------
| RESPONSIVE INPUT FIX
|--------------------------------------------------------------------------
*/

function toggleInputs() {

    const isDesktop = window.innerWidth >= 1024;

    /*
    |--------------------------------------------------------------------------
    | DESKTOP
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.desktop-input')
        .forEach(el => {

            el.disabled = !isDesktop;
        });

    /*
    |--------------------------------------------------------------------------
    | MOBILE
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('.mobile-input')
        .forEach(el => {

            el.disabled = isDesktop;
        });
}



/*
|--------------------------------------------------------------------------
| INIT
|--------------------------------------------------------------------------
*/

window.addEventListener('load', toggleInputs);

window.addEventListener('resize', toggleInputs);

</script>

@endsection