@extends('layouts.app')

@section('content')

<div class="w-full h-full
            px-2 md:px-3
            space-y-3
            overflow-hidden">

    <!-- ===================================================== -->
    <!-- HEADER -->
    <!-- ===================================================== -->

    <div class="relative overflow-hidden
                rounded-[22px]
                bg-linear-to-r
                from-[#070b1f]
                via-[#0b1130]
                to-[#11193d]
                border border-white/10
                shadow-2xl">

        <div class="absolute -top-20 right-0
                    w-72 h-72
                    bg-[#d4af37]/10
                    rounded-full blur-3xl">
        </div>

        <div class="relative z-10 px-4 py-3">

            <div class="flex items-center justify-between gap-4">

                <!-- LEFT -->
                <div class="flex items-center gap-3">

                    <img src="{{ asset('images/logo1.png') }}"
                         class="w-12 h-12 object-contain">

                    <div>

                        <h1 class="text-xl md:text-2xl
                                   font-black tracking-wide
                                   text-white leading-tight">

                            LAPAS KELAS IIA CIKARANG

                        </h1>

                        <div class="mt-1
                                    text-[#d4af37]
                                    uppercase
                                    tracking-[0.25em]
                                    text-[10px]
                                    font-semibold">

                            S-A-K-T-I

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="flex items-center gap-2">

                    <a href="{{ route('input.penghuni') }}"
                       class="px-3 py-2
                              rounded-xl
                              bg-white
                              text-[#07044f]
                              text-xs
                              font-bold">

                        📊 Statistik

                    </a>

                    <a href="{{ route('input.petugas') }}"
                       class="px-3 py-2
                              rounded-xl
                              bg-white/5
                              border border-white/10
                              text-white
                              text-xs">

                        👮 Petugas

                    </a>

                    <a href="{{ route('input.lalu_lintas') }}"
                       class="px-4 py-2
                              rounded-xl
                              bg-[#d4af37]
                              text-[#07044f]
                              text-xs
                              font-black">

                        ➕ Aktivitas

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- CARD STATISTIK -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-2 xl:grid-cols-4 gap-3">

        <!-- KAPASITAS -->
        <div class="bg-white/5
                    border border-white/10
                    backdrop-blur-xl
                    rounded-2xl
                    px-4 py-3">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-[9px]
                                uppercase
                                tracking-[0.2em]
                                text-gray-400
                                font-semibold">

                        Kapasitas

                    </div>

                    <div class="mt-1
                                text-2xl
                                font-black
                                text-white">

                        {{ $master->kapasitas ?? 0 }}

                    </div>

                </div>

                <div class="text-[#d4af37] text-xl">
                    🏛️
                </div>

            </div>

        </div>

        <!-- TOTAL -->
        <div class="bg-white/5
                    border border-white/10
                    backdrop-blur-xl
                    rounded-2xl
                    px-4 py-3">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-[9px]
                                uppercase
                                tracking-[0.2em]
                                text-gray-400
                                font-semibold">

                        Total Penghuni

                    </div>

                    <div class="mt-1
                                text-2xl
                                font-black
                                text-white">

                        {{ $master->isi ?? 0 }}

                    </div>

                </div>

                <div class="text-cyan-400 text-xl">
                    👥
                </div>

            </div>

        </div>

        <!-- DALAM -->
        <div class="bg-white/5
                    border border-white/10
                    backdrop-blur-xl
                    rounded-2xl
                    px-4 py-3">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-[9px]
                                uppercase
                                tracking-[0.2em]
                                text-gray-400
                                font-semibold">

                        Dalam Lapas

                    </div>

                    <div class="mt-1
                                text-2xl
                                font-black
                                text-green-400">

                        {{ $dalam ?? 0 }}

                    </div>

                </div>

                <div class="text-green-400 text-xl">
                    🔒
                </div>

            </div>

        </div>

        <!-- LUAR -->
        <div class="bg-white/5
                    border border-white/10
                    backdrop-blur-xl
                    rounded-2xl
                    px-4 py-3">

            <div class="flex justify-between items-start">

                <div>

                    <div class="text-[9px]
                                uppercase
                                tracking-[0.2em]
                                text-gray-400
                                font-semibold">

                        Luar Lapas

                    </div>

                    <div class="mt-1
                                text-2xl
                                font-black
                                text-red-400">

                        {{ $luar ?? 0 }}

                    </div>

                </div>

                <div class="text-red-400 text-xl">
                    🌳
                </div>

            </div>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- DETAIL -->
    <!-- ===================================================== -->

    <div class="bg-white/5
                border border-white/10
                backdrop-blur-xl
                rounded-2xl
                px-4 py-3">

        <div class="flex flex-wrap items-center gap-x-5 gap-y-2">

            <div class="text-[#d4af37]
                        uppercase
                        tracking-[0.2em]
                        text-[10px]
                        font-bold">

                Detail Penghuni

            </div>

            <div class="text-xs text-white/80">
                Tahanan :
                <span class="font-black text-white">
                    {{ $master->tahanan ?? 0 }}
                </span>
            </div>

            <div class="text-xs text-white/80">
                Narapidana :
                <span class="font-black text-white">
                    {{ $master->narapidana ?? 0 }}
                </span>
            </div>

            <div class="text-xs text-white/80">
                WNA :
                <span class="font-black text-white">
                    {{ $master->wna ?? 0 }}
                </span>
            </div>

            <div class="text-xs text-white/80">
                Andikpas :
                <span class="font-black text-white">
                    {{ $master->andikpas ?? 0 }}
                </span>
            </div>

            <div class="text-xs text-white/80">
                Pengunjung :
                <span class="font-black text-white">
                    {{ $harian->pengunjung ?? 0 }}
                </span>
            </div>

        </div>

    </div>

    <!-- ===================================================== -->
    <!-- CONTENT -->
    <!-- ===================================================== -->

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-3">

        <!-- ================================================= -->
        <!-- RIWAYAT -->
        <!-- ================================================= -->

        <div class="xl:col-span-9">

            <div class="bg-white/5
                        border border-white/10
                        backdrop-blur-xl
                        rounded-2xl
                        overflow-hidden">

                <!-- HEADER -->
                <div class="px-4 py-3
                            border-b border-white/10
                            flex items-center justify-between">

                    <div>

                        <h3 class="text-lg
                                   font-black
                                   text-white">

                            Riwayat Lalu Lintas

                        </h3>

                        <p class="text-white/40 text-xs mt-1">

                            Monitoring realtime

                        </p>

                    </div>

                    <a href="{{ route('input.edit_aktivitas') }}"
                       class="px-3 py-2
                              rounded-xl
                              bg-[#d4af37]
                              text-[#07044f]
                              text-xs
                              font-bold">

                        ✏️ Edit

                    </a>

                </div>

                <!-- TABLE -->
                <div>

                    <!-- TABLE HEAD -->
                    <div class="grid grid-cols-6
                                bg-[#0b1120]
                                text-[9px]
                                uppercase
                                tracking-[0.15em]
                                text-white/60
                                font-semibold">

                        <div class="px-3 py-3">Aktivitas</div>
                        <div class="px-3 py-3 text-center">Jumlah</div>
                        <div class="px-3 py-3 text-center">Keluar</div>
                        <div class="px-3 py-3 text-center">Masuk</div>
                        <div class="px-3 py-3 text-center">Status</div>
                        <div class="px-3 py-3">Petugas</div>

                    </div>

                    <!-- BODY -->
                    <div class="h-65 overflow-hidden">

                        @forelse($laluLintas as $item)

                        <div class="grid grid-cols-6
                                    border-b border-white/5
                                    text-xs
                                    hover:bg-white/5">

                            <div class="px-3 py-3 text-white font-semibold">
                                {{ $item->uraian }}
                            </div>

                            <div class="px-3 py-3 text-center text-white">
                                {{ $item->jumlah }}
                            </div>

                            <div class="px-3 py-3 text-center text-white/70">
                                {{ $item->jam_keluar }}
                            </div>

                            <div class="px-3 py-3 text-center text-white/70">
                                {{ $item->jam_masuk ?? '-' }}
                            </div>

                            <div class="px-3 py-3 text-center">

                                <span class="{{ $item->status == 'Kembali'
                                    ? 'bg-green-500/10 text-green-400'
                                    : 'bg-red-500/10 text-red-400' }}

                                    px-2 py-1 rounded-full
                                    text-[9px]
                                    font-bold">

                                    {{ $item->status }}

                                </span>

                            </div>

                            <div class="px-3 py-3 text-white/80">
                                {{ $item->petugas ?? '-' }}
                            </div>

                        </div>

                        @empty

                        <div class="py-16 text-center text-white/40 text-sm">

                            Belum ada aktivitas

                        </div>

                        @endforelse

                    </div>

                </div>

            </div>

        </div>

        <!-- ================================================= -->
        <!-- PETUGAS -->
        <!-- ================================================= -->

        <div class="xl:col-span-3">

            <div class="rounded-2xl
                        border border-white/10
                        bg-[#0f172a]/90
                        overflow-hidden">

                <!-- HEADER -->
                <div class="px-4 py-3 border-b border-white/10">

                    <div class="flex items-center justify-between">

                        <div>

                            <div class="text-[9px]
                                        uppercase
                                        tracking-[0.2em]
                                        text-[#d4af37]
                                        font-bold">

                                Shift Aktif

                            </div>

                            <h2 class="text-base
                                       font-black
                                       text-white mt-1">

                                {{ $harian->rupam ?? 'Rupam -' }}

                            </h2>

                        </div>

                        <div class="text-lg">
                            👮
                        </div>

                    </div>

                </div>

                <!-- BODY -->
                <div class="p-4 space-y-3">

                    <div>

                        <div class="text-[9px]
                                    uppercase
                                    tracking-[0.15em]
                                    text-white/40 mb-1">

                            Karupam

                        </div>

                        <div class="text-sm font-bold text-white">

                            {{ $harian->karupam ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <div class="text-[9px]
                                    uppercase
                                    tracking-[0.15em]
                                    text-white/40 mb-1">

                            Wakarupam

                        </div>

                        <div class="text-sm font-bold text-white">

                            {{ $harian->wakarupam ?? '-' }}

                        </div>

                    </div>

                    <div>

                        <div class="text-[9px]
                                    uppercase
                                    tracking-[0.15em]
                                    text-white/40 mb-2">

                            Petugas P2U

                        </div>

                        <div class="space-y-2">

                            <div class="px-3 py-2
                                        rounded-xl
                                        bg-white/5
                                        border border-white/10
                                        text-xs font-semibold">

                                {{ $harian->petugas_1 ?? '-' }}

                            </div>

                            <div class="px-3 py-2
                                        rounded-xl
                                        bg-white/5
                                        border border-white/10
                                        text-xs font-semibold">

                                {{ $harian->petugas_2 ?? '-' }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

setInterval(() => {

    window.location.reload();

}, 30000);

</script>

@endsection

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