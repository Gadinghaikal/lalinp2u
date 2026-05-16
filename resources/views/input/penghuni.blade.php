@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">

    <!-- ===================================================== -->
    <!-- HEADER -->
    <!-- ===================================================== -->

    <div class="relative overflow-hidden rounded-[30px]
                bg-linear-to-r from-[#070b1f] via-[#0b1130] to-[#11193d]
                border border-white/10 shadow-2xl">

        <div class="absolute -top-20 right-0 w-72 h-72
                    bg-[#d4af37]/10 rounded-full blur-3xl">
        </div>

        <div class="relative z-10 px-8 py-7">

            <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-5">

                <div>

                    <div class="inline-flex items-center gap-2
                                px-3 py-1 rounded-full
                                bg-blue-500/10 border border-blue-500/20
                                text-blue-400 text-xs font-semibold mb-3">

                        MASTER STATISTIK

                    </div>

                    <h1 class="text-4xl font-black text-white">

                        Data Penghuni

                    </h1>

                    <p class="text-[#d4af37] mt-2 tracking-[0.15em] uppercase text-sm">

                        Kelola statistik utama penghuni lapas

                    </p>

                </div>

                <a href="{{ route('dashboard') }}"
                   class="px-6 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          text-white hover:bg-white/10
                          transition font-semibold">

                    ← Kembali Dashboard

                </a>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- FORM -->
    <!-- ===================================================== -->

    <form method="POST"
          action="{{ route('input.penghuni.store') }}">

        @csrf

        <div class="bg-white/5
                    border border-white/10
                    backdrop-blur-xl
                    rounded-[30px]
                    overflow-hidden">

            <!-- HEADER -->
            <div class="px-7 py-5 border-b border-white/10">

                <h3 class="text-2xl font-black text-white">
                    Statistik Penghuni
                </h3>

                <p class="text-white/50 mt-1">
                    Data ini tidak reset harian dan hanya diubah jika ada perubahan nyata
                </p>

            </div>



            <!-- CONTENT -->
            <div class="p-6 md:p-8 grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- LEFT -->
                <div class="space-y-6">

                    <!-- Kapasitas -->
                    <div>

                        <label class="text-white/70 text-sm block mb-3">
                            Kapasitas Lapas
                        </label>

                        <input type="number"
                            name="kapasitas"
                            value="{{ $master->kapasitas ?? 0 }}"
                            class="w-full px-6 py-5 rounded-2xl
                                    bg-white/5 border border-white/10
                                    text-white text-2xl font-black
                                    focus:border-[#d4af37] focus:ring-0">

                    </div>


                    <!-- Pria -->
                    <div>

                        <label class="text-white/70 text-sm block mb-3">
                            Penghuni Pria
                        </label>

                        <input type="number"
                            name="pria"
                            value="{{ $master->pria ?? 0 }}"
                            class="w-full px-6 py-5 rounded-2xl
                                    bg-white/5 border border-white/10
                                    text-white
                                    focus:border-[#d4af37] focus:ring-0">

                    </div>


                    <!-- Wanita -->
                    <div>

                        <label class="text-white/70 text-sm block mb-3">
                            Penghuni Wanita
                        </label>

                        <input type="number"
                            name="wanita"
                            value="{{ $master->wanita ?? 0 }}"
                            class="w-full px-6 py-5 rounded-2xl
                                    bg-white/5 border border-white/10
                                    text-white
                                    focus:border-[#d4af37] focus:ring-0">

                    </div>


                    <!-- Tahanan -->
                    <div>

                        <label class="text-white/70 text-sm block mb-3">
                            Jumlah Tahanan
                        </label>

                        <input type="number"
                            name="tahanan"
                            value="{{ $master->tahanan ?? 0 }}"
                            class="w-full px-6 py-5 rounded-2xl
                                    bg-white/5 border border-white/10
                                    text-white
                                    focus:border-[#d4af37] focus:ring-0">

                    </div>


                    <!-- Narapidana -->
                    <div>

                        <label class="text-white/70 text-sm block mb-3">
                            Jumlah Narapidana
                        </label>

                        <input type="number"
                            name="narapidana"
                            value="{{ $master->narapidana ?? 0 }}"
                            class="w-full px-6 py-5 rounded-2xl
                                    bg-white/5 border border-white/10
                                    text-white
                                    focus:border-[#d4af37] focus:ring-0">

                    </div>

                </div>



                <!-- RIGHT -->
                <div class="space-y-6">

                    <!-- WNA -->
                    <div>

                        <label class="text-white/70 text-sm block mb-3">
                            WNA
                        </label>

                        <input type="number"
                            name="wna"
                            value="{{ $master->wna ?? 0 }}"
                            class="w-full px-6 py-5 rounded-2xl
                                    bg-white/5 border border-white/10
                                    text-white
                                    focus:border-[#d4af37] focus:ring-0">

                    </div>


                    <!-- Lansia -->
                    <div>

                        <label class="text-white/70 text-sm block mb-3">
                            Lansia
                        </label>

                        <input type="number"
                            name="lansia"
                            value="{{ $master->lansia ?? 0 }}"
                            class="w-full px-6 py-5 rounded-2xl
                                    bg-white/5 border border-white/10
                                    text-white
                                    focus:border-[#d4af37] focus:ring-0">

                    </div>


                    <!-- Andikpas -->
                    <div>

                        <label class="text-white/70 text-sm block mb-3">
                            Andikpas
                        </label>

                        <input type="number"
                            name="andikpas"
                            value="{{ $master->andikpas ?? 0 }}"
                            class="w-full px-6 py-5 rounded-2xl
                                    bg-white/5 border border-white/10
                                    text-white
                                    focus:border-[#d4af37] focus:ring-0">

                    </div>

                </div>

            </div>

        </div>



        <!-- BUTTON -->
        <div class="flex justify-end">

            <button type="submit"
                    class="px-10 py-5 rounded-2xl
                           bg-[#d4af37]
                           hover:bg-[#c29b24]
                           text-[#07044f]
                           text-lg font-black
                           shadow-2xl transition-all">

                💾 Simpan Statistik

            </button>

        </div>

    </form>

</div>

@endsection