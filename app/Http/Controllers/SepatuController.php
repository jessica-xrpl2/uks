<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Sepatu;

class SepatuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sepatus = Sepatu::latest()->paginate(1);
       return view('sepatu.index', compact('sepatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sepatu.create');
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
            'deskripsi' => 'required',
            'harga' => 'required',
            'kategori' => 'required',
            'tanggal' =>'required',
            'gambar' => 'required|mimes:png,jpeg,jpg'
        ]);

        $image = $request->file('gambar');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath, $name);

        Sepatu::create([
        'name'=>$request->get('nama'),
        'description'=>$request->get('deskripsi'),
        'price'=>$request->get('harga'),
        'category_id'=>$request->get('kategori'),
        'tanggal'=>$request->get('tanggal'),
        'image'=>$name
        ]);
        return redirect()->back()->with('message', 'Sendal
        berhasil dititipkan');
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
        $sepatu = Sepatu::find($id);
        return view('sepatu.edit',compact('sepatu'));
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
            'deskripsi' => 'required',
            'harga' => 'required|integer',
            'kategori' => 'required',
            'tanggal'=>'required',
            'gambar' => 'mimes:png,jpg,jpeg'
        ]);

        $sepatu = Sepatu::find($id);
        $name = $sepatu->image;
        if($request->hasFile('gambar')){
        $image = $request->file('gambar');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath,$name);
        }
        $sepatu->name = $request->get('nama');
        $sepatu->description = $request->get('deskripsi');
        $sepatu->price = $request->get('harga');
        $sepatu->category_id = $request->get('kategori');
        $sepatu->tanggal = $request->get('tanggal');
        $sepatu->image = $name;
        $sepatu->save();
        return
        redirect()->route('sepatu.index')->with('message','Sepatu Telah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sepatu = Sepatu::find($id);
        $sepatu->delete();
        return redirect()->route('sepatu.index')->with('message', 'Sepatu Berhasil Dihapus');
    }

    public function listSepatu(){
         $categories = Category::with('sepatu')->get();
        return view('index', compact('categories'));
    }

    public function detailSepatu($id){
         $sepatu = Sepatu::find($id);
         return view('detail', compact('sepatu'));
    }
}
