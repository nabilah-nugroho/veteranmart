<?php

namespace App\Http\Controllers;

use App\Models\MeetingPoint;
use Illuminate\Http\Request;

class MeetingPointController extends Controller
{
    // menampilkan daftar semua titik temu 
    public function index()
    {
        return view('admin.meeting-points.create');
    }

    //menampilkan form tambah titik temu
    public function create()
    {
        return view ('admin.meeting-points.create');
    }
    // Menyimpan titik temu baru
    public function store(Request $request)
    {
        MeetingPoint::create($this->validated($request));

        return redirect()->route('meeting-points.index')
            ->with('success', 'Titik temu berhasil ditambahkan.');
    }

    // Menampilkan form ubah titik temu
    public function edit(MeetingPoint $meetingPoint)
    {
        return view('admin.meeting-points.edit', compact('meetingPoint'));
    }

    // Menyimpan perubahan titik temu
    public function update(Request $request, MeetingPoint $meetingPoint)
    {
        $meetingPoint->update($this->validated($request));

        return redirect()->route('meeting-points.index')
            ->with('success', 'Titik temu berhasil diperbarui.');
    }

    // Menghapus titik temu
    public function destroy(MeetingPoint $meetingPoint)
    {
        $meetingPoint->delete();

        return redirect()->route('meeting-points.index')
            ->with('success', 'Titik temu berhasil dihapus.');
    }

    // Aturan input yang dipakai bersama oleh tambah dan ubah
    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
        ]);

        // Checkbox yang tidak dicentang tidak terkirim, jadi dianggap tidak aktif
        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}