<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select(DB::raw("select * from seminar"));
        return view('seminar.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('seminar.create');
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
            'judul'=> 'required',
            'tanggal' => 'required',
            ]);
            
            
            
            DB::insert("INSERT INTO `seminar` (`id`, `judul`, `tanggal`) VALUES (uuid(), ?, ?)",
            [$request->judul,$request->tanggal]);
            return redirect()->route('Seminar.index')->with(['success' => 'Data berhasil Disimpan!']);
        
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
        $data = DB::table('seminar')->where('id', $id)->first();

        return view('seminar.edit', compact('data'));
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
            'judul'=> 'required',
            'tanggal' => 'required',
            ]);

            DB::update("UPDATE seminar SET judul=?,tanggal=? WHERE id=?",
            [$request->judul,$request->tanggal, $id]);
        
        return redirect()->route('Seminar.index')->with(['success' => 'Data Berhasil Diupdate']);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('seminar')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('Seminar.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}