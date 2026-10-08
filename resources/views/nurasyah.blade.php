<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>To My Beloved, {{ $recipient }} — Forever Yours</title>

    <!-- Fonts: Premium Editorial + Romantic Handwriting -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Cormorant+Garamond:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Great+Vibes&family=Italiana&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js & Canvas Confetti -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
                        italiana: ['"Italiana"', 'serif'],
                        cormorant: ['"Cormorant Garamond"', 'serif'],
                        script: ['"Great Vibes"', 'cursive'],
                        handwriting: ['"Caveat"', 'cursive'],
                    },
                    colors: {
                        romantic: {
                            50: '#fff1f5',
                            100: '#ffe4ec',
                            200: '#fecdd6',
                            300: '#fda4b8',
                            400: '#fb7193',
                            500: '#f43f6e',
                            600: '#e11d48',
                            700: '#be123c',
                            800: '#9f1239',
                            900: '#881337',
                            950: '#4c0519',
                        },
                        paper: '#faf8f5',
                        parchment: '#f7f4ee',
                        cream: '#fffdfa',
                    },
                    animation: {
                        'float-slow': 'floatSlow 7s ease-in-out infinite',
                        'float-reverse': 'floatReverse 6s ease-in-out infinite',
                        'pulse-glow': 'pulseGlow 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 16s linear infinite',
                        'bounce-soft': 'bounceSoft 2s ease-in-out infinite',
                    },
                    keyframes: {
                        floatSlow: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-12px) rotate(1.5deg)' },
                        },
                        floatReverse: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(10px) rotate(-1.5deg)' },
                        },
                        pulseGlow: {
                            '0%, 100%': { opacity: '0.6', transform: 'scale(1)' },
                            '50%': { opacity: '1', transform: 'scale(1.03)' },
                        },
                        bounceSoft: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-6px)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Smooth Scroll & Custom Selection */
        html {
            scroll-behavior: smooth;
            -webkit-tap-highlight-color: transparent;
        }
        ::selection {
            background-color: #fecdd6;
            color: #881337;
        }

        /* Subtle Noise Film Grain & Ambient Gradient */
        body {
            background-color: #fff1f5;
            background-image: 
                radial-gradient(at 0% 0%, rgba(254, 205, 214, 0.55) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(253, 164, 184, 0.4) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(255, 241, 245, 0.85) 0px, transparent 100%);
            background-attachment: fixed;
            overflow-x: hidden;
            padding-bottom: env(safe-area-inset-bottom, 20px);
        }

        /* Glassmorphic Surfaces */
        .glass-panel {
            background: rgba(255, 255, 255, 0.82);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
        }
        .glass-panel-dark {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(254, 205, 214, 0.7);
        }

        /* Polaroid Scrapbook Styling */
        .polaroid-card {
            background: #ffffff;
            box-shadow: 0 12px 30px -5px rgba(159, 18, 57, 0.12), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }
        .polaroid-card:hover {
            transform: translateY(-8px) scale(1.02) rotate(0deg) !important;
            box-shadow: 0 22px 40px -8px rgba(225, 29, 72, 0.22);
            z-index: 25;
        }

        /* Washi Tape Effect */
        .washi-tape {
            position: absolute;
            top: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 22px;
            background: rgba(254, 205, 214, 0.75);
            border-left: 2px dashed rgba(225, 29, 72, 0.2);
            border-right: 2px dashed rgba(225, 29, 72, 0.2);
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            z-index: 10;
        }

        /* Voucher / Coupon Perforation */
        .coupon-box {
            position: relative;
            background: #ffffff;
            box-shadow: 0 10px 25px -5px rgba(159, 18, 57, 0.08);
        }
        .coupon-box::before, .coupon-box::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 18px;
            height: 18px;
            background-color: #fff1f5;
            border-radius: 50%;
            transform: translateY(-50%);
        }
        .coupon-box::before { left: -9px; }
        .coupon-box::after { right: -9px; }

        /* 3D Envelope Styles for Sub-Tampilan (Fully Responsive for Mobile) */
        .envelope-stage {
            perspective: 1500px;
            cursor: pointer;
            transform: scale(0.85);
            transform-origin: center center;
        }
        @media (min-width: 400px) {
            .envelope-stage {
                transform: scale(0.95);
            }
        }
        @media (min-width: 640px) {
            .envelope-stage {
                transform: scale(1);
            }
        }

        .envelope {
            width: 300px;
            height: 210px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s ease;
        }
        @media (min-width: 640px) {
            .envelope {
                width: 380px;
                height: 260px;
            }
        }
        .back-flap {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 25px 50px -12px rgba(190, 18, 60, 0.25);
        }
        .front-flap {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border-left: 150px solid transparent;
            border-right: 150px solid transparent;
            border-bottom: 130px solid #ffe4ec;
            border-radius: 0 0 8px 8px;
            z-index: 20;
            filter: drop-shadow(0 -2px 5px rgba(0, 0, 0, 0.04));
        }
        @media (min-width: 640px) {
            .front-flap {
                border-left-width: 190px;
                border-right-width: 190px;
                border-bottom-width: 165px;
            }
        }
        .top-flap {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            border-left: 150px solid transparent;
            border-right: 150px solid transparent;
            border-top: 130px solid #ffffff;
            z-index: 30;
            transform-origin: top;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1), z-index 0.2s;
            filter: drop-shadow(0 4px 6px rgba(0, 0, 0, 0.06));
        }
        @media (min-width: 640px) {
            .top-flap {
                border-left-width: 190px;
                border-right-width: 190px;
                border-top-width: 165px;
            }
        }
        .letter-preview {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            height: 88%;
            background: #faf8f5;
            z-index: 10;
            transition: transform 0.8s ease;
            box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }
        .seal {
            position: absolute;
            top: 95px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            background: radial-gradient(circle, #e11d48 0%, #9f1239 100%);
            border-radius: 50%;
            z-index: 40;
            box-shadow: 0 6px 14px rgba(159, 18, 57, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 22px;
            transition: opacity 0.4s, transform 0.3s;
            border: 2px solid #fda4b8;
        }
        @media (min-width: 640px) {
            .seal {
                top: 110px;
                width: 54px;
                height: 54px;
                font-size: 24px;
            }
        }
        .seal:hover {
            transform: translateX(-50%) scale(1.1);
        }
        .is-open .top-flap {
            transform: rotateX(180deg);
            z-index: 5;
        }
        .is-open .seal {
            opacity: 0;
            pointer-events: none;
        }
        .is-open .letter-preview {
            transform: translateX(-50%) translateY(-150px);
            z-index: 15;
            transition-delay: 0.3s;
        }
        @media (min-width: 640px) {
            .is-open .letter-preview {
                transform: translateX(-50%) translateY(-170px);
            }
        }

        /* Floating Click Heart Effect */
        .click-heart {
            position: fixed;
            pointer-events: none;
            z-index: 9999;
            animation: floatUpFade 1.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        @keyframes floatUpFade {
            0% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(0.6) rotate(0deg);
            }
            50% {
                transform: translate(-50%, -90px) scale(1.3) rotate(-15deg);
            }
            100% {
                opacity: 0;
                transform: translate(-50%, -150px) scale(1.5) rotate(15deg);
            }
        }

        /* Scratch Card Canvas */
        #scratchCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            border-radius: 1rem;
            z-index: 10;
            touch-action: none;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body x-data="romanticApp()" x-init="initApp()" @click="spawnClickHeart($event)"
    class="min-h-screen text-slate-800 font-sans antialiased relative selection:bg-romantic-200">

    <!-- AUDIO ELEMENT -->
    <audio x-ref="bgAudio" loop preload="auto" :src="playlist[currentSongIndex].url">
    </audio>

    <!-- FLOATING MUSIC CONTROLLER BAR (RESPONSIVE FOR MOBILE & DESKTOP) -->
    <div class="fixed bottom-4 right-4 sm:bottom-6 sm:right-6 z-40 transition-all duration-300 max-w-[calc(100vw-2rem)]">
        <div class="glass-panel-dark px-2.5 py-1.5 sm:px-4 sm:py-2.5 rounded-full shadow-xl flex items-center gap-2 sm:gap-3 border border-romantic-300 hover:shadow-romantic-500/20 transition-all">
            <!-- Prev Track Button -->
            <button @click.stop="playPrevSong()" class="text-slate-400 hover:text-romantic-600 active:scale-90 transition-all text-xs sm:text-sm p-1" title="Lagu Sebelumnya">
                ⏮
            </button>

            <!-- Vinyl Disc Button -->
            <button @click="toggleMusic()" class="relative flex-shrink-0 flex items-center justify-center focus:outline-none group" title="Putar / Jeda Musik">
                <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-full bg-slate-900 flex items-center justify-center shadow-md border-2 border-rose-200"
                    :class="isPlaying ? 'animate-spin-slow' : ''">
                    <div class="w-3 h-3 sm:w-3.5 sm:h-3.5 rounded-full bg-romantic-500 border border-white"></div>
                </div>
                <div class="absolute inset-0 flex items-center justify-center text-white text-xs opacity-0 group-hover:opacity-100 transition-opacity bg-black/40 rounded-full">
                    <span x-text="isPlaying ? '❚❚' : '▶'"></span>
                </div>
            </button>

            <!-- Song Info & Wave -->
            <div class="cursor-pointer select-none truncate max-w-[110px] sm:max-w-[170px]" @click="toggleMusic()">
                <div class="flex items-center gap-1 sm:gap-2">
                    <p class="text-[11px] sm:text-xs font-semibold text-slate-800 leading-tight truncate" x-text="playlist[currentSongIndex].title"></p>
                    <span class="hidden sm:inline-block text-[9px] font-medium text-romantic-600 bg-romantic-100 px-1.5 py-0.5 rounded-full" x-text="(currentSongIndex + 1) + '/' + playlist.length"></span>
                </div>
                <p class="text-[10px] sm:text-[11px] text-slate-500 truncate" x-text="playlist[currentSongIndex].artist"></p>
            </div>

            <!-- Next Track Button -->
            <button @click.stop="playNextSong()" class="text-slate-400 hover:text-romantic-600 active:scale-90 transition-all text-xs sm:text-sm p-1" title="Lagu Selanjutnya">
                ⏭
            </button>

            <!-- Animated Equalizer Sound Bars -->
            <div class="flex items-end gap-0.5 h-3.5 sm:h-4 px-1 flex-shrink-0" x-show="isPlaying">
                <span class="w-0.5 sm:w-1 bg-romantic-500 rounded-full animate-bounce-soft" style="height: 12px; animation-delay: 0.1s;"></span>
                <span class="w-0.5 sm:w-1 bg-romantic-500 rounded-full animate-bounce-soft" style="height: 16px; animation-delay: 0.3s;"></span>
                <span class="w-0.5 sm:w-1 bg-romantic-500 rounded-full animate-bounce-soft" style="height: 9px; animation-delay: 0.2s;"></span>
                <span class="w-0.5 sm:w-1 bg-romantic-500 rounded-full animate-bounce-soft" style="height: 14px; animation-delay: 0.4s;"></span>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR (MOBILE RESPONSIVE) -->
    <header class="sticky top-2 sm:top-4 z-30 max-w-5xl mx-auto px-3 sm:px-4">
        <nav class="glass-panel px-4 py-2.5 sm:px-6 sm:py-3.5 rounded-full shadow-lg flex items-center justify-between border border-white/80">
            <!-- Couple Name / Logo -->
            <a href="#" class="flex items-center gap-1.5 sm:gap-2 group">
                <span class="text-romantic-600 text-lg sm:text-xl group-hover:scale-125 transition-transform duration-300">🌸</span>
                <span class="font-serif font-bold text-base sm:text-lg text-slate-800 tracking-tight">
                    {{ $sender }} <span class="text-romantic-500 font-script text-lg sm:text-xl">&</span> {{ $nickname }}
                </span>
            </a>

            <!-- Quick Desktop Links -->
            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-slate-600">
                <a href="#openwhen" class="hover:text-romantic-600 transition-colors">Buka Saat...</a>
                <a href="#gallery" class="hover:text-romantic-600 transition-colors">Foto Kenangan</a>
                <a href="#littlethings" class="hover:text-romantic-600 transition-colors">Hal Kecilmu</a>
                <a href="#coupons" class="hover:text-romantic-600 transition-colors">Kupon Cinta</a>
            </div>

            <!-- Action Button: Open Sub-View -->
            <button @click="openLetterSubView()"
                class="bg-gradient-to-r from-romantic-500 to-rose-600 hover:from-romantic-600 hover:to-rose-700 text-white text-[11px] sm:text-xs md:text-sm font-semibold px-3 py-1.5 sm:px-4 sm:py-2 rounded-full shadow-md shadow-romantic-500/30 hover:shadow-romantic-600/40 hover:scale-105 active:scale-95 transition-all flex items-center gap-1.5">
                <span>💌</span>
                <span>Surat Cinta</span>
            </button>
        </nav>
    </header>

    <!-- HERO SECTION (MOBILE & DESKTOP ADAPTIVE) -->
    <section class="relative pt-8 pb-16 sm:pt-16 sm:pb-24 md:pt-20 md:pb-28 px-4 overflow-hidden">
        <!-- Ambient Glow Orbs -->
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-72 sm:w-96 h-72 sm:h-96 bg-romantic-300/30 rounded-full blur-3xl pointer-events-none -z-10"></div>
        <div class="absolute top-10 left-10 w-48 sm:w-72 h-48 sm:h-72 bg-rose-200/40 rounded-full blur-2xl pointer-events-none -z-10 animate-float-slow"></div>

        <div class="max-w-4xl mx-auto text-center relative z-10">
            <!-- Sweet Tag -->
            <div class="inline-flex items-center gap-1.5 sm:gap-2 px-3.5 py-1 sm:px-4 sm:py-1.5 rounded-full bg-white/80 border border-romantic-200 shadow-sm mb-5 sm:mb-6 animate-pulse-glow">
                <span class="w-1.5 h-1.5 sm:w-2 sm:h-2 rounded-full bg-romantic-500 animate-ping"></span>
                <span class="text-[10px] sm:text-xs font-semibold text-romantic-700 tracking-wider uppercase font-sans">
                    A Safe Little Corner For Lia
                </span>
            </div>

            <!-- Big Majestic Editorial Headline -->
            <h1 class="font-serif text-3xl sm:text-5xl md:text-7xl font-bold text-slate-900 tracking-tight leading-[1.2] sm:leading-[1.15] mb-4 sm:mb-6 px-2">
                Untuk Seseorang yang Paling Berharga,
                <span class="block mt-1 sm:mt-2 font-script text-romantic-600 text-5xl sm:text-7xl md:text-8xl font-normal drop-shadow-sm">
                    {{ $recipient }}
                </span>
            </h1>

            <!-- Subtitle -->
            <p class="text-slate-600 font-cormorant text-lg sm:text-xl md:text-2xl italic max-w-2xl mx-auto leading-relaxed mb-8 sm:mb-10 px-3">
                "Setiap hari bersamamu adalah berkah terbaik. Ruang kecil ini dibuat khusus untuk merayakan setiap senyuman, cerita, dan kebersamaan kita."
            </p>

            <!-- CTA Action Buttons -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 px-4 max-w-md mx-auto sm:max-w-none">
                <button @click="openLetterSubView()"
                    class="w-full sm:w-auto bg-romantic-600 hover:bg-romantic-700 text-white font-medium px-6 py-3 sm:px-8 sm:py-3.5 rounded-full shadow-xl shadow-romantic-600/30 hover:shadow-romantic-600/50 hover:-translate-y-0.5 active:translate-y-0 transition-all flex items-center justify-center gap-2.5 text-sm sm:text-base group">
                    <span>💌</span>
                    <span>Buka Amplop Surat Spesial</span>
                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                </button>

                <a href="#openwhen"
                    class="w-full sm:w-auto bg-white/90 hover:bg-white text-slate-700 hover:text-romantic-600 font-medium px-6 py-3 sm:px-7 sm:py-3.5 rounded-full shadow-md border border-romantic-200 hover:border-romantic-300 transition-all flex items-center justify-center gap-2 text-sm sm:text-base">
                    <span>🧸</span>
                    <span>Kapsul Emosi & Mood</span>
                </a>
            </div>

            <!-- LIVE LOVE COUNTER WIDGET (ADAPTIVE MOBILE GRID) -->
            <div class="mt-12 sm:mt-16 max-w-3xl mx-auto">
                <div class="glass-panel p-4 sm:p-8 rounded-2xl sm:rounded-3xl shadow-xl border border-white/90">
                    <div class="flex items-center justify-center gap-1.5 sm:gap-2 text-romantic-600 text-[11px] sm:text-xs uppercase tracking-widest font-semibold mb-3 sm:mb-4">
                        <span>⏳</span>
                        <span>Waktu Indah yang Sudah Kita Lalui Bersama</span>
                    </div>

                    <div class="grid grid-cols-4 gap-2 sm:gap-4">
                        <div class="bg-white/80 p-2.5 sm:p-4 rounded-xl sm:rounded-2xl shadow-sm border border-romantic-100">
                            <span class="block text-xl sm:text-3xl md:text-4xl font-serif font-bold text-romantic-600" x-text="loveTime.days">0</span>
                            <span class="text-[10px] sm:text-xs text-slate-500 font-medium uppercase tracking-wider">Hari</span>
                        </div>
                        <div class="bg-white/80 p-2.5 sm:p-4 rounded-xl sm:rounded-2xl shadow-sm border border-romantic-100">
                            <span class="block text-xl sm:text-3xl md:text-4xl font-serif font-bold text-romantic-600" x-text="loveTime.hours">0</span>
                            <span class="text-[10px] sm:text-xs text-slate-500 font-medium uppercase tracking-wider">Jam</span>
                        </div>
                        <div class="bg-white/80 p-2.5 sm:p-4 rounded-xl sm:rounded-2xl shadow-sm border border-romantic-100">
                            <span class="block text-xl sm:text-3xl md:text-4xl font-serif font-bold text-romantic-600" x-text="loveTime.minutes">0</span>
                            <span class="text-[10px] sm:text-xs text-slate-500 font-medium uppercase tracking-wider">Menit</span>
                        </div>
                        <div class="bg-white/80 p-2.5 sm:p-4 rounded-xl sm:rounded-2xl shadow-sm border border-romantic-100">
                            <span class="block text-xl sm:text-3xl md:text-4xl font-serif font-bold text-romantic-600" x-text="loveTime.seconds">0</span>
                            <span class="text-[10px] sm:text-xs text-slate-500 font-medium uppercase tracking-wider">Detik</span>
                        </div>
                    </div>

                    <p class="text-center text-xs text-slate-400 mt-3 sm:mt-4 italic font-cormorant text-sm sm:text-base">
                        ...dan rasa sayang ini akan terus bertambah di setiap detiknya. 🤍
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECTION 1: "BUKA KETIKA..." (OPEN WHEN MOOD CAPSULES) -->
    <section id="openwhen" class="py-12 sm:py-20 md:py-24 px-4 relative">
        <div class="max-w-5xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-8 sm:mb-12">
                <span class="text-[10px] sm:text-xs font-bold text-romantic-600 tracking-widest uppercase bg-romantic-100 px-3 py-1 rounded-full">
                    Emergency Mood Support
                </span>
                <h2 class="font-serif text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 mt-2.5 sm:mt-3 mb-2 sm:mb-3">
                    Kapsul "Buka Saat..."
                </h2>
                <p class="text-slate-600 text-xs sm:text-sm md:text-base">
                    Pilih apa yang lagi kamu rasakan sekarang, ada pesan hangat dari Farhan khusus untukmu:
                </p>
            </div>

            <!-- Mood Buttons Grid (Responsive 2 Cols on Mobile) -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5">
                @foreach ($open_when as $capsule)
                    <div @click="openMoodModal(@json($capsule))"
                        class="glass-panel p-4 sm:p-6 rounded-2xl cursor-pointer hover:border-romantic-300 hover:shadow-xl hover:shadow-romantic-500/15 active:scale-95 transition-all duration-300 text-center group flex flex-col justify-between">
                        
                        <div>
                            <div class="w-12 h-12 sm:w-14 sm:h-14 mx-auto rounded-2xl bg-romantic-100 text-romantic-600 flex items-center justify-center text-2xl sm:text-3xl mb-3 sm:mb-4 group-hover:scale-110 group-hover:bg-romantic-600 group-hover:text-white transition-all duration-300 shadow-sm">
                                {{ $capsule['icon'] }}
                            </div>

                            <span class="text-[9px] sm:text-[11px] font-bold text-romantic-600 uppercase tracking-wider block mb-1">
                                {{ $capsule['tag'] }}
                            </span>

                            <h3 class="font-serif font-bold text-sm sm:text-lg text-slate-900 group-hover:text-romantic-600 transition-colors leading-snug">
                                {{ $capsule['mood'] }}
                            </h3>
                        </div>

                        <span class="mt-3 sm:mt-4 inline-flex items-center justify-center text-[10px] sm:text-xs font-semibold text-romantic-500 group-hover:translate-x-1 transition-transform">
                            Baca pesan →
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION 2: POLAROID SCRAPBOOK MEMORY GALLERY -->
    <section id="gallery" class="py-12 sm:py-20 md:py-24 px-4 bg-gradient-to-b from-transparent via-white/50 to-transparent relative">
        <div class="max-w-6xl mx-auto">
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-14">
                <span class="text-[10px] sm:text-xs font-bold text-romantic-600 tracking-widest uppercase bg-romantic-100 px-3 py-1 rounded-full">
                    Our Scrapbook
                </span>
                <h2 class="font-serif text-2xl sm:text-4xl md:text-5xl font-bold text-slate-900 mt-2.5 sm:mt-3 mb-3 sm:mb-4">
                    Galeri Kenangan Manis
                </h2>
                <p class="text-slate-600 font-cormorant text-base sm:text-lg md:text-xl italic">
                    Setiap jepretan foto adalah bukti betapa berharganya setiap detik yang kita habiskan berdua.
                </p>
            </div>

            <!-- Polaroid Grid with Washi Tape -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-10">
                @foreach ($photos as $index => $photo)
                    @php
                        $rotations = ['-rotate-1 sm:-rotate-2', 'rotate-1', '-rotate-1', 'rotate-1 sm:rotate-2', '-rotate-2 sm:-rotate-3', 'rotate-2 sm:rotate-3', '-rotate-1'];
                        $rotation = $rotations[$index % count($rotations)];
                    @endphp
                    <div class="polaroid-card p-3 sm:p-4 rounded-xl {{ $rotation }} cursor-pointer group"
                        @click="openLightbox('{{ $photo['url'] }}', '{{ addslashes($photo['caption']) }}', '{{ $photo['tag'] }}')">
                        
                        <!-- Washi Tape Decor -->
                        <div class="washi-tape"></div>

                        <!-- Photo Frame -->
                        <div class="relative w-full aspect-[4/5] bg-slate-100 rounded-lg overflow-hidden mb-3 sm:mb-4 shadow-inner mt-2">
                            <img src="{{ $photo['url'] }}" alt="{{ $photo['tag'] }}"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out"
                                loading="lazy">
                            
                            <!-- Tag Badge -->
                            <div class="absolute top-2.5 left-2.5 sm:top-3 sm:left-3 bg-black/50 backdrop-blur-md text-white text-[9px] sm:text-[10px] uppercase font-bold tracking-wider px-2 py-0.5 sm:px-2.5 sm:py-1 rounded-full">
                                {{ $photo['tag'] }}
                            </div>

                            <div class="absolute inset-0 bg-romantic-900/15 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center text-white">
                                <span class="bg-white/90 text-romantic-700 text-[11px] sm:text-xs font-semibold px-3 py-1.5 rounded-full shadow-lg backdrop-blur-sm">
                                    🔍 Klik untuk Zoom
                                </span>
                            </div>
                        </div>

                        <!-- Handwritten Caption -->
                        <div class="px-1.5 pt-0.5 pb-1 sm:px-2 sm:pt-1 sm:pb-2">
                            <p class="font-handwriting text-xl sm:text-2xl text-slate-800 leading-snug">
                                "{{ $photo['caption'] }}"
                            </p>
                            <span class="block text-[10px] sm:text-[11px] text-slate-400 font-sans mt-1">
                                📅 {{ $photo['date'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION 3: HAL-HAL KECIL TENTANG KAMU (AUTHENTIC DETAILS) -->
    <section id="littlethings" class="py-12 sm:py-20 md:py-24 px-4 relative">
        <div class="max-w-5xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-14">
                <span class="text-[10px] sm:text-xs font-bold text-romantic-600 tracking-widest uppercase bg-romantic-100 px-3 py-1 rounded-full">
                    The Little Things I Cherish
                </span>
                <h2 class="font-serif text-2xl sm:text-4xl md:text-5xl font-bold text-slate-900 mt-2.5 sm:mt-3 mb-3 sm:mb-4">
                    Hal-Hal Kecil Tentang Kamu yang Selalu Ku Ingat
                </h2>
                <p class="text-slate-600 font-cormorant text-base sm:text-lg md:text-xl italic">
                    Bukan cuma hal-hal besar, tapi detail-detail sederhana darimu inilah yang selalu bikin aku jatuh cinta lagi dan lagi.
                </p>
            </div>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach ($little_things as $item)
                    <div class="glass-panel p-5 sm:p-6 rounded-2xl border border-white hover:border-romantic-300 hover:shadow-xl hover:shadow-romantic-500/10 transition-all duration-300 group">
                        <div class="text-2xl sm:text-3xl mb-3 sm:mb-4 group-hover:scale-110 transition-transform inline-block">
                            {{ $item['icon'] }}
                        </div>
                        <h3 class="font-serif font-bold text-lg sm:text-xl text-slate-900 mb-1.5 sm:mb-2 group-hover:text-romantic-600 transition-colors">
                            {{ $item['title'] }}
                        </h3>
                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION 4: KUPON KASIH SAYANG (INTERACTIVE REDEEMABLE VOUCHERS) -->
    <section id="coupons" class="py-12 sm:py-20 md:py-24 px-4 bg-white/60 relative">
        <div class="max-w-5xl mx-auto">
            <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-14">
                <span class="text-[10px] sm:text-xs font-bold text-romantic-600 tracking-widest uppercase bg-romantic-100 px-3 py-1 rounded-full">
                    Special Treat For Lia
                </span>
                <h2 class="font-serif text-2xl sm:text-3xl md:text-4xl font-bold text-slate-900 mt-2.5 sm:mt-3 mb-2 sm:mb-3">
                    Kupon Kasih Sayang (Bisa Diklaim Kapan Aja!)
                </h2>
                <p class="text-slate-600 text-xs sm:text-sm md:text-base">
                    Kupon ini berlaku selamanya tanpa tanggal kedaluwarsa. Klik tombol klaim untuk kirim voucher langsung ke Farhan via WhatsApp! 📲
                </p>
            </div>

            <!-- Coupons Grid (1 col on mobile, 2 col on tablet+) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                @foreach ($coupons as $coupon)
                    <div class="coupon-box p-5 sm:p-6 rounded-2xl border border-romantic-200 overflow-hidden flex flex-col justify-between hover:shadow-xl hover:shadow-romantic-500/10 transition-all">
                        <div>
                            <div class="flex items-center justify-between gap-2 border-b border-dashed border-rose-200 pb-2.5 sm:pb-3 mb-3 sm:mb-4">
                                <span class="text-[11px] sm:text-xs font-mono font-bold text-rose-500 tracking-wider">
                                    {{ $coupon['code'] }}
                                </span>
                                <span class="text-xl sm:text-2xl">{{ $coupon['icon'] }}</span>
                            </div>

                            <h3 class="font-serif font-bold text-lg sm:text-xl text-slate-900 mb-1.5 sm:mb-2">
                                {{ $coupon['title'] }}
                            </h3>

                            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mb-4 sm:mb-6">
                                {{ $coupon['desc'] }}
                            </p>
                        </div>

                        <!-- Claim via WhatsApp -->
                        <div class="pt-3 sm:pt-4 border-t border-rose-100 flex items-center justify-between">
                            <span class="text-[10px] sm:text-[11px] text-slate-400 uppercase font-semibold">100% Free for Lia</span>
                            <a href="https://wa.me/{{ $phone_number }}?text={{ urlencode($coupon['wa_msg']) }}" target="_blank"
                                @click="celebrateClaim()"
                                class="bg-gradient-to-r from-romantic-500 to-rose-600 hover:from-romantic-600 hover:to-rose-700 active:scale-95 text-white text-[11px] sm:text-xs font-semibold px-3.5 py-2 sm:px-4 sm:py-2.5 rounded-full shadow-md transition-all flex items-center gap-1.5">
                                <span>📲 Klaim ke Farhan</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- SECTION 5: SECRET SCRATCH-OFF LOVE NOTE (MOBILE TOUCH OPTIMIZED) -->
    <section class="py-12 sm:py-16 px-4">
        <div class="max-w-xl mx-auto">
            <div class="glass-panel p-5 sm:p-8 rounded-2xl sm:rounded-3xl shadow-xl text-center border border-white">
                <span class="text-[10px] sm:text-xs font-bold text-romantic-600 tracking-widest uppercase bg-romantic-100 px-3 py-1 rounded-full">
                    Secret Message
                </span>
                <h3 class="font-serif font-bold text-xl sm:text-2xl text-slate-900 mt-2.5 sm:mt-3 mb-1.5 sm:mb-2">
                    Kartu Gosok Pesan Rahasia 🪄
                </h3>
                <p class="text-[11px] sm:text-xs text-slate-500 mb-4 sm:mb-6">
                    Usap / gosok kotak emas di bawah ini pakai jarimu untuk membaca pesan tersembunyi!
                </p>

                <!-- Scratch Card Area -->
                <div class="relative w-full h-40 sm:h-44 bg-rose-50 rounded-2xl border-2 border-dashed border-romantic-300 flex items-center justify-center p-4 sm:p-6 select-none overflow-hidden">
                    <!-- Secret Hidden Note Text -->
                    <p class="font-handwriting text-xl sm:text-2xl text-slate-800 leading-relaxed px-2">
                        {{ $secret_note }}
                    </p>

                    <!-- Interactive Canvas Overlay -->
                    <canvas id="scratchCanvas"></canvas>
                </div>
            </div>
        </div>
    </section>

    <!-- SUB-TAMPILAN PROMINENT BANNER / CTA CARD -->
    <section class="py-12 sm:py-16 px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-r from-romantic-600 via-rose-600 to-romantic-700 text-white p-6 sm:p-12 rounded-3xl shadow-2xl relative overflow-hidden text-center">
                <!-- Decorative Glows -->
                <div class="absolute -top-20 -right-20 w-60 h-60 bg-white/10 rounded-full blur-xl pointer-events-none"></div>
                <div class="absolute -bottom-20 -left-20 w-60 h-60 bg-black/10 rounded-full blur-xl pointer-events-none"></div>

                <span class="text-[10px] sm:text-xs uppercase tracking-widest bg-white/20 px-3 py-1 rounded-full font-semibold">
                    Sub-Tampilan Surat Spesial
                </span>

                <h2 class="font-serif text-2xl sm:text-4xl md:text-5xl font-bold mt-3 sm:mt-4 mb-3 sm:mb-4">
                    Ada Surat Amplop 3D Dari Farhan
                </h2>

                <p class="font-cormorant text-lg sm:text-2xl italic text-rose-100 max-w-xl mx-auto mb-6 sm:mb-8">
                    "Buka amplop berstempel lilin ini untuk membaca rangkuman isi hati dan memutar kenangan kita."
                </p>

                <button @click="openLetterSubView()"
                    class="bg-white text-romantic-700 hover:bg-rose-50 font-bold px-6 py-3.5 sm:px-8 sm:py-4 rounded-full shadow-lg hover:shadow-2xl hover:scale-105 active:scale-95 transition-all text-sm sm:text-base inline-flex items-center gap-2.5">
                    <span>💌 Buka Sub-Tampilan Surat Cinta</span>
                </button>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="py-10 sm:py-12 border-t border-romantic-200 text-center text-slate-500 text-xs sm:text-sm">
        <div class="max-w-4xl mx-auto px-4 space-y-3">
            <p class="font-serif text-base sm:text-lg text-slate-700 font-medium">
                Made with all my heart for <span class="text-romantic-600 font-script text-xl sm:text-2xl font-normal">{{ $recipient }}</span>
            </p>
            <div class="flex items-center justify-center gap-4 text-[11px] sm:text-xs text-slate-400">
                <span>Forever & Always • {{ $sender }} &copy; {{ date('Y') }}</span>
                <span>•</span>
                <a href="{{ route('admin.index') }}" class="inline-flex items-center gap-1 text-romantic-500 hover:text-romantic-700 hover:underline font-medium">
                    <span>⚙️</span>
                    <span>Love Studio</span>
                </a>
            </div>
        </div>
    </footer>


    <!-- ========================================================================= -->
    <!-- MODAL 1: "OPEN WHEN" MOOD CAPSULE POPUP (MOBILE ADAPTIVE)                 -->
    <!-- ========================================================================= -->
    <div x-cloak x-show="isMoodModalOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        @click.self="closeMoodModal()"
        class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
        
        <div class="max-w-md w-full bg-paper p-5 sm:p-8 rounded-3xl shadow-2xl border border-white text-center relative overflow-hidden max-h-[90dvh] overflow-y-auto">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-romantic-300 via-rose-500 to-romantic-300"></div>

            <button @click="closeMoodModal()" class="absolute top-3 right-3 sm:top-4 sm:right-4 text-slate-400 hover:text-slate-700 text-xl p-1">
                ✕
            </button>

            <span class="text-3xl sm:text-4xl block mb-2 sm:mb-3" x-text="activeMood.icon"></span>
            <span class="text-[10px] sm:text-xs font-bold text-romantic-600 uppercase tracking-widest block mb-1" x-text="activeMood.tag"></span>
            <h3 class="font-serif font-bold text-xl sm:text-2xl text-slate-900 mb-3 sm:mb-4" x-text="activeMood.mood"></h3>

            <div class="bg-white/80 p-4 sm:p-5 rounded-2xl border border-rose-100 mb-5 sm:mb-6 text-left">
                <p class="font-serif text-sm sm:text-base italic text-slate-700 leading-relaxed" x-text="activeMood.quote"></p>
                <div class="mt-3 pt-2.5 sm:mt-4 sm:pt-3 border-t border-rose-50 flex items-start sm:items-center gap-2 text-xs text-romantic-600 font-semibold">
                    <span>💡</span>
                    <span x-text="activeMood.action"></span>
                </div>
            </div>

            <button @click="closeMoodModal()"
                class="w-full bg-romantic-600 hover:bg-romantic-700 active:scale-95 text-white font-semibold py-2.5 sm:py-3 rounded-full shadow-md transition-all text-xs sm:text-sm">
                Peluk Virtual & Tutup 💕
            </button>
        </div>
    </div>


    <!-- ========================================================================= -->
    <!-- SUB-TAMPILAN: INTERACTIVE 3D LOVE LETTER & SLIDESHOW (MOBILE ADAPTIVE)    -->
    <!-- ========================================================================= -->
    <div x-cloak x-show="isLetterModalOpen" 
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-400"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 overflow-y-auto overflow-x-hidden bg-slate-950/85 backdrop-blur-md flex flex-col justify-center items-center p-3 sm:p-4">

        <!-- Top Close Bar -->
        <div class="fixed top-3 right-3 sm:top-6 sm:right-6 z-50 flex items-center gap-2">
            <button @click="closeLetterSubView()"
                class="bg-white/20 hover:bg-white/30 active:scale-95 text-white backdrop-blur-md px-3 py-1.5 sm:px-4 sm:py-2 rounded-full text-[11px] sm:text-xs font-semibold flex items-center gap-1.5 transition-all border border-white/30 shadow-lg">
                <span>✕</span>
                <span>Kembali ke Beranda</span>
            </button>
        </div>

        <!-- ENVELOPE STAGE (BEFORE OPENING) -->
        <div x-show="!isEnvelopeOpened" 
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-125"
            class="flex flex-col items-center justify-center my-auto py-8 sm:py-12 text-center w-full">
            
            <div class="mb-6 sm:mb-8 space-y-1 sm:space-y-2 px-2">
                <span class="text-[10px] sm:text-[11px] font-sans tracking-[0.4em] text-rose-300 uppercase font-semibold">Special Delivery</span>
                <h2 class="font-serif text-3xl sm:text-5xl text-white font-bold tracking-wide">{{ $recipient }}</h2>
                <p class="text-rose-200/80 font-cormorant text-base sm:text-lg italic">Sent with infinite love by {{ $sender }}</p>
            </div>

            <!-- 3D Envelope Component -->
            <div class="envelope-stage" :class="{ 'is-open': isEnvelopeAnimating }" @click="triggerOpenEnvelope()">
                <div class="envelope">
                    <div class="back-flap"></div>
                    <div class="letter-preview">
                        <p class="font-script text-2xl sm:text-4xl text-romantic-600">For You</p>
                    </div>
                    <div class="front-flap"></div>
                    <div class="top-flap"></div>
                    <div class="seal">❤</div>
                </div>
            </div>

            <p class="text-rose-300 text-[11px] sm:text-xs tracking-widest uppercase mt-6 sm:mt-8 animate-pulse font-semibold">
                ✨ Ketuk Segel Amplop Untuk Membuka ✨
            </p>
        </div>

        <!-- LETTER CONTENT & SLIDESHOW (AFTER OPENING) -->
        <div x-show="isEnvelopeOpened" 
            x-transition:enter="transition ease-out duration-800"
            x-transition:enter-start="opacity-0 translate-y-12 scale-95"
            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
            class="max-w-md w-full my-auto py-4 sm:py-6">

            <div class="bg-paper p-5 sm:p-10 shadow-2xl rounded-2xl sm:rounded-3xl border border-white relative overflow-hidden text-center max-h-[85dvh] overflow-y-auto">
                <!-- Top Accent Ribbon -->
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-romantic-300 via-rose-500 to-romantic-300"></div>

                <!-- Header Title -->
                <div class="mb-4 sm:mb-6">
                    <h2 class="font-script text-4xl sm:text-6xl text-romantic-600 mb-1 leading-none">
                        To My Beloved, {{ $nickname }}
                    </h2>
                    <p class="font-sans text-[9px] sm:text-[10px] text-slate-400 tracking-[0.3em] uppercase border-b border-rose-100 pb-2 sm:pb-3 inline-block">
                        Forever & Always • Special Note
                    </p>
                </div>

                <!-- Rotating Photo Card -->
                <div class="relative w-full aspect-[4/5] bg-white shadow-md p-1.5 sm:p-2 rotate-1 hover:rotate-0 transition-transform duration-500 mx-auto mb-4 sm:mb-6 rounded-lg">
                    <div class="relative w-full h-full overflow-hidden bg-slate-100 rounded">
                        <template x-for="(photo, index) in photosList" :key="index">
                            <img :src="photo.url"
                                class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out"
                                :class="currentPhotoIndex === index ? 'opacity-100 scale-100' : 'opacity-0 scale-105'">
                        </template>
                    </div>
                </div>

                <!-- Slide Heartfelt Messages -->
                <div class="min-h-[90px] sm:min-h-[95px] relative flex items-center justify-center w-full mb-3 sm:mb-4 px-1">
                    <template x-for="(msg, index) in messagesList" :key="index">
                        <div x-show="currentMessageIndex === index"
                            x-transition:enter="transition ease-out duration-700"
                            x-transition:enter-start="opacity-0 translate-y-3"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-400"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 -translate-y-3" 
                            class="absolute w-full">
                            <p class="font-serif text-sm sm:text-base md:text-lg italic leading-relaxed text-slate-700">
                                "<span x-text="msg"></span>"
                            </p>
                        </div>
                    </template>
                </div>

                <!-- Slide Navigation Dots -->
                <div class="flex items-center justify-center gap-1.5 mb-4 sm:mb-6">
                    <template x-for="(msg, index) in messagesList" :key="index">
                        <button @click="currentMessageIndex = index" 
                            class="w-2 h-2 rounded-full transition-all"
                            :class="currentMessageIndex === index ? 'w-5 sm:w-6 bg-romantic-600' : 'bg-slate-300'"></button>
                    </template>
                </div>

                <!-- Signature -->
                <div class="pt-3 sm:pt-4 border-t border-rose-100">
                    <p class="font-sans text-[9px] sm:text-[10px] text-slate-400 uppercase tracking-widest mb-0.5">Forever Yours</p>
                    <p class="font-script text-2xl sm:text-3xl text-slate-900">{{ $sender }}</p>
                </div>

                <!-- Music Track Info -->
                <div class="mt-4 sm:mt-6 flex items-center justify-center gap-1.5 text-[9px] sm:text-[10px] text-romantic-400 uppercase tracking-wider">
                    <span>🎵</span>
                    <span x-text="playlist[currentSongIndex].artist + ' — ' + playlist[currentSongIndex].title"></span>
                </div>
            </div>
        </div>
    </div>


    <!-- ========================================================================= -->
    <!-- MODAL 3: LIGHTBOX (FOR ZOOMING GALLERY PHOTOS)                            -->
    <!-- ========================================================================= -->
    <div x-cloak x-show="isLightboxOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click.self="closeLightbox()"
        class="fixed inset-0 z-50 bg-black/90 backdrop-blur-md flex items-center justify-center p-3 sm:p-4">
        
        <button @click="closeLightbox()"
            class="absolute top-4 right-4 sm:top-6 sm:right-6 text-white text-2xl sm:text-3xl hover:text-rose-400 transition-colors focus:outline-none p-2">
            ✕
        </button>

        <div class="max-w-2xl w-full bg-white p-2.5 sm:p-3 rounded-2xl shadow-2xl overflow-hidden text-center max-h-[90dvh] flex flex-col">
            <img :src="lightboxImg" class="w-full max-h-[65vh] object-contain rounded-xl mx-auto" alt="Preview">
            <div class="p-3 sm:p-4">
                <span class="text-[10px] sm:text-xs font-bold text-romantic-600 uppercase tracking-widest" x-text="lightboxTag"></span>
                <p class="font-handwriting text-xl sm:text-3xl text-slate-800 mt-0.5 sm:mt-1" x-text="lightboxCaption"></p>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT APPLICATION LOGIC -->
    <script>
        function romanticApp() {
            return {
                // Audio & Playlist State
                isPlaying: false,
                playlist: @json($playlist),
                currentSongIndex: 0,
                
                // Sub-view Letter Modal State
                isLetterModalOpen: false,
                isEnvelopeAnimating: false,
                isEnvelopeOpened: false,

                // Mood Capsule Modal
                isMoodModalOpen: false,
                activeMood: {},

                // Gallery Lightbox State
                isLightboxOpen: false,
                lightboxImg: '',
                lightboxCaption: '',
                lightboxTag: '',

                // Data Passed from Backend
                startDate: '{{ $start_date }}',
                photosList: @json($photos),
                messagesList: @json($messages),

                // Slide indices
                currentPhotoIndex: 0,
                currentMessageIndex: 0,

                // Timer IDs
                photoInterval: null,
                msgInterval: null,

                // Live Love Time State
                loveTime: {
                    days: 0,
                    hours: 0,
                    minutes: 0,
                    seconds: 0
                },

                initApp() {
                    this.updateLoveCounter();
                    setInterval(() => this.updateLoveCounter(), 1000);

                    // Preload all photos
                    this.photosList.forEach(p => {
                        const img = new Image();
                        img.src = p.url;
                    });

                    // Init Scratch Card with Retina Support & Mobile Touch handling
                    this.$nextTick(() => {
                        this.initScratchCard();
                    });

                    window.addEventListener('resize', () => {
                        this.initScratchCard();
                    });
                },

                updateLoveCounter() {
                    const start = new Date(this.startDate).getTime();
                    const now = new Date().getTime();
                    const diff = Math.max(0, now - start);

                    this.loveTime.days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    this.loveTime.hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                    this.loveTime.minutes = Math.floor((diff / 1000 / 60) % 60);
                    this.loveTime.seconds = Math.floor((diff / 1000) % 60);
                },

                toggleMusic() {
                    const audio = this.$refs.bgAudio;
                    if (this.isPlaying) {
                        audio.pause();
                        this.isPlaying = false;
                    } else {
                        audio.volume = 0.5;
                        audio.play().then(() => {
                            this.isPlaying = true;
                        }).catch(e => console.log('Audio autoplay prevented:', e));
                    }
                },

                playNextSong() {
                    this.currentSongIndex = (this.currentSongIndex + 1) % this.playlist.length;
                    const audio = this.$refs.bgAudio;
                    this.$nextTick(() => {
                        audio.volume = 0.5;
                        audio.play().then(() => {
                            this.isPlaying = true;
                        }).catch(e => console.log('Audio play failed:', e));
                    });
                },

                playPrevSong() {
                    this.currentSongIndex = (this.currentSongIndex - 1 + this.playlist.length) % this.playlist.length;
                    const audio = this.$refs.bgAudio;
                    this.$nextTick(() => {
                        audio.volume = 0.5;
                        audio.play().then(() => {
                            this.isPlaying = true;
                        }).catch(e => console.log('Audio play failed:', e));
                    });
                },

                openLetterSubView() {
                    this.isLetterModalOpen = true;
                    if (!this.isPlaying) {
                        this.toggleMusic();
                    }
                },

                closeLetterSubView() {
                    this.isLetterModalOpen = false;
                    setTimeout(() => {
                        this.isEnvelopeAnimating = false;
                        this.isEnvelopeOpened = false;
                        clearInterval(this.photoInterval);
                        clearInterval(this.msgInterval);
                    }, 500);
                },

                triggerOpenEnvelope() {
                    if (this.isEnvelopeAnimating) return;
                    this.isEnvelopeAnimating = true;

                    if (typeof confetti === 'function') {
                        confetti({
                            particleCount: window.innerWidth < 640 ? 60 : 90,
                            spread: 75,
                            origin: { y: 0.6 },
                            colors: ['#f43f6e', '#e11d48', '#fecdd6', '#ffffff']
                        });
                    }

                    setTimeout(() => {
                        this.isEnvelopeOpened = true;
                        this.startSlideTimers();
                    }, 1200);
                },

                startSlideTimers() {
                    clearInterval(this.photoInterval);
                    clearInterval(this.msgInterval);

                    this.photoInterval = setInterval(() => {
                        this.currentPhotoIndex = (this.currentPhotoIndex + 1) % this.photosList.length;
                    }, 3500);

                    this.msgInterval = setInterval(() => {
                        this.currentMessageIndex = (this.currentMessageIndex + 1) % this.messagesList.length;
                    }, 5500);
                },

                openMoodModal(capsule) {
                    this.activeMood = capsule;
                    this.isMoodModalOpen = true;
                },

                closeMoodModal() {
                    this.isMoodModalOpen = false;
                },

                celebrateClaim() {
                    if (typeof confetti === 'function') {
                        confetti({
                            particleCount: 50,
                            spread: 60,
                            origin: { y: 0.7 },
                            colors: ['#fda4b8', '#f43f6e', '#fbbf24']
                        });
                    }
                },

                openLightbox(img, caption, tag) {
                    this.lightboxImg = img;
                    this.lightboxCaption = caption;
                    this.lightboxTag = tag;
                    this.isLightboxOpen = true;
                },

                closeLightbox() {
                    this.isLightboxOpen = false;
                },

                spawnClickHeart(event) {
                    const heart = document.createElement('div');
                    heart.className = 'click-heart';
                    const emojis = ['💖', '💕', '🌸', '✨', '🤍', '🌷'];
                    heart.innerText = emojis[Math.floor(Math.random() * emojis.length)];
                    heart.style.left = `${event.clientX}px`;
                    heart.style.top = `${event.clientY}px`;
                    heart.style.fontSize = `${Math.floor(Math.random() * 10 + 16)}px`;

                    document.body.appendChild(heart);
                    setTimeout(() => {
                        heart.remove();
                    }, 1200);
                },

                initScratchCard() {
                    const canvas = document.getElementById('scratchCanvas');
                    if (!canvas) return;
                    const ctx = canvas.getContext('2d');
                    
                    const dpr = window.devicePixelRatio || 1;
                    const rect = canvas.getBoundingClientRect();
                    
                    canvas.width = rect.width * dpr;
                    canvas.height = rect.height * dpr;
                    ctx.scale(dpr, dpr);

                    // Fill canvas with gold/rose metallic shimmer
                    const grad = ctx.createLinearGradient(0, 0, rect.width, rect.height);
                    grad.addColorStop(0, '#fda4b8');
                    grad.addColorStop(0.5, '#f43f6e');
                    grad.addColorStop(1, '#be123c');
                    ctx.fillStyle = grad;
                    ctx.fillRect(0, 0, rect.width, rect.height);

                    // Add text on scratch layer
                    ctx.fillStyle = '#ffffff';
                    const fontSize = rect.width < 350 ? '12px' : '14px';
                    ctx.font = `bold ${fontSize} Plus Jakarta Sans, sans-serif`;
                    ctx.textAlign = 'center';
                    ctx.fillText('✨ Gosok Di Sini Pakai Jarimu ✨', rect.width / 2, rect.height / 2 + 5);

                    let isDrawing = false;

                    function scratch(clientX, clientY) {
                        const r = canvas.getBoundingClientRect();
                        const x = clientX - r.left;
                        const y = clientY - r.top;
                        
                        ctx.globalCompositeOperation = 'destination-out';
                        ctx.beginPath();
                        ctx.arc(x, y, 20, 0, Math.PI * 2, false);
                        ctx.fill();
                    }

                    canvas.onmousedown = (e) => {
                        isDrawing = true;
                        scratch(e.clientX, e.clientY);
                    };

                    canvas.onmousemove = (e) => {
                        if (!isDrawing) return;
                        scratch(e.clientX, e.clientY);
                    };

                    window.onmouseup = () => { isDrawing = false; };

                    // Touch Events for Mobile
                    canvas.ontouchstart = (e) => {
                        isDrawing = true;
                        const touch = e.touches[0];
                        scratch(touch.clientX, touch.clientY);
                    };

                    canvas.ontouchmove = (e) => {
                        if (!isDrawing) return;
                        e.preventDefault(); // Prevent page scroll while scratching
                        const touch = e.touches[0];
                        scratch(touch.clientX, touch.clientY);
                    };

                    window.ontouchend = () => { isDrawing = false; };
                }
            }
        }
    </script>
</body>

</html>
