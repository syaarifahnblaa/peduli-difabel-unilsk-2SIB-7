<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = DB::select("SELECT * FROM jadwals ORDER BY created_at DESC");
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwal.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jadwal = Jadwal::create([
            'judul_seminar' => $request->judul_seminar,
            'deskripsi' => $request->deskripsi,
            'tanggal_seminar' => $request->tanggal_seminar
        ]);
        if ($jadwal) {
            return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('jadwal.index')->with(['erorr' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwal = Jadwal::find($id);
        return view('jadwal.update', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'judul_seminar' => $request->judul_seminar,
            'deskripsi' => $request->deskripsi,
            'tanggal_seminar' => $request->tanggal_seminar
        ]);
        if ($jadwal) {
            return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Di Update!']);
        } else {
            return redirect()->route('jadwal.index')->with(['error' => 'Data Gagal Di Update!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        if ($jadwal) {
            return redirect()->route('jadwal.index')->with(['success' => 'Data Berhasil Di Hapus!']);
        } else {
            return redirect()->route('jadwal.index')->with(['error' => 'Data Gagal Di Hapus!']);
        }
    }
}
