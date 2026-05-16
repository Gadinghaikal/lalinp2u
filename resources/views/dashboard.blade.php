@extends('layouts.app')

@section('content')

<div class="max-w-462.5 mx-auto space-y-5">

    <!-- ===================================================== -->
    <!-- COMMAND HEADER -->
    <!-- ===================================================== -->

    <div class="relative overflow-hidden rounded-[28px]
                bg-linear-to-r from-[#070b1f] via-[#0b1130] to-[#11193d]
                border border-white/10
                backdrop-blur-xl
                shadow-[0_0_50px_rgba(0,0,0,0.35)]">

        <!-- Glow -->
        <div class="absolute -top-32 right-0 w-105 h-105
                    bg-[#d4af37]/10 rounded-full blur-3xl">
        </div>

        <div class="relative z-10 px-8 py-6">

            <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-6">

                <!-- LEFT -->
                <div class="flex items-center gap-5">

                    <!-- Logo -->
                    <div class="flex items-center gap-3">

                        <div>

                            <img src="{{ asset('images/logo1.png') }}"
                                 class="w-20 h-20 object-contain">

                        </div>

                    </div>


                    <!-- Title -->
                    <div>
                        <h1 class="text-4xl xl:text-5xl font-black tracking-wide text-white">

                            LAPAS KELAS IIA CIKARANG

                        </h1>

                        <div class="mt-2 text-[#d4af37]
                                    uppercase tracking-[0.45em]
                                    text-sm font-semibold">

                            S-A-K-T-I

                        </div>

                    </div>

                </div>



                <!-- RIGHT -->
                <div class="flex flex-wrap items-center gap-3">

                    <!-- Buttons -->
                    <a href="{{ route('input.penghuni') }}"
                    class="px-5 py-4 rounded-2xl
                            bg-white text-[#07044f]
                            font-bold shadow-lg
                            hover:scale-105 transition">

                        📊 Statistik

                    </a>

                    <a href="{{ route('input.petugas') }}"
                    class="px-5 py-4 rounded-2xl
                            bg-white/5 border border-white/10
                            text-white backdrop-blur-xl
                            hover:bg-white/10 transition">

                        👮 Petugas

                    </a>

                    <a href="{{ route('input.lalu_lintas') }}"
                    class="px-6 py-4 rounded-2xl
                            bg-[#d4af37]
                            hover:bg-[#c29b24]
                            text-[#07044f]
                            font-black shadow-lg transition">

                        ➕ Aktivitas

                    </a>

                </div>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- MAIN STATS -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-2 xl:grid-cols-4 gap-4">

        <!-- Kapasitas -->
        <div class="bg-white/5 border border-white/10
                    backdrop-blur-xl rounded-[26px]
                    px-6 py-5">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-xs uppercase tracking-[0.2em]
                                text-gray-400 font-semibold">

                        Kapasitas

                    </div>

                    <div class="mt-3 text-5xl font-black text-white">

                        {{ $master->kapasitas ?? 0 }}

                    </div>

                </div>

                <div class="text-[#d4af37] text-4xl">
                    🏛️
                </div>

            </div>

        </div>



        <!-- Penghuni -->
        <div class="bg-white/5 border border-white/10
                    backdrop-blur-xl rounded-[26px]
                    px-6 py-5">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-xs uppercase tracking-[0.2em]
                                text-gray-400 font-semibold">

                        Total Penghuni

                    </div>

                    <div class="mt-3 text-5xl font-black text-white">

                        {{ $master->isi ?? 0 }}

                    </div>

                </div>

                <div class="text-blue-400 text-4xl">
                    👥
                </div>

            </div>

        </div>



        <!-- Dalam -->
        <div class="bg-white/5 border border-white/10
                    backdrop-blur-xl rounded-[26px]
                    px-6 py-5">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-xs uppercase tracking-[0.2em]
                                text-gray-400 font-semibold">

                        Dalam Lapas

                    </div>

                    <div class="mt-3 text-5xl font-black text-green-400">

                        {{ $dalam ?? 0 }}

                    </div>

                </div>

                <div class="text-green-400 text-4xl">
                    🔒
                </div>

            </div>

        </div>



        <!-- Luar -->
        <div class="bg-white/5 border border-white/10
                    backdrop-blur-xl rounded-[26px]
                    px-6 py-5">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-xs uppercase tracking-[0.2em]
                                text-gray-400 font-semibold">

                        Luar Lapas

                    </div>

                    <div class="mt-3 text-5xl font-black text-red-400">

                        {{ $luar ?? 0 }}

                    </div>

                </div>

                <div class="text-red-400 text-4xl">
                    🌳
                </div>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- INFORMATION STRIP -->
    <!-- ===================================================== -->

    <div class="bg-white/5 border border-white/10
                backdrop-blur-xl rounded-[26px]
                px-6 py-5">

        <div class="flex flex-wrap items-center gap-x-10 gap-y-4">

            <!-- Label -->
            <div class="text-[#d4af37]
                        uppercase tracking-[0.25em]
                        text-sm font-bold">

                Detail Penghuni

            </div>

            <!-- Items -->
            <div class="flex flex-wrap items-center gap-x-8 gap-y-3 text-sm">

                <div class="text-white/80">
                    Tahanan :
                    <span class="font-black text-white ml-1">
                        {{ $master->tahanan ?? 0 }}
                    </span>
                </div>

                <div class="text-white/80">
                    Narapidana :
                    <span class="font-black text-white ml-1">
                        {{ $master->narapidana ?? 0 }}
                    </span>
                </div>

                <div class="text-white/80">
                    WNA :
                    <span class="font-black text-white ml-1">
                        {{ $master->wna ?? 0 }}
                    </span>
                </div>

                <div class="text-white/80">
                    Andikpas :
                    <span class="font-black text-white ml-1">
                        {{ $master->andikpas ?? 0 }}
                    </span>
                </div>

                <div class="text-white/80">
                    Pria :
                    <span class="font-black text-white ml-1">
                        {{ $master->pria ?? 0 }}
                    </span>
                </div>

                <div class="text-white/80">
                    Wanita :
                    <span class="font-black text-white ml-1">
                        {{ $master->wanita ?? 0 }}
                    </span>
                </div>

                <div class="text-white/80">
                    Lansia :
                    <span class="font-black text-white ml-1">
                        {{ $master->lansia ?? 0 }}
                    </span>
                </div>

                <div class="text-white/80">
                    Pengunjung :
                    <span class="font-black text-white ml-1">
                        {{ $harian->pengunjung ?? 0 }}
                    </span>
                </div>

                <div class="text-white/80">
                    Eksternal :
                    <span class="font-black text-white ml-1">
                        {{ $harian->petugas_eksternal ?? 0 }}
                    </span>
                </div>

                <div class="text-white/80">
                    Tamu Dinas :
                    <span class="font-black text-white ml-1">
                        {{ $harian->tamu_dinas ?? 0 }}
                    </span>
                </div>

            </div>

        </div>

    </div>



    <!-- ===================================================== -->
    <!-- MAIN MONITORING -->
    <!-- ===================================================== -->
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-5 items-start">

            <!-- ================================================= -->
            <!-- RIWAYAT LALU LINTAS -->
            <!-- ================================================= -->

            <div class="xl:col-span-9">

                <div class="bg-white/5
                            border border-white/10
                            backdrop-blur-xl
                            rounded-[30px]
                            overflow-hidden">

                    <!-- HEADER -->
                    <div class="px-7 py-5
                                border-b border-white/10
                                flex items-center justify-between">

                        <div>

                            <h3 class="text-3xl font-black text-white">
                                Riwayat Lalu Lintas
                            </h3>

                            <p class="text-white/50 mt-1">
                                Aktivitas realtime keluar masuk penghuni
                            </p>

                        </div>

                        <!-- ACTION -->
                        <a href="{{ route('input.edit_aktivitas') }}"
                        class="px-5 py-3 rounded-2xl
                                bg-[#d4af37]
                                hover:bg-[#c29b24]
                                text-[#07044f]
                                font-bold transition">

                            ✏️ Edit Aktivitas

                        </a>

                    </div>



                    <!-- ================================================= -->
                    <!-- TABLE -->
                    <!-- ================================================= -->

                    <div class="overflow-hidden">

                        <!-- TABLE HEADER -->
                        <div class="grid grid-cols-6
                                    bg-[#0b1120]
                                    border-b border-white/10
                                    text-white/70
                                    uppercase tracking-[0.2em]
                                    text-xs font-semibold">

                            <div class="px-7 py-5">
                                Aktivitas
                            </div>

                            <div class="px-7 py-5 text-center">
                                Jumlah
                            </div>

                            <div class="px-7 py-5 text-center">
                                Keluar
                            </div>

                            <div class="px-7 py-5 text-center">
                                Masuk
                            </div>

                            <div class="px-7 py-5 text-center">
                                Status
                            </div>

                            <div class="px-7 py-5">
                                Petugas
                            </div>

                        </div>



                        <!-- SCROLL AREA -->
                        <div class="h-52 overflow-hidden relative">

                            <div id="scroll-container"
                                class="absolute inset-0 overflow-hidden">

                                <!-- DATA -->
                                <div id="data-list" class="flex flex-col">

                                    @forelse($laluLintas as $item)

                                        <div class="grid grid-cols-6
                                                    border-b border-white/5
                                                    py-5 text-sm
                                                    hover:bg-white/3
                                                    transition-all duration-300">

                                            <!-- Aktivitas -->
                                            <div class="px-7 text-white font-semibold">

                                                {{ $item->uraian }}

                                            </div>

                                            <!-- Jumlah -->
                                            <div class="px-7 text-center text-white font-bold">

                                                {{ $item->jumlah }}

                                            </div>

                                            <!-- Jam Keluar -->
                                            <div class="px-7 text-center text-white/80">

                                                {{ $item->jam_keluar }}

                                            </div>

                                            <!-- Jam Masuk -->
                                            <div class="px-7 text-center text-white/80">

                                                {{ $item->jam_masuk ?? '-' }}

                                            </div>

                                            <!-- Status -->
                                            <div class="px-7 text-center">

                                                <span class="{{ $item->status == 'Kembali'
                                                    ? 'bg-green-500/10 text-green-400 border border-green-500/20'
                                                    : 'bg-red-500/10 text-red-400 border border-red-500/20' }}

                                                    px-4 py-2 rounded-full
                                                    text-xs font-bold">

                                                    {{ $item->status }}

                                                </span>

                                            </div>

                                            <!-- Petugas -->
                                            <div class="px-7 text-white/80">

                                                {{ $item->petugas ?? '-' }}

                                            </div>

                                        </div>

                                    @empty

                                        <div class="py-32 text-center text-white/40 text-lg">

                                            Belum ada aktivitas hari ini

                                        </div>

                                    @endforelse

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



    <!-- ================================================= -->
<!-- PETUGAS JAGA -->
<!-- ================================================= -->

<div class="xl:col-span-3">

    <div class="overflow-hidden
                rounded-3xl
                border border-white/10
                bg-[#0f172a]/90
                backdrop-blur-2xl">

        <!-- HEADER -->
        <div class="px-5 py-4 border-b border-white/10">

            <div class="flex items-center justify-between">

                <div>

                    <div class="text-[10px]
                                uppercase tracking-[0.25em]
                                text-[#d4af37]
                                font-bold">

                        Shift Aktif

                    </div>

                    <h2 class="text-xl font-black text-white mt-1">

                        {{ $harian->rupam ?? 'Rupam -' }}

                    </h2>

                </div>

                <div class="w-11 h-11 rounded-2xl
                            bg-[#d4af37]/10
                            border border-[#d4af37]/20
                            flex items-center justify-center
                            text-xl">

                    👮

                </div>

            </div>

        </div>



        <!-- CONTENT -->
        <div class="p-5 space-y-4">

            <!-- KARUPAM -->
            <div>

                <div class="text-[10px]
                            uppercase tracking-[0.2em]
                            text-white/40 font-semibold mb-1">

                    Karupam

                </div>

                <div class="text-lg font-bold text-white leading-tight">

                    {{ $harian->karupam ?? '-' }}

                </div>

            </div>



            <!-- WAKARUPAM -->
            <div>

                <div class="text-[10px]
                            uppercase tracking-[0.2em]
                            text-white/40 font-semibold mb-1">

                    Wakarupam

                </div>

                <div class="text-lg font-bold text-white leading-tight">

                    {{ $harian->wakarupam ?? '-' }}

                </div>

            </div>



            <!-- PETUGAS -->
            <div>

                <div class="text-[10px]
                            uppercase tracking-[0.2em]
                            text-white/40 font-semibold mb-2">

                    Petugas P2U

                </div>

                <div class="flex flex-wrap gap-2">

                    <div class="px-3 py-2 rounded-xl
                                bg-white/5 border border-white/10
                                text-white text-sm font-semibold">

                        {{ $harian->petugas_1 ?? '-' }}

                    </div>

                    <div class="px-3 py-2 rounded-xl
                                bg-white/5 border border-white/10
                                text-white text-sm font-semibold">

                        {{ $harian->petugas_2 ?? '-' }}

                    </div>

                </div>

            </div>



            <!-- BUTTON -->
            <a href="{{ route('input.petugas') }}"
               class="mt-4 inline-flex items-center justify-center gap-2
                      w-full py-3 rounded-2xl
                      bg-linear-to-r from-[#d4af37] to-yellow-500
                      text-black text-sm font-black
                      hover:scale-[1.01]
                      transition-all">

                ✏️ Edit Petugas

            </a>

        </div>

    </div>

</div>

</div>
<!-- ===================================================== -->
<!-- AUTO SCROLL -->
<!-- ===================================================== -->

<script>

function startProfessionalScroll() {

    const container = document.getElementById('scroll-container');
    const content = document.getElementById('data-list');

    if (!container || !content) return;

    const oldClone = document.getElementById('clone-list');

    if (oldClone) oldClone.remove();

    const clone = content.cloneNode(true);

    clone.id = 'clone-list';

    content.parentNode.appendChild(clone);

    const speed = 0.15;

    let currentScroll = 0;
    let isPaused = false;

    container.addEventListener('mouseenter', () => {
        isPaused = true;
    });

    container.addEventListener('mouseleave', () => {
        isPaused = false;
    });

    function animate() {

        if (!isPaused) {

            currentScroll += speed;

            if (currentScroll >= content.offsetHeight) {
                currentScroll = 0;
            }

            container.scrollTop = currentScroll;
        }

        requestAnimationFrame(animate);
    }

    animate();
}

window.addEventListener('load', () => {

    setTimeout(startProfessionalScroll, 500);

});



function updateClock() {

    const now = new Date();

    const time = now.toLocaleTimeString('id-ID');

    document.getElementById('clock').innerHTML = time;
}

setInterval(updateClock, 1000);

updateClock();

</script>

<script>

    // Auto refresh khusus dashboard
    setInterval(() => {

        window.location.reload();

    }, 30000);

</script>

@endsection