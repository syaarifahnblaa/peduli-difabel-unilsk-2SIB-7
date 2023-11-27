<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use DB;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select (DB::raw("select * from staff"));
        return view('staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.create');
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
            'nama_staff' => 'required',
            'jenis_konseling' => 'required',
            'deskripsi_konseling' => 'required',
        ]);

        
        DB::insert("INSERT INTO `staff` (`nama_staff`, `jenis_konseling`,`deskripsi_konseling`) VALUES (?,?,?)",
        [$request->nama_staff,$request->jenis_konseling,$request->deskripsi_konseling]);
        return redirect()->route('staff.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data=DB::table('staff')->where('id_staff', $id)->first();
        return view('staff.edit', compact('data'));
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
            'nama_staff' => 'required',
            'jenis_konseling' => 'required',
            'deskripsi_konseling' => 'required',
        ]);
    

        //cek update foto atau tidak
    
            DB::update("UPDATE staff SET `nama_staff`=?,`jenis_konseling`=?,`deskripsi_konseling`=? WHERE id_staff=?",
            [$request->nama_staff,$request->jenis_konseling,$request->deskripsi_konseling,$id]);
        return redirect()->route('staff.index')->with(['success' => 'Data Berhasil Diupdate!']); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('staff')->where('id_staff', $id)->delete();

        //redirect to index
        return redirect()->route('staff.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}