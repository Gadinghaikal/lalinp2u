@extends('layouts.app')

@section('content')

<div class="tv-scale
            w-full min-h-screen
            px-3 md:px-5 2xl:px-8
            space-y-4 2xl:space-y-5
            overflow-hidden">

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

        <div class="relative z-10 px-5 py-4 2xl:px-6 2xl:py-5">

            <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-5">

                <!-- LEFT -->
                <div class="flex items-center gap-4">

                    <!-- Logo -->
                    <div>
                        <img src="{{ asset('images/logo1.png') }}"
                             class="w-16 h-16 2xl:w-20 2xl:h-20 object-contain">
                    </div>

                    <!-- Title -->
                    <div>

                        <h1 class="text-2xl md:text-3xl 2xl:text-4xl
                                   font-black tracking-wide text-white
                                   leading-tight">

                            LAPAS KELAS IIA CIKARANG

                        </h1>

                        <div class="mt-1 text-[#d4af37]
                                    uppercase tracking-[0.35em]
                                    text-xs 2xl:text-sm
                                    font-semibold">

                            S-A-K-T-I

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="flex flex-wrap items-center gap-3">

                    <a href="{{ route('input.penghuni') }}"
                       class="px-4 py-3 rounded-2xl
                              bg-white text-[#07044f]
                              text-sm font-bold shadow-lg
                              hover:scale-105 transition">

                        📊 Statistik

                    </a>

                    <a href="{{ route('input.petugas') }}"
                       class="px-4 py-3 rounded-2xl
                              bg-white/5 border border-white/10
                              text-white text-sm
                              backdrop-blur-xl
                              hover:bg-white/10 transition">

                        👮 Petugas

                    </a>

                    <a href="{{ route('input.lalu_lintas') }}"
                       class="px-5 py-3 rounded-2xl
                              bg-[#d4af37]
                              hover:bg-[#c29b24]
                              text-[#07044f]
                              text-sm font-black
                              shadow-lg transition">

                        ➕ Aktivitas

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- MAIN STATS -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-2 xl:grid-cols-4 gap-3 2xl:gap-4">

        <!-- Kapasitas -->
        <div class="bg-white/5 border border-white/10
                    backdrop-blur-xl rounded-3xl
                    px-4 py-4 2xl:px-5 2xl:py-4">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-[10px] uppercase tracking-[0.2em]
                                text-gray-400 font-semibold">

                        Kapasitas

                    </div>

                    <div class="mt-2 text-3xl 2xl:text-4xl
                                font-black text-white">

                        {{ $master->kapasitas ?? 0 }}

                    </div>

                </div>

                <div class="text-[#d4af37] text-2xl 2xl:text-3xl">
                    🏛️
                </div>

            </div>

        </div>

        <!-- Penghuni -->
        <div class="bg-white/5 border border-white/10
                    backdrop-blur-xl rounded-3xl
                    px-4 py-4 2xl:px-5 2xl:py-4">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-[10px] uppercase tracking-[0.2em]
                                text-gray-400 font-semibold">

                        Total Penghuni

                    </div>

                    <div class="mt-2 text-3xl 2xl:text-4xl
                                font-black text-white">

                        {{ $master->isi ?? 0 }}

                    </div>

                </div>

                <div class="text-blue-400 text-2xl 2xl:text-3xl">
                    👥
                </div>

            </div>

        </div>

        <!-- Dalam -->
        <div class="bg-white/5 border border-white/10
                    backdrop-blur-xl rounded-3xl
                    px-4 py-4 2xl:px-5 2xl:py-4">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-[10px] uppercase tracking-[0.2em]
                                text-gray-400 font-semibold">

                        Dalam Lapas

                    </div>

                    <div class="mt-2 text-3xl 2xl:text-4xl
                                font-black text-green-400">

                        {{ $dalam ?? 0 }}

                    </div>

                </div>

                <div class="text-green-400 text-2xl 2xl:text-3xl">
                    🔒
                </div>

            </div>

        </div>

        <!-- Luar -->
        <div class="bg-white/5 border border-white/10
                    backdrop-blur-xl rounded-3xl
                    px-4 py-4 2xl:px-5 2xl:py-4">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-[10px] uppercase tracking-[0.2em]
                                text-gray-400 font-semibold">

                        Luar Lapas

                    </div>

                    <div class="mt-2 text-3xl 2xl:text-4xl
                                font-black text-red-400">

                        {{ $luar ?? 0 }}

                    </div>

                </div>

                <div class="text-red-400 text-2xl 2xl:text-3xl">
                    🌳
                </div>

            </div>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- INFORMATION STRIP -->
    <!-- ===================================================== -->

    <div class="bg-white/5 border border-white/10
                backdrop-blur-xl rounded-3xl
                px-4 py-4">

        <div class="flex flex-wrap items-center gap-x-6 gap-y-3">

            <div class="text-[#d4af37]
                        uppercase tracking-[0.25em]
                        text-xs font-bold">

                Detail Penghuni

            </div>

            <div class="flex flex-wrap items-center gap-x-6 gap-y-2
                        text-xs 2xl:text-sm">

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

    <div class="grid grid-cols-1 xl:grid-cols-12
                gap-4 2xl:gap-5 items-start">

        <!-- ================================================= -->
        <!-- RIWAYAT -->
        <!-- ================================================= -->

        <div class="xl:col-span-9">

            <div class="bg-white/5
                        border border-white/10
                        backdrop-blur-xl
                        rounded-[28px]
                        overflow-hidden">

                <!-- HEADER -->
                <div class="px-5 py-4
                            border-b border-white/10
                            flex items-center justify-between">

                    <div>

                        <h3 class="text-xl 2xl:text-2xl
                                   font-black text-white">

                            Riwayat Lalu Lintas

                        </h3>

                        <p class="text-white/50 mt-1 text-sm">

                            Aktivitas realtime keluar masuk penghuni

                        </p>

                    </div>

                    <a href="{{ route('input.edit_aktivitas') }}"
                       class="px-4 py-3 rounded-2xl
                              bg-[#d4af37]
                              hover:bg-[#c29b24]
                              text-[#07044f]
                              text-sm font-bold transition">

                        ✏️ Edit Aktivitas

                    </a>

                </div>

                <!-- TABLE -->
                <div class="overflow-hidden">

                    <!-- HEADER -->
                    <div class="grid grid-cols-6
                                bg-[#0b1120]
                                border-b border-white/10
                                text-white/70
                                uppercase tracking-[0.15em]
                                text-[10px] font-semibold">

                        <div class="px-5 py-4">Aktivitas</div>
                        <div class="px-5 py-4 text-center">Jumlah</div>
                        <div class="px-5 py-4 text-center">Keluar</div>
                        <div class="px-5 py-4 text-center">Masuk</div>
                        <div class="px-5 py-4 text-center">Status</div>
                        <div class="px-5 py-4">Petugas</div>

                    </div>

                    <!-- BODY -->
                    <div class="h-90 2xl:h-105
                                overflow-hidden relative">

                        <div id="scroll-container"
                             class="absolute inset-0 overflow-hidden">

                            <div id="data-list" class="flex flex-col">

                                @forelse($laluLintas as $item)

                                <div class="grid grid-cols-6
                                            border-b border-white/5
                                            py-3 text-xs 2xl:text-sm
                                            hover:bg-white/3
                                            transition-all duration-300">

                                    <div class="px-5 text-white font-semibold">
                                        {{ $item->uraian }}
                                    </div>

                                    <div class="px-5 text-center text-white font-bold">
                                        {{ $item->jumlah }}
                                    </div>

                                    <div class="px-5 text-center text-white/80">
                                        {{ $item->jam_keluar }}
                                    </div>

                                    <div class="px-5 text-center text-white/80">
                                        {{ $item->jam_masuk ?? '-' }}
                                    </div>

                                    <div class="px-5 text-center">

                                        <span class="{{ $item->status == 'Kembali'
                                            ? 'bg-green-500/10 text-green-400 border border-green-500/20'
                                            : 'bg-red-500/10 text-red-400 border border-red-500/20' }}

                                            px-3 py-1 rounded-full
                                            text-[10px] font-bold">

                                            {{ $item->status }}

                                        </span>

                                    </div>

                                    <div class="px-5 text-white/80">
                                        {{ $item->petugas ?? '-' }}
                                    </div>

                                </div>

                                @empty

                                <div class="py-20 text-center text-white/40 text-lg">

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
        <!-- PETUGAS -->
        <!-- ================================================= -->

        <div class="xl:col-span-3">

            <div class="overflow-hidden
                        rounded-3xl
                        border border-white/10
                        bg-[#0f172a]/90
                        backdrop-blur-2xl">

                <!-- HEADER -->
                <div class="px-4 py-4 border-b border-white/10">

                    <div class="flex items-center justify-between">

                        <div>

                            <div class="text-[10px]
                                        uppercase tracking-[0.25em]
                                        text-[#d4af37]
                                        font-bold">

                                Shift Aktif

                            </div>

                            <h2 class="text-lg 2xl:text-xl
                                       font-black text-white mt-1">

                                {{ $harian->rupam ?? 'Rupam -' }}

                            </h2>

                        </div>

                        <div class="w-10 h-10 rounded-2xl
                                    bg-[#d4af37]/10
                                    border border-[#d4af37]/20
                                    flex items-center justify-center
                                    text-lg">

                            👮

                        </div>

                    </div>

                </div>

                <!-- CONTENT -->
                <div class="p-4 space-y-3">

                    <div>

                        <div class="text-[10px]
                                    uppercase tracking-[0.2em]
                                    text-white/40 font-semibold mb-1">

                            Karupam

                        </div>

                        <div class="text-base font-bold text-white">

                            {{ $harian->karupam ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <div class="text-[10px]
                                    uppercase tracking-[0.2em]
                                    text-white/40 font-semibold mb-1">

                            Wakarupam

                        </div>

                        <div class="text-base font-bold text-white">

                            {{ $harian->wakarupam ?? '-' }}

                        </div>

                    </div>

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

                    <a href="{{ route('input.petugas') }}"
                       class="mt-3 inline-flex items-center justify-center gap-2
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

</script>

<script>

setInterval(() => {

    window.location.reload();

}, 30000);

</script>

@endsection