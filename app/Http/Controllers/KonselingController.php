<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;

class KonselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select (DB::raw("select * from konseling"));
        return view('konseling.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('konseling.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenis_konseling' => 'required',
            'tanggal_konseling' => 'required',
            'nama_konseling' => 'required',
        ]);


        DB::insert("INSERT INTO `konseling`(`id`,`jenis_konseling`, `tanggal_konseling`,`nama_konseling`, ) VALUES (uuid(),?,?,?)",
        [$request->jenis_konseling, $request->tanggal_konseling,$request->nama_konseling]);
        return redirect()->route('konseling.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('konseling')->where('id', $id)->first();
        return view('konseling.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jenis' => 'required',
            'tanggal' => 'required',
            'nama' => 'required',
    
        ]);

        //cek update foto atau tidak
    
            DB::update("UPDATE konseling SET jenis_konseling=?,tanggal_konseling=?,nama_konseling=? WHERE id=?",
            [$request->jenis_konseling,$request->tanggal_konseling,$request->nama_konseling,$id]);
        
        return redirect()->route('konseling.index')->with(['success' => 'Data Berhasil Diupdate!']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('konseling')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('konseling.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}