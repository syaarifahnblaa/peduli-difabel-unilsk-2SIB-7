<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;

class konselingController extends Controller
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
            'nama' => 'required',
            'jenis_konseling' => 'required',
            'tanggal' => 'required',
        ]);

        
        DB::insert("INSERT INTO `konseling`(`nama`, `jenis_konseling`,`tanggal`) VALUES (?,?,?)",
        [$request->nama,$request->jenis_konseling,$request->tanggal,]);
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
        $data=DB::table('konseling')->where('id_konseling', $id)->first();
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
            'nama' => 'required',
            'jenis_konseling' => 'required',
            'tanggal' => 'required',
    
        ]);

        //cek update foto atau tidak
    
            DB::update("UPDATE konseling SET `nama`=?,`jenis_konseling`=?,`tanggal`=? WHERE id_konseling=?",
            [$request->nama,$request->jenis_konseling,$request->tanggal,$id]);
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
        DB::table('konseling')->where('id_konseling', $id)->delete();

        //redirect to index
        return redirect()->route('konseling.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}