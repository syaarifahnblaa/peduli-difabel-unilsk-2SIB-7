<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "ok";
        $data=DB::select(DB::raw("select * from user"));
        return view('user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'nama' =>'required',
            'nim'  =>'required',
            'email' =>'required',
            'jeniskonseling'  =>'required',
            'level'=>'required'
             ]);
            
            // //upload image
            // $image = $request->file('photo');
            // $image->storeAs('public/admmin', $image->hashName());
            
            DB::insert("INSERT INTO user(id, nama,nim,  email, jeniskonseling , level) VALUES (uuid(),?,?,?)",
            [$request->nama,$request->nim,$request->email,$request->jeniskonseling, $request->level]);
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        $data=DB::table('user')->where('id', $id)->first();
        return view('user.edit', compact('data'));
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
            'nama' =>'required',
            'nim'  =>'required',
            'email' =>'required',
            'jeniskonseling'  =>'required',
            'level'=>'required'
             ]);
            
            //  DB::update("UPDATE dosen_7SET ,nama=?,description=?,prodi=? WHERE id=?",
            //  [$image->hashName(),$request->nama,$request->pass,$request->email,$id]);
            // }else
            {
             DB::update("UPDATE user SET nama=?,email=?, pass=? WHERE id=?",
             [$request->nama,$request->nim,$request->email,$request->jeniskonseling, $request->level,$id]);
            }
            return redirect()->route('user.index')->with(['success'=>'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('user')->where('id', $id)->delete();

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}