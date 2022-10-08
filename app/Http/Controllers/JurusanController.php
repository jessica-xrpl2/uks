<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;


class JurusanController extends Controller
{
    /**        
     * Display a listing of the resource.
     *                                           
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $jurusans = Jurusan::latest()->get();
        return view('jurusan.index', compact('jurusans'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jurusan.create');
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

        Jurusan::create([
            'name' => $request->get('name')
        ]);
        return redirect()->back()->with('message', 'Jurusan berhasil ditambahkan');
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
        $jurusan = Jurusan::find($id);
        return view('jurusan.edit', compact('jurusan'));
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
        
        $jurusan = Jurusan::find($id);
        $jurusan->name = $request->get('name');
        $jurusan->save();
        return redirect()->route('jurusan.index')->with('message', 'jurusan berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('message', 'jurusan berhasil dihapus');
    }
}
