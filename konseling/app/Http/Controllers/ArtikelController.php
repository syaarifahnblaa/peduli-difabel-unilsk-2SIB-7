<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $artikel = DB::select("SELECT * FROM artikels ORDER BY created_at DESC");
        return view('artikel.index', compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artikel.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $foto = $request->file('gambar');
        $foto->storeAs('public/artikel', $foto->hashName());
        $artikel = Artikel::create([
            'gambar' => $foto->hashName(),
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal

        ]);
        if ($artikel) {
            return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('artikel.index')->with(['erorr' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('artikel.update', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        if ($request->file('gambar') == "") {
            $artikel->update([
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal
            ]);
        } else {
            storage::disk('local')->delete('public/artikel/' . $artikel->gambar);
            $foto = $request->file('gambar');
            $foto->storeAs('public/artikel', $foto->hashName());
            $artikel->update([
                'gambar' => $foto->hashName(),
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal
            ]);
        }
        if ($artikel) {
            return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Di Update!']);
        } else {
            return redirect()->route('artikel.index')->with(['error' => 'Data Gagal Di Update!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        if ($artikel) {
            return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Di Hapus!']);
        } else {
            return redirect()->route('artikel.index')->with(['error' => 'Data Gagal Di Hapus!']);
        }
    }
}
