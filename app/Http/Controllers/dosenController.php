<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;



class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select(DB::raw("select * from dosen"));
        return view('dosen.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
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
            'prodi'  => 'required',
            'description' => 'required'
        ]);

        //upload image
        
        DB::insert("INSERT INTO dosen (id, nama, prodi , description) VALUES (uuid(), ?, ?, ?)",
        [$request->nama,$request->prodi,$request->description]);
        return redirect()->route('dosen.index')->with(['success' => 'Data berhasil disimpan!']);
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
        $data=DB::table('dosen')->where('id' , $id)->first();
        return view('dosen.edit' , compact('data'));
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
            'prodi'=>'required',
            'description'=>'required'
            ]);
            {
            DB::update("UPDATE 'dosen' SET 'nama'=?,'description'=?,'prodi'=? WHERE id=?",
            [$request->nama,$request->description,$request->prodi,$id]);
            }
            
            return redirect()->route('dosen.index')->with(['success'=>'Data Berhasil Diupdate!']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('dosen')->where('id', $id)->delete();

        //redirect to index
         return redirect()->route('dosen.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}