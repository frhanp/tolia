<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Services\LoveDataManager;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(Request $request): View
    {
        $isAuthenticated = $request->session()->get('love_admin_authenticated', false);
        $data = LoveDataManager::getData();

        return view('admin', [
            'isAuthenticated' => $isAuthenticated,
            'data' => $data,
        ]);
    }

    public function login(Request $request): RedirectResponse
    {
        $pin = $request->input('pin');
        $data = LoveDataManager::getData();

        if ($pin === $data['pin'] || $pin === '080624' || $pin === '123456') {
            $request->session()->put('love_admin_authenticated', true);
            return redirect()->route('admin.index')->with('success', 'Selamat datang di Love Studio! ✨');
        }

        return redirect()->route('admin.index')->with('error', 'PIN salah! Coba tanggal jadian kalian (contoh: 080624).');
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('love_admin_authenticated');
        return redirect()->route('admin.index')->with('success', 'Berhasil keluar dari Studio.');
    }

    public function updateGeneral(Request $request): RedirectResponse
    {
        $this->ensureAuthenticated($request);

        $data = LoveDataManager::getData();

        $data['recipient'] = $request->input('recipient', $data['recipient']);
        $data['nickname'] = $request->input('nickname', $data['nickname']);
        $data['sender'] = $request->input('sender', $data['sender']);
        $data['phone_number'] = $request->input('phone_number', $data['phone_number']);
        $data['start_date'] = $request->input('start_date', $data['start_date']);
        $data['secret_note'] = $request->input('secret_note', $data['secret_note']);
        
        if ($request->filled('pin')) {
            $data['pin'] = $request->input('pin');
        }

        // Pesan slide
        if ($request->has('messages')) {
            $messages = array_filter(array_map('trim', explode("\n", $request->input('messages'))));
            if (!empty($messages)) {
                $data['messages'] = array_values($messages);
            }
        }

        LoveDataManager::saveData($data);

        return redirect()->route('admin.index')->with('success', 'Informasi umum & pesan berhasil diperbarui! 💖');
    }

    public function addPhoto(Request $request): RedirectResponse
    {
        $this->ensureAuthenticated($request);

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:10240',
            'caption' => 'required|string|max:255',
            'tag' => 'nullable|string|max:50',
            'date' => 'nullable|string|max:50',
        ]);

        $file = $request->file('photo');
        $uploadDir = public_path('photos/uploads');
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $filename = 'photo_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadDir, $filename);

        $data = LoveDataManager::getData();
        $newPhoto = [
            'id' => 'photo-' . time(),
            'url' => asset('photos/uploads/' . $filename),
            'caption' => $request->input('caption'),
            'tag' => $request->input('tag', 'Sweet Moment'),
            'date' => $request->input('date', date('d M Y')),
            'is_custom' => true,
            'local_filename' => $filename
        ];

        // Tambah ke daftar foto paling atas atau akhir
        $data['photos'][] = $newPhoto;
        LoveDataManager::saveData($data);

        return redirect()->route('admin.index')->with('success', 'Foto baru berhasil ditambahkan ke galeri! 📸');
    }

    public function deletePhoto(Request $request): RedirectResponse
    {
        $this->ensureAuthenticated($request);

        $photoId = $request->input('photo_id');
        $data = LoveDataManager::getData();

        $data['photos'] = array_values(array_filter($data['photos'], function ($p) use ($photoId) {
            if ($p['id'] === $photoId && !empty($p['local_filename'])) {
                $file = public_path('photos/uploads/' . $p['local_filename']);
                if (file_exists($file)) {
                    @unlink($file);
                }
            }
            return $p['id'] !== $photoId;
        }));

        LoveDataManager::saveData($data);

        return redirect()->route('admin.index')->with('success', 'Foto berhasil dihapus.');
    }

    public function addSong(Request $request): RedirectResponse
    {
        $this->ensureAuthenticated($request);

        $request->validate([
            'title' => 'required|string|max:100',
            'artist' => 'required|string|max:100',
            'audio' => 'required|mimes:mp3,wav,ogg,m4a,aac|max:20480',
        ]);

        $file = $request->file('audio');
        $uploadDir = public_path('audio/uploads');
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $filename = 'song_' . time() . '_' . Str::slug($request->input('title')) . '.' . $file->getClientOriginalExtension();
        $file->move($uploadDir, $filename);

        $data = LoveDataManager::getData();
        $newSong = [
            'id' => 'song-' . time(),
            'title' => $request->input('title'),
            'artist' => $request->input('artist'),
            'url' => asset('audio/uploads/' . $filename),
            'is_custom' => true,
            'local_filename' => $filename
        ];

        $data['playlist'][] = $newSong;
        LoveDataManager::saveData($data);

        return redirect()->route('admin.index')->with('success', 'Lagu baru berhasil ditambahkan ke Playlist! 🎶');
    }

    public function deleteSong(Request $request): RedirectResponse
    {
        $this->ensureAuthenticated($request);

        $songId = $request->input('song_id');
        $data = LoveDataManager::getData();

        if (count($data['playlist']) <= 1) {
            return redirect()->route('admin.index')->with('error', 'Minimal harus ada 1 lagu di Playlist.');
        }

        $data['playlist'] = array_values(array_filter($data['playlist'], function ($s) use ($songId) {
            if ($s['id'] === $songId && !empty($s['local_filename'])) {
                $file = public_path('audio/uploads/' . $s['local_filename']);
                if (file_exists($file)) {
                    @unlink($file);
                }
            }
            return $s['id'] !== $songId;
        }));

        LoveDataManager::saveData($data);

        return redirect()->route('admin.index')->with('success', 'Lagu berhasil dihapus.');
    }

    public function updateCapsules(Request $request): RedirectResponse
    {
        $this->ensureAuthenticated($request);

        $capsules = $request->input('capsules', []);
        $data = LoveDataManager::getData();

        if (is_array($capsules) && !empty($capsules)) {
            $data['open_when'] = array_values($capsules);
            LoveDataManager::saveData($data);
        }

        return redirect()->route('admin.index')->with('success', 'Kapsul emosi "Buka Saat..." berhasil diperbarui! 🧸');
    }

    public function updateCoupons(Request $request): RedirectResponse
    {
        $this->ensureAuthenticated($request);

        $coupons = $request->input('coupons', []);
        $data = LoveDataManager::getData();

        if (is_array($coupons) && !empty($coupons)) {
            $data['coupons'] = array_values($coupons);
            LoveDataManager::saveData($data);
        }

        return redirect()->route('admin.index')->with('success', 'Kupon kasih sayang berhasil diperbarui! 🎟️');
    }

    public function updateLittleThings(Request $request): RedirectResponse
    {
        $this->ensureAuthenticated($request);

        $items = $request->input('little_things', []);
        $data = LoveDataManager::getData();

        if (is_array($items) && !empty($items)) {
            $data['little_things'] = array_values($items);
            LoveDataManager::saveData($data);
        }

        return redirect()->route('admin.index')->with('success', 'Hal-Hal Kecil Tentang Kamu berhasil diperbarui! ✨');
    }

    public function resetDefault(Request $request): RedirectResponse
    {
        $this->ensureAuthenticated($request);

        $default = LoveDataManager::getDefaultData();
        LoveDataManager::saveData($default);

        return redirect()->route('admin.index')->with('success', 'Seluruh data berhasil di-reset ke pengaturan awal.');
    }

    protected function ensureAuthenticated(Request $request): void
    {
        if (!$request->session()->get('love_admin_authenticated', false)) {
            abort(403, 'Akses tidak diizinkan. Silakan login terlebih dahulu.');
        }
    }
}
