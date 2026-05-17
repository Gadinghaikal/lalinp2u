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

<body class="min-h-screen bg-[#050816] text-white overflow-hidden">

    <!-- ================= BACKGROUND ================= -->

    <div class="fixed inset-0 -z-10 overflow-hidden">

        <!-- Glow -->
        <div class="absolute -top-40 -left-20
                    w-96 h-96
                    bg-[#d4af37]/10
                    rounded-full blur-3xl">
        </div>

        <div class="absolute top-20 -right-20
                    w-80 h-80
                    bg-blue-500/10
                    rounded-full blur-3xl">
        </div>

        <!-- Grid -->
        <div class="absolute inset-0 opacity-[0.03]"
             style="
                background-image:
                linear-gradient(rgba(255,255,255,0.15) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.15) 1px, transparent 1px);
                background-size: 32px 32px;
             ">
        </div>

    </div>

    <!-- ================= MAIN ================= -->

    <div class="min-h-screen flex flex-col">

        <!-- ================================================= -->
        <!-- HEADER -->
        <!-- ================================================= -->

        <header class="sticky top-0 z-50
                       border-b border-white/10
                       bg-[#050816]/80
                       backdrop-blur-xl">

            <div class="w-full px-4 py-3">

                <div class="flex items-center justify-between gap-4">

                    <!-- LEFT -->
                    <div class="flex items-center gap-3">

                        <!-- LOGO 1 -->
                        <div class="w-12 h-12
                                    rounded-xl
                                    bg-white/5
                                    border border-white/10
                                    flex items-center justify-center">

                            <img src="{{ asset('images/imipas.png') }}"
                                 class="w-8 h-8 object-contain">

                        </div>

                        <!-- LOGO 2 -->
                        <div class="w-12 h-12
                                    rounded-xl
                                    bg-white/5
                                    border border-white/10
                                    flex items-center justify-center">

                            <img src="{{ asset('images/pemasyarakatan.png') }}"
                                 class="w-8 h-8 object-contain">

                        </div>

                        <!-- TITLE -->
                        <div>

                            <h1 class="text-xl md:text-2xl
                                       font-black
                                       tracking-wide
                                       text-white
                                       leading-tight">

                                PAPAN KONTROL

                            </h1>

                            <p class="text-[#d4af37]
                                      tracking-[0.25em]
                                      uppercase
                                      text-[10px]
                                      font-semibold
                                      mt-1">

                                LALU LINTAS PENGHUNI

                            </p>

                        </div>

                    </div>

                    <!-- RIGHT -->
                    <div class="flex items-center gap-3">

                        <!-- STATUS -->
                        <div class="flex items-center gap-2
                                    px-3 py-2
                                    rounded-xl
                                    border border-green-500/20
                                    bg-green-500/10">

                            <div class="relative">

                                <div class="w-2 h-2
                                            rounded-full
                                            bg-green-400 animate-pulse">
                                </div>

                            </div>

                            <div>

                                <div class="text-[9px]
                                            text-green-300
                                            uppercase
                                            tracking-widest">

                                    Status

                                </div>

                                <div class="text-xs
                                            font-bold
                                            text-green-400">

                                    LIVE

                                </div>

                            </div>

                        </div>

                        <!-- CLOCK -->
                        <div class="px-4 py-2
                                    rounded-xl
                                    bg-white/5
                                    border border-white/10">

                            <div class="text-[9px]
                                        uppercase
                                        tracking-[0.2em]
                                        text-gray-400">

                                Waktu

                            </div>

                            <div id="clock"
                                 class="text-xl
                                        font-black
                                        tracking-widest
                                        text-[#d4af37]">

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <!-- ================================================= -->
        <!-- CONTENT -->
        <!-- ================================================= -->

        <main class="flex-1
                     w-full
                     px-3 py-3
                     overflow-hidden">

            @yield('content')

        </main>

        <!-- ================================================= -->
        <!-- FOOTER -->
        <!-- ================================================= -->

        <footer class="border-t border-white/10
                       bg-[#050816]/90
                       overflow-hidden">

            <div class="relative h-8 flex items-center">

                <div class="absolute whitespace-nowrap
                            animate-marquee
                            text-[10px]
                            font-medium
                            text-[#d4af37]">

                    Seluruh aktivitas lalu lintas penghuni dipantau realtime •
                    Lapas Kelas IIA CIKARANG •

                </div>

            </div>

        </footer>

    </div>

    <!-- ================================================= -->
    <!-- CLOCK -->
    <!-- ================================================= -->

    <script>

        function updateClock() {

            const now = new Date();

            const time = now.toLocaleTimeString('id-ID');

            document.getElementById('clock').innerHTML = time;
        }

        setInterval(updateClock, 1000);

        updateClock();

    </script>

    <!-- ================================================= -->
    <!-- MARQUEE -->
    <!-- ================================================= -->

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

            animation: marquee 25s linear infinite;
        }

    </style>

</body>

</html>