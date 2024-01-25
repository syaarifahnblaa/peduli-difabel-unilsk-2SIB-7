<?php

namespace App\Http\Controllers;

use App\Models\StaffKonseling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaffKonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff_konseling = DB::select("SELECT * FROM staff_konselings ORDER BY created_at DESC");
        return view('staff_konseling.index', compact('staff_konseling'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff_konseling.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $staff_konseling = StaffKonseling::create([
            'nama'=> $request->nama,
            'jenis_konseling'=> $request->jenis_konseling, 
            'deskripsi_konseling'=> $request->deskripsi_konseling, 
            'tanggal_konseling'=> $request->tanggal_konseling
        ]);
        if ($staff_konseling) {
            return redirect()->route('staff_konseling.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('staff_konseling.index')->with(['erorr' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffKonseling $staffKonseling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $staff_konseling = StaffKonseling::find($id);
        return view('staff_konseling.update', compact('staff_konseling'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $staff_konseling = StaffKonseling::findOrFail($id);
         
            $staff_konseling->update([
                'nama'=> $request->nama,
                'jenis_konseling'=> $request->jenis_konseling, 
                'deskripsi_konseling'=> $request->deskripsi_konseling, 
                'tanggal_konseling'=> $request->tanggal_konseling
            ]);
            if ($staff_konseling) {
                return redirect()->route('staff_konseling.index')->with(['success' => 'Data Berhasil Di Update!']);
            } else {
                return redirect()->route('staff_konseling.index')->with(['error' => 'Data Gagal Di Update!']);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $staff_konseling = StaffKonseling::findOrFail($id);
        $staff_konseling->delete();
        if ($staff_konseling) {
            return redirect()->route('staff_konseling.index')->with(['success' => 'Data Berhasil Di Hapus!']);
        } else {
            return redirect()->route('staff_konseling.index')->with(['error' => 'Data Gagal Di Hapus!']);
        }
    }
}
