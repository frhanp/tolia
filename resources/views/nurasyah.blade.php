<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>To My Beloved, {{ $recipient }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,400&family=Montserrat:wght@200;300;400&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        serif: ['Cormorant Garamond', 'serif'],
                        script: ['Great Vibes', 'cursive'],
                        sans: ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        'soft-pink': '#fff0f5',
                        'paper': '#fdfbf7',
                        'rose-red': '#be123c',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Pakai dvh biar pas di iPhone */
        body {
            background-color: #fff0f5;
            background-image: radial-gradient(#fecdd3 1px, transparent 1px);
            background-size: 30px 30px;
            overflow: hidden;
            /* Mencegah scroll di halaman amplop */
            height: 100dvh;
            width: 100vw;
        }

        /* Amplop Wrapper */
        .envelope-stage {
            perspective: 1500px;
            cursor: pointer;
            /* Scale down dikit di HP biar gak mepet */
            transform: scale(0.9);
        }

        @media (min-width: 768px) {
            .envelope-stage {
                transform: scale(1);
            }
        }

        .envelope {
            width: 320px;
            height: 220px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.6s ease;
        }

        .back-flap {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .front-flap {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 0;
            border-left: 160px solid transparent;
            border-right: 160px solid transparent;
            border-bottom: 140px solid #fce7f3;
            border-radius: 0 0 5px 5px;
            z-index: 20;
            filter: drop-shadow(0 -2px 5px rgba(0, 0, 0, 0.05));
        }

        .top-flap {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            border-left: 160px solid transparent;
            border-right: 160px solid transparent;
            border-top: 140px solid #ffffff;
            z-index: 30;
            transform-origin: top;
            transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1), z-index 0.2s;
            filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.05));
        }

        .letter-preview {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            height: 90%;
            background: #fff;
            z-index: 10;
            transition: transform 0.8s ease;
            box-shadow: 0 -5px 10px rgba(0, 0, 0, 0.05);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .seal {
            position: absolute;
            top: 100px;
            left: 50%;
            transform: translateX(-50%);
            width: 45px;
            height: 45px;
            background: #be123c;
            border-radius: 50%;
            z-index: 40;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            transition: opacity 0.4s;
            border: 2px solid #9f1239;
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

        /* Floating Hearts */
        .hearts-bg div {
            position: fixed;
            color: #fb7185;
            font-size: 24px;
            animation: floatUp 12s linear infinite;
            z-index: -1;
            opacity: 0;
        }

        @keyframes floatUp {
            0% {
                transform: translateY(110vh) scale(0.5);
                opacity: 0;
            }

            20% {
                opacity: 0.6;
            }

            80% {
                opacity: 0.6;
            }

            100% {
                transform: translateY(-10vh) scale(1.2);
                opacity: 0;
            }
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body x-data="app()" x-init="init()"
    class="flex flex-col items-center justify-center min-h-[100dvh] text-slate-800 relative">

    <audio x-ref="bgMusic" loop>
        <source src="{{ $music_url }}" type="audio/mpeg">
    </audio>

    <div class="hearts-bg">
        <div style="left: 10%; animation-delay: 0s;">❤</div>
        <div style="left: 30%; animation-delay: 2s;">❤</div>
        <div style="left: 70%; animation-delay: 5s;">❤</div>
        <div style="left: 90%; animation-delay: 1s;">❤</div>
        <div style="left: 50%; animation-delay: 7s; font-size: 35px;">❤</div>
    </div>

    <div class="relative z-10 w-full flex flex-col items-center gap-6 transition-all duration-1000 ease-in-out px-4"
        :class="showFullContent ? 'opacity-0 scale-150 pointer-events-none' : 'opacity-100 scale-100'">

        <div class="text-center animate-float space-y-1">
            <p class="font-sans text-[10px] tracking-[0.4em] text-rose-400 uppercase">Special Delivery</p>
            <h1 class="font-serif text-4xl md:text-5xl text-slate-800 tracking-wide">{{ $recipient }}</h1>
        </div>

        <div class="envelope-stage" :class="{ 'is-open': isOpen }" @click="openEnvelope()">
            <div class="envelope">
                <div class="back-flap"></div>
                <div class="letter-preview">
                    <p class="font-script text-3xl text-rose-500">For You</p>
                </div>
                <div class="front-flap"></div>
                <div class="top-flap"></div>
                <div class="seal animate-pulse-slow">❤</div>
            </div>
        </div>

        <p class="text-rose-400 text-xs tracking-widest uppercase mt-4 animate-pulse" x-show="!isOpen">
            Tap to Open
        </p>
    </div>

    <div x-cloak x-show="showFullContent" x-transition:enter="transition ease-out duration-1000"
        x-transition:enter-start="opacity-0 translate-y-20" x-transition:enter-end="opacity-100 translate-y-0"
        class="fixed inset-0 z-50 overflow-y-auto overflow-x-hidden bg-white/90 backdrop-blur-md">

        <div class="min-h-[100dvh] flex items-center justify-center p-4 py-10">
            <div
                class="bg-paper max-w-md w-full p-6 md:p-12 shadow-2xl rounded-sm border border-white relative overflow-hidden my-auto">

                <div
                    class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-rose-200 via-rose-400 to-rose-200 opacity-50">
                </div>

                <div class="text-center">
                    <div class="mb-8">
                        <h2 class="font-script text-5xl md:text-6xl text-rose-500 mb-2 leading-none">
                            To My Beloved, Lia
                        </h2>
                        <p
                            class="font-sans text-[10px] text-slate-400 tracking-[0.3em] uppercase border-b border-rose-100 pb-4 inline-block">
                            Happy Valentine • February 14, 2026
                        </p>
                    </div>

                    <div
                        class="relative w-full aspect-[4/5] bg-white shadow-lg p-2 rotate-1 hover:rotate-0 transition-transform duration-500 mx-auto mb-8">
                        <div class="relative w-full h-full overflow-hidden bg-gray-50">
                            <template x-for="(photo, index) in photos" :key="index">
                                <img :src="photo"
                                    class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000 ease-in-out"
                                    :class="currentPhoto === index ? 'opacity-100' : 'opacity-0'">
                            </template>
                        </div>
                    </div>

                    <div class="h-32 md:h-28 relative flex items-center justify-center w-full mb-4">
                        <template x-for="(msg, index) in messages" :key="index">
                            <div x-show="currentMessage === index"
                                x-transition:enter="transition ease-out duration-1000"
                                x-transition:enter-start="opacity-0 translate-y-4"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-500"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-4" class="absolute w-full px-1">
                                <p class="font-serif text-lg md:text-xl italic leading-relaxed text-slate-700">
                                    "<span x-text="msg"></span>"
                                </p>
                            </div>
                        </template>
                    </div>

                    <div class="pt-6 border-t border-rose-50 mt-4">
                        <p class="font-sans text-[10px] text-slate-400 uppercase tracking-widest mb-1">Forever Yours</p>
                        <p class="font-script text-3xl text-slate-800">{{ $sender }}</p>
                    </div>
                </div>

                <div class="mt-8 text-center">
                    <div
                        class="flex items-center justify-center gap-2 text-[9px] text-rose-300 uppercase tracking-widest animate-pulse">
                        <span>🎵</span>
                        <span>Frank Ocean - White Ferrari</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function app() {
            return {
                isOpen: false,
                showFullContent: false,
                photos: @json($photos),
                messages: @json($messages),
                currentPhoto: 0,
                currentMessage: 0,

                init() {
                    // Preload Images
                    this.photos.forEach(src => {
                        const img = new Image();
                        img.src = src;
                    });
                },

                openEnvelope() {
                    if (this.isOpen) return;
                    this.isOpen = true;
                    this.$refs.bgMusic.volume = 0.5;
                    this.$refs.bgMusic.play().catch(e => console.log("Audio play failed:", e));

                    setTimeout(() => {
                        this.showFullContent = true;
                        this.startTimers();
                    }, 1200);
                },

                startTimers() {
                    // Photo Timer (3.5s)
                    setInterval(() => {
                        this.currentPhoto = (this.currentPhoto + 1) % this.photos.length;
                    }, 3500);

                    // Message Timer (6s)
                    setInterval(() => {
                        this.currentMessage = (this.currentMessage + 1) % this.messages.length;
                    }, 6000);
                }
            }
        }
    </script>
</body>

</html>
