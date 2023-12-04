<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;



class PsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select(DB::raw("select * from psikolog"));
        return view('psikolog.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('psikolog.create');
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
            'nama'  => 'required',
            'nip'  => 'required',
            'keahlian' => 'required'
        ]);

        //upload image
        
        DB::insert("INSERT INTO psikolog (id, nama, nip , keahlian) VALUES (uuid(), ?, ?, ?)",
        [$request->nama,$request->nip,$request->keahlian]);
        return redirect()->route('psikolog.index')->with(['success' => 'Data berhasil disimpan!']);
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
        $data=DB::table('psikolog')->where('id' , $id)->first();
        return view('psikolog.edit' , compact('data'));
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
            'id' =>'required',
            'nama' =>'required',
            'nip'=>'required',
            'keahlian'=>'required'
            ]);
            {
            DB::update("UPDATE 'psikolog' SET 'nama'=?,'keahlian'=?,'nip'=? WHERE id=?",
            [$request->nama,$request->keahlian,$request->nip,$id]);
            }
            
            return redirect()->route('psikolog.index')->with(['success'=>'Data Berhasil Diupdate!']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('psikolog')->where('id', $id)->delete();

        //redirect to index
         return redirect()->route('psikolog.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}