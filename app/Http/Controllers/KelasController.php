<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;


class KelasController extends Controller
{
    /**        
     * Display a listing of the resource.
     *                                           
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $kelass = Kelas::latest()->get();
        return view('kelas.index', compact('kelass'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelas.create');
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
            'name' => 'required'
        ]);

        Kelas::create([
            'name' => $request->get('name')
        ]);
        return redirect()->back()->with('message', 'Kelas berhasil ditambahkan');
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
        $kelas = Kelas::find($id);
        return view('kelas.edit', compact('kelas'));
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
            'name' => 'required'
        ]);
        
        $kelas = Kelas::find($id);
        $kelas->name = $request->get('name');
        $kelas->save();
        return redirect()->route('kelas.index')->with('message', 'kelas berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('message', 'kelas berhasil dihapus');
    }
}
