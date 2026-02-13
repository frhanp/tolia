<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;

class NurasyahController extends Controller
{
    public function index(): View
    {
        return view('nurasyah', [
            'recipient' => 'Nurasyah Lala', // Nama di Cover Depan
            'sender' => 'Farhan',

            // GANTI LAGU KE WHITE FERRARI
            // Pastikan file "white-ferrari.mp3" sudah ada di folder public/audio/
            'music_url' => asset('audio/music.mp3'),

            // FOTO-FOTO (Ganti dengan foto aslimu)
            'photos' => [
                asset('photos/1.jpeg'),
                asset('photos/2.jpeg'),
                asset('photos/3.jpeg'),
                asset('photos/4.jpeg'),
                asset('photos/5.jpeg'),
                asset('photos/6.jpeg'),
                asset('photos/7.jpeg'),
            ],

            // PESAN YANG SUDAH DIKEMBANGKAN (Slide Text)
            'messages' => [
                "Hai Lia, pacar aku. Happy Valentine’s Day. Aku buat ini biar kamu selalu ingat, sejauh apapun kita berjalan, I will always love you.",
                "Aku janji bakal selalu ada buat kamu, mendengarkan kamu, dan menemani kamu, apapun yang terjadi nanti.",
                "Makasih ya sayang, udah bertahan sampai di titik ini. Makasih udah sabar ngadepin keras kepalanya aku & kurangnya aku.",
                "Semoga website kecil ini bisa bikin kamu senyum hari ini. Isinya mungkin sederhana, tapi tulus dari hati aku.",
                "Terakhir: Website ini bakal selalu online 24 jam, persis kayak rasa sayang aku ke kamu yang nggak akan pernah berhenti.",
            ]
        ]);
    }
}
