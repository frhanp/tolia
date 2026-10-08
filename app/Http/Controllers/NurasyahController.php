<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;

class NurasyahController extends Controller
{
    public function index(): View
    {
        return view('nurasyah', [
            // Identitas Pasangan
            'recipient' => 'Nurasyah Lala',
            'nickname' => 'Lia',
            'sender' => 'Farhan',
            'phone_number' => '6281234567890', // Bisa diganti nomor WA Farhan
            
            // Info Musik & Playlist (Bisa Tambah Lagu Lain)
            'playlist' => [
                [
                    'title' => 'Putus',
                    'artist' => 'Pamungkas',
                    'url' => file_exists(public_path('audio/putus.mp3')) ? asset('audio/putus.mp3') : asset('audio/music.mp3'),
                    'file' => 'putus.mp3'
                ],
                [
                    'title' => 'White Ferrari',
                    'artist' => 'Frank Ocean',
                    'url' => asset('audio/music.mp3'),
                    'file' => 'music.mp3'
                ],
            ],
            'song_title' => 'Putus',
            'artist' => 'Pamungkas',
            'music_url' => file_exists(public_path('audio/putus.mp3')) ? asset('audio/putus.mp3') : asset('audio/music.mp3'),
            
            // Tanggal Awal Momen Spesial (8 Juni 2024)
            'start_date' => '2024-06-08',

            // 1. CAPSULE "BUKA KETIKA..." (OPEN WHEN CAPSULES)
            'open_when' => [
                [
                    'id' => 'capek',
                    'mood' => 'Lagi Capek / Hari Berat',
                    'icon' => '🥺',
                    'tag' => 'Take A Rest, Sayang',
                    'quote' => 'Dunia mungkin lagi berisik dan bikin lelah, tapi kamu udah lakuin yang terbaik hari ini. Istirahat ya, aku selalu bangga sama kamu.',
                    'action' => 'Peluk virtual + jangan lupa minum air putih & tidur yang cukup ya!'
                ],
                [
                    'id' => 'overthinking',
                    'mood' => 'Lagi Overthinking / Cemas',
                    'icon' => '💭',
                    'tag' => 'Deep Breath, Lia',
                    'quote' => 'Apapun yang lagi kamu takutin tentang masa depan atau hari esok, ingat ya: kamu gak sendirian. We will figure this out together.',
                    'action' => 'Tarik napas dalam-dalam... Farhan bakal selalu ada di sampingmu.'
                ],
                [
                    'id' => 'kangen',
                    'mood' => 'Lagi Kangen Berat',
                    'icon' => '🧸',
                    'tag' => 'Miss You More',
                    'quote' => 'Jarak atau kesibukan mungkin bikin kita gak bisa langsung ketemu, tapi pikiran dan rasa sayangku selalu nyampe ke kamu setiap saat.',
                    'action' => 'Telepon atau kirim PAP sekarang juga, aku pasti seneng banget!'
                ],
                [
                    'id' => 'ngambek',
                    'mood' => 'Lagi Kesel / Ngambek Sama Aku',
                    'icon' => '😤',
                    'tag' => 'Aku Minta Maaf Ya',
                    'quote' => 'Maafin aku ya kalau ada kata atau sikapku yang bikin kamu bete atau sedih. Gak pernah ada niat sedikitpun buat bikin kamu kecewa.',
                    'action' => 'Klaim kupon traktir makanan sekarang biar baikan yuk!'
                ]
            ],

            // 2. KUPON KASIH SAYANG (REDEEMABLE VIA WHATSAPP)
            'coupons' => [
                [
                    'code' => 'KUPON-MARUGAME',
                    'title' => 'Kupon ke Marugame Udon',
                    'desc' => 'Traktiran semangkuk udon hangat + aneka tempura renyah favorit Lia di Marugame Udon!',
                    'icon' => '🍜',
                    'color' => 'from-rose-500 to-pink-600',
                    'wa_msg' => 'Halo Farhan! Aku mau klaim Kupon Marugame Udon hari ini. Yuk makan udon hangat bareng! 🍜😋'
                ],
                [
                    'code' => 'KUPON-POTATOES',
                    'title' => 'Kupon Nongkrong di Potatoes',
                    'desc' => 'Kencan santai, pesan minuman & cemilan favorit, sambil ngobrol seru berdua di Potatoes!',
                    'icon' => '🍹',
                    'color' => 'from-amber-500 to-rose-500',
                    'wa_msg' => 'Halo sayang! Aku mau klaim Kupon ke Potatoes hari ini. Yuk nongkrong dan chill bareng di Potatoes 🍹✨'
                ],
                [
                    'code' => 'KUPON-TANATEMAN',
                    'title' => 'Kupon Nongkrong di Tana Teman',
                    'desc' => 'Kencan santai, ngopi, dan ngobrol panjang berdua tanpa buru-buru di Tana Teman.',
                    'icon' => '☕',
                    'color' => 'from-purple-500 to-rose-500',
                    'wa_msg' => 'Halo Farhan! Aku mau klaim Kupon ke Tana Teman. Yuk luangin waktu santai & ngopi berdua ☕🤍'
                ],
                [
                    'code' => 'KUPON-AYAMMASWAAN',
                    'title' => 'Kupon Makan Ayam Mas Waan',
                    'desc' => 'Kupon makan kenyang Ayam Mas Waan nikmat dengan sambal mantap, Farhan yang traktir!',
                    'icon' => '🍗',
                    'color' => 'from-pink-600 to-rose-700',
                    'wa_msg' => 'Halo Farhan! Mau klaim Kupon Ayam Mas Waan dong. Laper nih, yuk makan Ayam Mas Waan sekarang 🍗🌶️'
                ]
            ],

            // 3. HAL-HAL KECIL TENTANG KAMU (AUTHENTIC & PERSONAL DETAILS)
            'little_things' => [
                [
                    'icon' => '✨',
                    'title' => 'Cara Kamu Ketawa Lepas',
                    'desc' => 'Suara ketawa kamu yang khas itu selalu jadi obat paling ampuh buat ngilangin stresku seketika.'
                ],
                [
                    'icon' => '📸',
                    'title' => 'Suka Minta Difotoin Lucu',
                    'desc' => 'Pose-pose gemas kamu dan senyuman di depan kamera yang gak pernah gagal bikin aku kagum.'
                ],
                [
                    'icon' => '🍰',
                    'title' => 'Mood Naik Kalau Makan Enak',
                    'desc' => 'Mata kamu yang langsung berbinar-binar setiap kali makanan favorit atau minuman manis kamu datang.'
                ],
                [
                    'icon' => '💌',
                    'title' => 'Perhatian Kecil yang Tulus',
                    'desc' => 'Tanya "udah makan belum?" atau sekadar nanyain kabar di tengah hari yang selalu bikin ngerasa dihargai.'
                ],
                [
                    'icon' => '🤍',
                    'title' => 'Caramu Selalu Percaya ke Aku',
                    'desc' => 'Dukungan kamu bikin aku selalu pengen jadi versi diri yang lebih baik setiap harinya.'
                ],
            ],

            // 4. GALERI FOTO POLAROID
            'photos' => [
                [
                    'url' => asset('photos/1.jpeg'),
                    'caption' => 'Senyum kamu yang selalu bikin hariku jadi lebih cerah ☀️',
                    'tag' => 'My Favorite Smile',
                    'date' => 'Our Sweet Memory'
                ],
                [
                    'url' => asset('photos/2.jpeg'),
                    'caption' => 'Setiap momen sederhana bareng kamu selalu terasa istimewa ✨',
                    'tag' => 'Precious Moments',
                    'date' => 'Warm Days'
                ],
                [
                    'url' => asset('photos/3.jpeg'),
                    'caption' => 'Cantiknya kesayangan aku yang nggak pernah gagal bikin kagum 💖',
                    'tag' => 'Pretty Lia',
                    'date' => 'Endless Love'
                ],
                [
                    'url' => asset('photos/4.jpeg'),
                    'caption' => 'Momen kebersamaan kita yang selalu ingin aku ulang berkali-kali 🌷',
                    'tag' => 'Us Together',
                    'date' => 'Cherished Time'
                ],
                [
                    'url' => asset('photos/5.jpeg'),
                    'caption' => 'Bersamamu, tempat paling nyaman untuk pulang 🏡',
                    'tag' => 'Safe Place',
                    'date' => 'Forever Comfort'
                ],
                [
                    'url' => asset('photos/6.jpeg'),
                    'caption' => 'Tawa lepas kamu adalah melodi favorit yang selalu aku cari 🎶',
                    'tag' => 'Pure Joy',
                    'date' => 'Laughter & Love'
                ],
                [
                    'url' => asset('photos/7.jpeg'),
                    'caption' => 'Terima kasih sudah ada di sampingku di setiap langkah 🤍',
                    'tag' => 'Always Yours',
                    'date' => 'To Eternity'
                ],
            ],

            // 5. PESAN SURAT CINTA MENDALAM
            'messages' => [
                "Hai Lia, pacar aku tersayang. Website ini kubuat khusus bukan cuma sebagai hiasan, tapi sebagai pengingat abadi betapa berharganya kamu di hidupku.",
                "Terima kasih sudah bertahan, menemani prosesku, dan selalu sabar ngadepin kurang lebihnya aku.",
                "Aku janji bakal terus belajar jadi pasangan yang lebih baik, menjaga hatimu, dan selalu ada di setiap musim hidupmu.",
                "Di saat dunia luar terasa berat atau melelahkan, ingat ya: kamu selalu punya rumah untuk pulang, yaitu di sini, bersamaku.",
                "Terakhir: Website ini akan tetap aktif 24 jam, persis seperti rasa sayang dan doaku buat kamu yang nggak akan pernah berhenti.",
            ],

            // 6. PESAN RAHASIA (SCRATCH CARD)
            'secret_note' => 'P.S. Lia, dari jutaan orang di bumi, aku selalu bersyukur semesta mempertemukan aku sama kamu. I choose you today, tomorrow, and every day after. Love you so much! 💖'
        ]);
    }
}
