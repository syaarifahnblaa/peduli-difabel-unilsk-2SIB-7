<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;



class artikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::select(DB::raw("select * from artikel"));
        return view('artikel.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikel.create');
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
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'due_date'  => 'required',
            'description' => 'required'
        ]);

        //upload image
        $image = $request->file('photo');
        $image->storeAs('public/artikel',$image->hashName());

        DB::insert("INSERT INTO artikel (id , photo, due_date , description) VALUES (uuid(),?,?,?)",
        [$image->hashName(),$request->due_date,$request->description,]);
        return redirect()->route('artikel.index')->with(['success' => 'Data berhasil disimpan!']);
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
        $data=DB::table('artikel')->where('id' , $id)->first();
        return view('artikel.edit' , compact('data'));
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
            'photo' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'due_date' =>'required',
            'description'=>'required'
            ]);
            
            //cek update foto atau tidak
            if($request->file('photo')){
            $image = $request->file('photo');
            $image->storeAs('public/artikel', $image->hashName());
            
            DB::update("UPDATE artikel SET photo=?,due_date=?,description=? WHERE ID=?",
            [$image->hashName(),$request->due_date,$request->description,$id]);
            }else{
            DB::update("UPDATE 'artikel' SET 'due_date'=?,'description'=? WHERE ID=?",
            [$request->due_date,$request->description,$id]);
            }
            return redirect()->route('artikel.index')->with(['success'=>'Data Berhasil Diupdate!']);
            
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('artikel')->where('id', $id)->delete();

        //redirect to index
         return redirect()->route('artikel.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}