<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\LoveDataManager;

class NurasyahController extends Controller
{
    public function index(): View
    {
        $data = LoveDataManager::getData();
        
        return view('nurasyah', [
            'recipient' => $data['recipient'],
            'nickname' => $data['nickname'],
            'sender' => $data['sender'],
            'phone_number' => $data['phone_number'],
            'start_date' => $data['start_date'],
            'secret_note' => $data['secret_note'],
            'playlist' => $data['playlist'],
            'song_title' => $data['playlist'][0]['title'] ?? 'Putus',
            'artist' => $data['playlist'][0]['artist'] ?? 'Pamungkas',
            'music_url' => $data['playlist'][0]['url'] ?? asset('audio/music.mp3'),
            'photos' => $data['photos'],
            'open_when' => $data['open_when'],
            'coupons' => $data['coupons'],
            'little_things' => $data['little_things'],
            'messages' => $data['messages'],
        ]);
    }
}
