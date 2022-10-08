<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $pasiens = Pasien::latest()->paginate(1);
       return view('pasien.index', compact('pasiens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien.create');
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
            'kelas' => 'required',
            'jurusan' => 'required',
            'kondisi' => 'required',
            'tanggal' =>'required',
           
        ]);

        

        Pasien::create([
        'nama'=>$request->get('nama'),
        'kelas_id'=>$request->get('kelas'),
        'jurusan_id'=>$request->get('jurusan'),
        'kondisi'=>$request->get('kondisi'),
        'tanggal'=>$request->get('tanggal'),
        
        ]);
        return redirect()->back()->with('message', 'Pasien
        berhasil ditambahkan');
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
        $pasien = Pasien::find($id);
        return view('pasien.edit',compact('pasien'));
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
            'kelas' => 'required',
            'jurusan' => 'required|integer',
            'kondisi' => 'required',
            'tanggal'=>'required',
            
        ]);

        $pasien = Pasien::find($id);
       
        $pasien->nama = $request->get('nama');
        $pasien->kelas_id = $request->get('kelas');
        $pasien->jurusan_id = $request->get('jurusan');
        $pasien->kondisi = $request->get('kondisi');
        $pasien->tanggal = $request->get('tanggal');
        $pasien->save();
        return
        redirect()->route('pasien.index')->with('message','Pasien Telah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasien = Pasien::find($id);
        $pasien->delete();
        return redirect()->route('pasien.index')->with('message', 'Pasien Berhasil Dihapus');
    }

    public function listPasien(){
         $kelases = Pasien::with('pasien')->get();
        return view('index', compact('kelases'));
    }

    public function detailPasien($id){
         $pasien = Pasien::find($id);
         return view('detail', compact('pasien'));
    }
}
