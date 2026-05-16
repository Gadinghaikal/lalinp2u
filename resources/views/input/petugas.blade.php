@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto px-3 md:px-0 pb-28">

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

                    👮

                </div>

                <div>

                    <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight">
                        Petugas Jaga
                    </h1>

                    <p class="text-white/60 mt-1">
                        Kelola data petugas jaga dan petugas P2U hari ini
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
    <!-- FORM -->
    <!-- ================================================= -->

    <form action="{{ route('input.petugas.store') }}"
          method="POST">

        @csrf

        <div class="rounded-3xl
                    border border-white/10
                    bg-[#0f172a]/90
                    backdrop-blur-2xl
                    overflow-hidden">

            <!-- TOP -->
            <div class="px-6 md:px-8 py-6 border-b border-white/10">

                <div class="flex items-center gap-3">

                    <div class="w-12 h-12 rounded-2xl
                                bg-[#d4af37]/10
                                border border-[#d4af37]/20
                                flex items-center justify-center
                                text-2xl">

                        🛡️

                    </div>

                    <div>

                        <h2 class="text-2xl font-black text-white">
                            Petugas Jaga Hari Ini
                        </h2>

                        <p class="text-white/50 text-sm mt-1">
                            {{ now()->format('d F Y') }}
                        </p>

                    </div>

                </div>

            </div>



            <!-- CONTENT -->
            <div class="p-6 md:p-8 space-y-8">

                <!-- ================================================= -->
                <!-- RUPAM -->
                <!-- ================================================= -->

                <div>

                    <label class="block text-sm font-semibold text-white/70 mb-3 uppercase tracking-wider">
                        Rupam
                    </label>

                    <select name="rupam"
                            required
                            class="w-full md:w-80 rounded-2xl
                                   bg-white/5 border border-white/10
                                   text-white
                                   px-5 py-4
                                   focus:border-[#d4af37]
                                   focus:ring-0">

                        <option value="" class="text-black">
                            Pilih Rupam
                        </option>

                        <option value="Rupam 1" class="text-black">
                            Rupam 1
                        </option>

                        <option value="Rupam 2" class="text-black">
                            Rupam 2
                        </option>

                        <option value="Rupam 3" class="text-black">
                            Rupam 3
                        </option>

                        <option value="Rupam 4" class="text-black">
                            Rupam 4
                        </option>

                    </select>

                </div>



                <!-- ================================================= -->
                <!-- KARUPAM & WAKARUPAM -->
                <!-- ================================================= -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- KARUPAM -->
                    <div>

                        <label class="block text-sm font-semibold text-white/70 mb-3 uppercase tracking-wider">
                            Karupam
                        </label>

                        <input type="text"
                               name="karupam"
                               required
                               placeholder="Masukkan nama Karupam"
                               class="w-full rounded-2xl
                                      bg-white/5 border border-white/10
                                      text-white placeholder-white/30
                                      px-5 py-4
                                      focus:border-[#d4af37]
                                      focus:ring-0">

                    </div>


                    <!-- WAKARUPAM -->
                    <div>

                        <label class="block text-sm font-semibold text-white/70 mb-3 uppercase tracking-wider">
                            Wakarupam
                        </label>

                        <input type="text"
                               name="wakarupam"
                               required
                               placeholder="Masukkan nama Wakarupam"
                               class="w-full rounded-2xl
                                      bg-white/5 border border-white/10
                                      text-white placeholder-white/30
                                      px-5 py-4
                                      focus:border-[#d4af37]
                                      focus:ring-0">

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- PETUGAS P2U -->
                <!-- ================================================= -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- PETUGAS 1 -->
                    <div>

                        <label class="block text-sm font-semibold text-white/70 mb-3 uppercase tracking-wider">
                            Petugas P2U 1
                        </label>

                        <input type="text"
                               name="petugas_1"
                               required
                               placeholder="Masukkan nama petugas"
                               class="w-full rounded-2xl
                                      bg-white/5 border border-white/10
                                      text-white placeholder-white/30
                                      px-5 py-4
                                      focus:border-[#d4af37]
                                      focus:ring-0">

                    </div>


                    <!-- PETUGAS 2 -->
                    <div>

                        <label class="block text-sm font-semibold text-white/70 mb-3 uppercase tracking-wider">
                            Petugas P2U 2
                        </label>

                        <input type="text"
                               name="petugas_2"
                               required
                               placeholder="Masukkan nama petugas"
                               class="w-full rounded-2xl
                                      bg-white/5 border border-white/10
                                      text-white placeholder-white/30
                                      px-5 py-4
                                      focus:border-[#d4af37]
                                      focus:ring-0">

                    </div>

                </div>



                <!-- ================================================= -->
                <!-- INFO -->
                <!-- ================================================= -->

                <div class="rounded-2xl
                            bg-[#d4af37]/10
                            border border-[#d4af37]/20
                            px-5 py-4">

                    <div class="flex items-start gap-3">

                        <div class="text-xl">
                            ℹ️
                        </div>

                        <div>

                            <div class="text-[#f5d97b] font-semibold">
                                Informasi Shift
                            </div>

                            <p class="text-[#f5d97b]/70 text-sm mt-1 leading-relaxed">
                                Data petugas jaga akan tampil realtime di dashboard
                                dan digunakan sebagai identitas shift aktif hari ini.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <!-- ================================================= -->
        <!-- SAVE -->
        <!-- ================================================= -->

        <div class="hidden md:flex justify-end mt-8">

            <button type="submit"
                    class="px-10 py-4 rounded-2xl
                           bg-linear-to-r from-[#d4af37] to-yellow-500
                           text-black font-black
                           shadow-2xl shadow-yellow-500/20
                           hover:scale-[1.02]
                           transition-all">

                Simpan Petugas

            </button>

        </div>



        <!-- MOBILE SAVE -->
        <div class="md:hidden fixed bottom-0 left-0 right-0
                    bg-[#0b1120]/95 backdrop-blur-2xl
                    border-t border-white/10
                    p-4 z-50">

            <button type="submit"
                    class="w-full py-4 rounded-2xl
                           bg-linear-to-r from-[#d4af37] to-yellow-500
                           text-black font-black shadow-lg">

                Simpan Petugas

            </button>

        </div>

    </form>

</div>

@endsection