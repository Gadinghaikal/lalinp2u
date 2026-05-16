<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Papan Kontrol Lalu Lintas P2U
    </title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-[#050816] text-white overflow-x-hidden">

    <!-- ================= BACKGROUND EFFECT ================= -->

    <div class="fixed inset-0 -z-10 overflow-hidden">

        <!-- Gradient Glow Top -->
        <div class="absolute -top-50 -left-25 w-125 h-125 bg-[#d4af37]/10 rounded-full blur-3xl">
        </div>

        <!-- Gradient Glow Right -->
        <div class="absolute top-25 -right-25 w-100 h-100 bg-blue-500/10 rounded-full blur-3xl">
        </div>

        <!-- Gradient Glow Bottom -->
        <div class="absolute -bottom-50 left-[30%] w-125 h-125 bg-[#d4af37]/5 rounded-full blur-3xl">
        </div>

        <!-- Grid Overlay -->
        <div class="absolute inset-0 opacity-[0.03]"
             style="
                background-image:
                linear-gradient(rgba(255,255,255,0.15) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.15) 1px, transparent 1px);
                background-size: 40px 40px;
             ">
        </div>

    </div>


    <!-- ================= MAIN LAYOUT ================= -->

    <div class="min-h-screen flex flex-col">

        <!-- ================= HEADER ================= -->

        <header class="sticky top-0 z-50 border-b border-white/10 backdrop-blur-xl bg-[#050816]/80">

            <div class="max-w-450 mx-auto px-6 py-4">

                <div class="flex flex-col xl:flex-row xl:items-center justify-between gap-5">

                    <!-- LEFT -->
                    <div class="flex items-center gap-5">

                        <!-- Logo Kemenimipas -->
                        <div class="w-16 h-16 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center backdrop-blur-lg shadow-lg">

                            <img src="{{ asset('images/imipas.png') }}"
                                 class="w-12 h-12 object-contain">

                        </div>

                        <!-- Logo Lapas -->
                        <div class="w-16 h-16 rounded-2xl bg-white/5 border border-white/10 flex items-center justify-center backdrop-blur-lg shadow-lg">

                            <img src="{{ asset('images/pemasyarakatan.png') }}"
                                 class="w-12 h-12 object-contain">

                        </div>

                        <!-- Title -->
                        <div>

                            <h1 class="text-3xl xl:text-4xl font-black tracking-wide text-white">

                                PAPAN KONTROL

                            </h1>

                            <p class="text-[#d4af37] tracking-[0.3em] uppercase text-sm font-semibold mt-1">

                                LALU LINTAS PENGHUNI

                            </p>

                        </div>

                    </div>


                    <!-- RIGHT -->
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-4">

                        <!-- Live Status -->
                        <div class="flex items-center gap-3 px-5 py-3 rounded-2xl border border-green-500/20 bg-green-500/10 backdrop-blur-lg">

                            <div class="relative">

                                <div class="w-3 h-3 rounded-full bg-green-400 animate-pulse">
                                </div>

                                <div class="absolute inset-0 w-3 h-3 rounded-full bg-green-400 animate-ping">
                                </div>

                            </div>

                            <div>

                                <div class="text-xs text-green-300 uppercase tracking-widest">
                                    Status
                                </div>

                                <div class="font-bold text-green-400">
                                    LIVE MONITORING
                                </div>

                            </div>

                        </div>


                        <!-- Clock -->
                        <div class="px-6 py-3 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-lg shadow-lg">

                            <div class="text-xs uppercase tracking-[0.3em] text-gray-400 mb-1">
                                Waktu Sekarang
                            </div>

                            <div id="clock"
                                 class="text-3xl font-black tracking-widest text-[#d4af37]">
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </header>


        <!-- ================= MAIN CONTENT ================= -->

        <main class="flex-1 max-w-450 w-full mx-auto px-6 py-8">

            @yield('content')

        </main>


        <!-- ================= FOOTER RUNNING TEXT ================= -->

        <footer class="border-t border-white/10 bg-[#050816]/90 backdrop-blur-xl overflow-hidden">

            <div class="relative h-12 flex items-center">

                <div class="absolute whitespace-nowrap animate-marquee text-sm font-medium text-[#d4af37]">
                    Seluruh aktivitas lalu lintas penghuni dipantau realtime •
                    Lapas Kelas IIA Cikarang •

                </div>

            </div>

        </footer>

    </div>


    <!-- ================= SCRIPT ================= -->

    <script>

        // REALTIME CLOCK
        function updateClock() {

            const now = new Date();

            const time = now.toLocaleTimeString('id-ID');

            document.getElementById('clock').innerHTML = time;
        }

        setInterval(updateClock, 1000);

        updateClock();

    </script>


    <!-- ================= STYLE ================= -->

    <style>

        @keyframes marquee {

            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .animate-marquee {

            animation: marquee 30s linear infinite;
        }

    </style>

</body>
</html>