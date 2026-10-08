<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>Love Studio — Kelola Kenangan Farhan & Lia</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;600;700&family=Great+Vibes&family=Playfair+Display:ital,wght@0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'serif'],
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
                        },
                        paper: '#faf8f5',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #fff1f5;
            background-image: 
                radial-gradient(at 0% 0%, rgba(254, 205, 214, 0.6) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(253, 164, 184, 0.45) 0px, transparent 50%),
                radial-gradient(at 50% 50%, rgba(255, 241, 245, 0.9) 0px, transparent 100%);
            background-attachment: fixed;
            min-height: 100vh;
        }
        .glass-card {
            background: rgba(255, 255, 255, 0.88);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.9);
        }
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="text-slate-800 font-sans antialiased p-3 sm:p-6" x-data="{ activeTab: 'photos' }">

    <div class="max-w-5xl mx-auto">
        
        <!-- TOP HEADER -->
        <header class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6 sm:mb-8 glass-card p-4 sm:p-5 rounded-3xl shadow-sm">
            <div class="flex items-center gap-3 text-center sm:text-left">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-romantic-500 to-rose-600 text-white flex items-center justify-center text-2xl shadow-md">
                    🎨
                </div>
                <div>
                    <h1 class="font-serif font-bold text-xl sm:text-2xl text-slate-900 leading-tight">Love Studio</h1>
                    <p class="text-xs text-slate-500">Panel Pengelola Foto, Lagu & Pesan Cinta Farhan & Lia</p>
                </div>
            </div>

            <div class="flex items-center gap-2.5">
                <a href="{{ route('home') }}" class="bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-full shadow-sm hover:shadow transition-all flex items-center gap-1.5">
                    <span>←</span>
                    <span>Lihat Website</span>
                </a>

                @if ($isAuthenticated)
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-rose-50 hover:bg-rose-100 text-romantic-700 text-xs sm:text-sm font-semibold px-4 py-2.5 rounded-full border border-rose-200 transition-colors">
                            Keluar
                        </button>
                    </form>
                @endif
            </div>
        </header>

        <!-- FLASH NOTIFICATIONS -->
        @if (session('success'))
            <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs sm:text-sm flex items-center gap-2 shadow-sm animate-fade-in">
                <span class="text-lg">✅</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs sm:text-sm flex items-center gap-2 shadow-sm animate-fade-in">
                <span class="text-lg">⚠️</span>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 text-xs sm:text-sm space-y-1">
                @foreach ($errors->all() as $err)
                    <p>• {{ $err }}</p>
                @endforeach
            </div>
        @endif


        <!-- IF NOT AUTHENTICATED: PIN LOGIN SCREEN -->
        @if (!$isAuthenticated)
            <div class="max-w-md mx-auto my-12">
                <div class="glass-card p-6 sm:p-10 rounded-3xl shadow-xl text-center border border-white">
                    <div class="w-16 h-16 mx-auto rounded-full bg-romantic-100 text-romantic-600 flex items-center justify-center text-3xl mb-4">
                        🔒
                    </div>
                    <h2 class="font-serif font-bold text-2xl text-slate-900 mb-2">Masuk ke Love Studio</h2>
                    <p class="text-xs text-slate-500 mb-6">
                        Masukkan PIN Rahasia untuk mulai mengedit konten website cinta kalian.
                    </p>

                    <form action="{{ route('admin.auth') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <input type="password" name="pin" required placeholder="Masukkan PIN..." autofocus
                                class="w-full text-center tracking-widest text-lg font-bold py-3.5 px-4 rounded-2xl border border-slate-200 focus:border-romantic-500 focus:ring-2 focus:ring-romantic-200 outline-none transition-all">
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-romantic-500 to-rose-600 hover:from-romantic-600 hover:to-rose-700 text-white font-bold py-3.5 rounded-2xl shadow-lg shadow-romantic-500/25 active:scale-95 transition-all text-sm">
                            Buka Studio ✨
                        </button>
                    </form>

                    <p class="text-[11px] text-slate-400 mt-6 italic">
                        💡 Petunjuk: PIN default adalah tanggal jadian (contoh: <code>080624</code>)
                    </p>
                </div>
            </div>
        @else
            <!-- AUTHENTICATED: MAIN STUDIO DASHBOARD -->
            <div>
                <!-- NAVIGATION TABS (TOUCH OPTIMIZED) -->
                <div class="flex items-center gap-2 overflow-x-auto pb-3 mb-6 no-scrollbar">
                    <button @click="activeTab = 'photos'"
                        :class="activeTab === 'photos' ? 'bg-romantic-600 text-white shadow-md shadow-romantic-600/30 font-bold' : 'bg-white/80 hover:bg-white text-slate-600 font-medium'"
                        class="px-4 py-2.5 rounded-2xl text-xs sm:text-sm whitespace-nowrap transition-all flex items-center gap-2">
                        <span>📸</span>
                        <span>Galeri Foto ({{ count($data['photos']) }})</span>
                    </button>

                    <button @click="activeTab = 'songs'"
                        :class="activeTab === 'songs' ? 'bg-romantic-600 text-white shadow-md shadow-romantic-600/30 font-bold' : 'bg-white/80 hover:bg-white text-slate-600 font-medium'"
                        class="px-4 py-2.5 rounded-2xl text-xs sm:text-sm whitespace-nowrap transition-all flex items-center gap-2">
                        <span>🎵</span>
                        <span>Playlist Lagu ({{ count($data['playlist']) }})</span>
                    </button>

                    <button @click="activeTab = 'general'"
                        :class="activeTab === 'general' ? 'bg-romantic-600 text-white shadow-md shadow-romantic-600/30 font-bold' : 'bg-white/80 hover:bg-white text-slate-600 font-medium'"
                        class="px-4 py-2.5 rounded-2xl text-xs sm:text-sm whitespace-nowrap transition-all flex items-center gap-2">
                        <span>💌</span>
                        <span>Surat & Identitas</span>
                    </button>

                    <button @click="activeTab = 'coupons'"
                        :class="activeTab === 'coupons' ? 'bg-romantic-600 text-white shadow-md shadow-romantic-600/30 font-bold' : 'bg-white/80 hover:bg-white text-slate-600 font-medium'"
                        class="px-4 py-2.5 rounded-2xl text-xs sm:text-sm whitespace-nowrap transition-all flex items-center gap-2">
                        <span>🎟️</span>
                        <span>Kupon Cinta</span>
                    </button>

                    <button @click="activeTab = 'capsules'"
                        :class="activeTab === 'capsules' ? 'bg-romantic-600 text-white shadow-md shadow-romantic-600/30 font-bold' : 'bg-white/80 hover:bg-white text-slate-600 font-medium'"
                        class="px-4 py-2.5 rounded-2xl text-xs sm:text-sm whitespace-nowrap transition-all flex items-center gap-2">
                        <span>🧸</span>
                        <span>Kapsul Emosi</span>
                    </button>

                    <button @click="activeTab = 'littlethings'"
                        :class="activeTab === 'littlethings' ? 'bg-romantic-600 text-white shadow-md shadow-romantic-600/30 font-bold' : 'bg-white/80 hover:bg-white text-slate-600 font-medium'"
                        class="px-4 py-2.5 rounded-2xl text-xs sm:text-sm whitespace-nowrap transition-all flex items-center gap-2">
                        <span>✨</span>
                        <span>Hal Kecilmu</span>
                    </button>
                </div>


                <!-- TAB 1: PHOTOS MANAGEMENT -->
                <div x-show="activeTab === 'photos'" class="space-y-6">
                    <!-- Upload New Photo Form -->
                    <div class="glass-card p-5 sm:p-7 rounded-3xl shadow-sm border border-white">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-xl">➕</span>
                            <h3 class="font-serif font-bold text-lg text-slate-900">Tambah Foto Kenangan Baru</h3>
                        </div>

                        <form action="{{ route('admin.photos.add') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @csrf
                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Pilih File Foto (JPG / PNG / WEBP)</label>
                                <input type="file" name="photo" required accept="image/*"
                                    class="w-full text-xs text-slate-600 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-romantic-50 file:text-romantic-700 hover:file:bg-romantic-100 cursor-pointer border border-slate-200 rounded-2xl p-2 bg-white">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Caption Romantis / Kenangan</label>
                                <input type="text" name="caption" required placeholder="Contoh: Senyum manismu hari ini ☀️"
                                    class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Tag Kategori</label>
                                <input type="text" name="tag" placeholder="Contoh: Sweet Moment" value="Sweet Moment"
                                    class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white">
                            </div>

                            <div class="sm:col-span-2 flex justify-end">
                                <button type="submit" class="bg-romantic-600 hover:bg-romantic-700 text-white font-semibold px-6 py-2.5 rounded-full text-xs sm:text-sm shadow-md transition-all">
                                    Unggah Foto 📸
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Current Photos List -->
                    <div class="glass-card p-5 sm:p-7 rounded-3xl shadow-sm border border-white">
                        <h3 class="font-serif font-bold text-lg text-slate-900 mb-4">Daftar Foto Saat Ini ({{ count($data['photos']) }})</h3>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($data['photos'] as $photo)
                                <div class="bg-white p-3 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
                                    <div>
                                        <div class="relative w-full aspect-[4/5] bg-slate-100 rounded-xl overflow-hidden mb-3">
                                            <img src="{{ $photo['url'] }}" class="w-full h-full object-cover" alt="Memory">
                                            <span class="absolute top-2 left-2 bg-black/50 backdrop-blur-md text-white text-[9px] font-bold px-2 py-0.5 rounded-full">
                                                {{ $photo['tag'] }}
                                            </span>
                                        </div>
                                        <p class="font-handwriting text-xl text-slate-800 leading-snug">"{{ $photo['caption'] }}"</p>
                                    </div>

                                    <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between">
                                        <span class="text-[10px] text-slate-400">{{ $photo['date'] ?? 'Memory' }}</span>
                                        <form action="{{ route('admin.photos.delete') }}" method="POST" onsubmit="return confirm('Hapus foto ini dari kenangan?')">
                                            @csrf
                                            <input type="hidden" name="photo_id" value="{{ $photo['id'] ?? '' }}">
                                            <button type="submit" class="text-xs text-rose-500 hover:text-rose-700 font-semibold flex items-center gap-1">
                                                <span>🗑️ Hapus</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <!-- TAB 2: SONGS & PLAYLIST MANAGEMENT -->
                <div x-show="activeTab === 'songs'" class="space-y-6">
                    <!-- Upload New Song Form -->
                    <div class="glass-card p-5 sm:p-7 rounded-3xl shadow-sm border border-white">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-xl">➕</span>
                            <h3 class="font-serif font-bold text-lg text-slate-900">Tambah Lagu Baru ke Playlist</h3>
                        </div>

                        <form action="{{ route('admin.songs.add') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Judul Lagu</label>
                                <input type="text" name="title" required placeholder="Contoh: To The Bone"
                                    class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Penyanyi / Artist</label>
                                <input type="text" name="artist" required placeholder="Contoh: Pamungkas"
                                    class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Pilih File Audio (MP3 / WAV / M4A)</label>
                                <input type="file" name="audio" required accept="audio/*"
                                    class="w-full text-xs text-slate-600 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-romantic-50 file:text-romantic-700 hover:file:bg-romantic-100 cursor-pointer border border-slate-200 rounded-2xl p-2 bg-white">
                            </div>

                            <div class="sm:col-span-2 flex justify-end">
                                <button type="submit" class="bg-romantic-600 hover:bg-romantic-700 text-white font-semibold px-6 py-2.5 rounded-full text-xs sm:text-sm shadow-md transition-all">
                                    Unggah Lagu 🎶
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Current Playlist -->
                    <div class="glass-card p-5 sm:p-7 rounded-3xl shadow-sm border border-white">
                        <h3 class="font-serif font-bold text-lg text-slate-900 mb-4">Daftar Lagu di Playlist ({{ count($data['playlist']) }})</h3>
                        
                        <div class="space-y-3">
                            @foreach ($data['playlist'] as $idx => $song)
                                <div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center font-bold text-xs flex-shrink-0">
                                            {{ $idx + 1 }}
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-900 text-sm">{{ $song['title'] }}</h4>
                                            <p class="text-xs text-slate-500">{{ $song['artist'] }}</p>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-3">
                                        <audio controls class="h-8 max-w-[200px] sm:max-w-[260px]">
                                            <source src="{{ $song['url'] }}" type="audio/mpeg">
                                        </audio>

                                        @if (count($data['playlist']) > 1)
                                            <form action="{{ route('admin.songs.delete') }}" method="POST" onsubmit="return confirm('Hapus lagu ini dari playlist?')">
                                                @csrf
                                                <input type="hidden" name="song_id" value="{{ $song['id'] ?? '' }}">
                                                <button type="submit" class="text-xs text-rose-500 hover:text-rose-700 font-semibold p-2">
                                                    🗑️ Hapus
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <!-- TAB 3: GENERAL & LOVE LETTER MESSAGES -->
                <div x-show="activeTab === 'general'" class="space-y-6">
                    <form action="{{ route('admin.general') }}" method="POST">
                        @csrf
                        <div class="glass-card p-5 sm:p-7 rounded-3xl shadow-sm border border-white space-y-5">
                            <h3 class="font-serif font-bold text-lg text-slate-900 border-b border-rose-100 pb-3">Informasi Pasangan & Tanggal</h3>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Lengkap Pasangan</label>
                                    <input type="text" name="recipient" value="{{ $data['recipient'] }}" required
                                        class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Panggilan Pasangan</label>
                                    <input type="text" name="nickname" value="{{ $data['nickname'] }}" required
                                        class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Nama Pengirim</label>
                                    <input type="text" name="sender" value="{{ $data['sender'] }}" required
                                        class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">No WhatsApp (untuk klaim kupon, contoh: 6281234567890)</label>
                                    <input type="text" name="phone_number" value="{{ $data['phone_number'] }}" required
                                        class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Tanggal Mulai Jadian (untuk Live Counter, YYYY-MM-DD)</label>
                                    <input type="date" name="start_date" value="{{ $data['start_date'] }}" required
                                        class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white">
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Ganti PIN Studio (Opsional)</label>
                                    <input type="text" name="pin" value="{{ $data['pin'] ?? '080624' }}"
                                        class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white font-mono">
                                </div>
                            </div>

                            <h3 class="font-serif font-bold text-lg text-slate-900 border-b border-rose-100 pb-3 pt-4">Pesan Surat Cinta & Kartu Gosok</h3>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">
                                    Pesan Slide Surat Cinta (Pisahkan setiap slide dengan baris baru / Enter)
                                </label>
                                <textarea name="messages" rows="6" required
                                    class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white font-serif leading-relaxed">{{ implode("\n", $data['messages']) }}</textarea>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">
                                    Pesan Rahasia Kartu Gosok (Secret Scratch Card)
                                </label>
                                <textarea name="secret_note" rows="3" required
                                    class="w-full text-xs sm:text-sm p-3 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none bg-white leading-relaxed">{{ $data['secret_note'] }}</textarea>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-romantic-600 hover:bg-romantic-700 text-white font-semibold px-8 py-3 rounded-full text-xs sm:text-sm shadow-md transition-all">
                                    Simpan Perubahan Pesan 💌
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- TAB 4: COUPONS MANAGEMENT -->
                <div x-show="activeTab === 'coupons'" class="space-y-6">
                    <form action="{{ route('admin.coupons.update') }}" method="POST">
                        @csrf
                        <div class="glass-card p-5 sm:p-7 rounded-3xl shadow-sm border border-white space-y-6">
                            <div class="flex items-center justify-between border-b border-rose-100 pb-3">
                                <h3 class="font-serif font-bold text-lg text-slate-900">Kelola 4 Kupon Kasih Sayang</h3>
                                <span class="text-xs text-slate-400">Bisa diubah sesuai tempat hangout & keinginan kalian</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($data['coupons'] as $idx => $coupon)
                                    <div class="bg-white p-4 rounded-2xl border border-slate-200 space-y-3">
                                        <div class="flex items-center justify-between gap-2 border-b border-dashed border-slate-200 pb-2">
                                            <span class="font-bold text-xs text-romantic-600">Kupon #{{ $idx + 1 }}</span>
                                            <input type="text" name="coupons[{{ $idx }}][icon]" value="{{ $coupon['icon'] }}" class="w-10 text-center text-lg border rounded p-1" title="Emoji">
                                        </div>

                                        <input type="hidden" name="coupons[{{ $idx }}][code]" value="{{ $coupon['code'] }}">
                                        <input type="hidden" name="coupons[{{ $idx }}][color]" value="{{ $coupon['color'] ?? 'from-rose-500 to-pink-600' }}">

                                        <div>
                                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Judul Kupon</label>
                                            <input type="text" name="coupons[{{ $idx }}][title]" value="{{ $coupon['title'] }}" required
                                                class="w-full text-xs p-2.5 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none">
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Deskripsi Kupon</label>
                                            <textarea name="coupons[{{ $idx }}][desc]" rows="2" required
                                                class="w-full text-xs p-2.5 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none">{{ $coupon['desc'] }}</textarea>
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Pesan Otomatis WhatsApp</label>
                                            <textarea name="coupons[{{ $idx }}][wa_msg]" rows="2" required
                                                class="w-full text-xs p-2.5 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none font-mono text-[11px]">{{ $coupon['wa_msg'] }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-romantic-600 hover:bg-romantic-700 text-white font-semibold px-8 py-3 rounded-full text-xs sm:text-sm shadow-md transition-all">
                                    Simpan Perubahan Kupon 🎟️
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- TAB 5: OPEN WHEN CAPSULES -->
                <div x-show="activeTab === 'capsules'" class="space-y-6">
                    <form action="{{ route('admin.capsules.update') }}" method="POST">
                        @csrf
                        <div class="glass-card p-5 sm:p-7 rounded-3xl shadow-sm border border-white space-y-6">
                            <div class="flex items-center justify-between border-b border-rose-100 pb-3">
                                <h3 class="font-serif font-bold text-lg text-slate-900">Kelola Kapsul Emosi "Buka Saat..."</h3>
                                <span class="text-xs text-slate-400">Pesan penenang saat pacar lagi butuh support</span>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @foreach ($data['open_when'] as $idx => $capsule)
                                    <div class="bg-white p-4 rounded-2xl border border-slate-200 space-y-3">
                                        <div class="flex items-center justify-between gap-2 border-b border-dashed border-slate-200 pb-2">
                                            <span class="font-bold text-xs text-romantic-600">Kapsul #{{ $idx + 1 }}</span>
                                            <input type="text" name="capsules[{{ $idx }}][icon]" value="{{ $capsule['icon'] }}" class="w-10 text-center text-lg border rounded p-1" title="Emoji">
                                        </div>

                                        <input type="hidden" name="capsules[{{ $idx }}][id]" value="{{ $capsule['id'] }}">

                                        <div>
                                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Label Mood (Contoh: Lagi Capek / Hari Berat)</label>
                                            <input type="text" name="capsules[{{ $idx }}][mood]" value="{{ $capsule['mood'] }}" required
                                                class="w-full text-xs p-2.5 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none">
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Tag Pendek</label>
                                            <input type="text" name="capsules[{{ $idx }}][tag]" value="{{ $capsule['tag'] }}" required
                                                class="w-full text-xs p-2.5 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none">
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Pesan Penenang / Quote</label>
                                            <textarea name="capsules[{{ $idx }}][quote]" rows="3" required
                                                class="w-full text-xs p-2.5 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none leading-relaxed">{{ $capsule['quote'] }}</textarea>
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Aksi / Tip Manis</label>
                                            <input type="text" name="capsules[{{ $idx }}][action]" value="{{ $capsule['action'] }}" required
                                                class="w-full text-xs p-2.5 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-romantic-600 hover:bg-romantic-700 text-white font-semibold px-8 py-3 rounded-full text-xs sm:text-sm shadow-md transition-all">
                                    Simpan Perubahan Kapsul 🧸
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


                <!-- TAB 6: LITTLE THINGS -->
                <div x-show="activeTab === 'littlethings'" class="space-y-6">
                    <form action="{{ route('admin.little-things.update') }}" method="POST">
                        @csrf
                        <div class="glass-card p-5 sm:p-7 rounded-3xl shadow-sm border border-white space-y-6">
                            <div class="flex items-center justify-between border-b border-rose-100 pb-3">
                                <h3 class="font-serif font-bold text-lg text-slate-900">Kelola "Hal-Hal Kecil Tentang Kamu"</h3>
                                <span class="text-xs text-slate-400">Detail kebiasaan manis yang selalu kamu kagumi</span>
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($data['little_things'] as $idx => $item)
                                    <div class="bg-white p-4 rounded-2xl border border-slate-200 space-y-3">
                                        <div class="flex items-center justify-between gap-2 border-b border-dashed border-slate-200 pb-2">
                                            <span class="font-bold text-xs text-romantic-600">Item #{{ $idx + 1 }}</span>
                                            <input type="text" name="little_things[{{ $idx }}][icon]" value="{{ $item['icon'] }}" class="w-10 text-center text-lg border rounded p-1" title="Emoji">
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Judul Kebiasaan</label>
                                            <input type="text" name="little_things[{{ $idx }}][title]" value="{{ $item['title'] }}" required
                                                class="w-full text-xs p-2.5 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none">
                                        </div>

                                        <div>
                                            <label class="block text-[11px] font-semibold text-slate-600 mb-1">Deskripsi Manis</label>
                                            <textarea name="little_things[{{ $idx }}][desc]" rows="3" required
                                                class="w-full text-xs p-2.5 rounded-xl border border-slate-200 focus:border-romantic-500 outline-none leading-relaxed">{{ $item['desc'] }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex justify-end">
                                <button type="submit" class="bg-romantic-600 hover:bg-romantic-700 text-white font-semibold px-8 py-3 rounded-full text-xs sm:text-sm shadow-md transition-all">
                                    Simpan Perubahan Hal Kecil ✨
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        @endif

    </div>

</body>
</html>
