<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Sarung;

class SarungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $sarungs = Sarung::latest()->paginate(1);
       return view('sarung.index', compact('sarungs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sarung.create');
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
            'name' => 'required',
            'description' => 'required',
            'stok' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg'
        ]);

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath, $name);

        Sarung::create([
        'name'=>$request->get('name'),
        'description'=>$request->get('description'),
        'stok'=>$request->get('stok'),
        'image'=>$name
        ]);
        return redirect()->back()->with('message', 'Sarung
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
        $sarung = Sarung::find($id);
        return view('sarung.edit',compact('sarung'));
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
            'name' => 'required',
            'description' => 'required',
            'stok' => 'required|integer',
            'image' => 'required|mimes:png,jpeg,jpg'

        ]);

        $sarung = Sarung::find($id);
        $name = $sarung->image;
        if($request->hasFile('image')){
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath,$name);
        }
        $sarung->name = $request->get('name');
        $sarung->description = $request->get('description');
        $sarung->stok = $request->get('stok');
        $sarung->image = $name;
        $sarung->save();
        return
        redirect()->route('sarung.index')->with('message','Sarung Telah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sarung = Sarung::find($id);
        $sarung->delete();
        return redirect()->route('sarung.index')->with('message', 'Sarung Berhasil Dihapus');
    }

    public function listSarung(){
         $categories = Category::with('sarung')->get();
        return view('index', compact('categories'));
    }

    public function detailSarung($id){
         $sarung = Sarung::find($id);
         return view('detail', compact('sarung'));
    }
}
