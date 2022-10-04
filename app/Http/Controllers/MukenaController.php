<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Mukena;

class MukenaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $mukenas = Mukena::latest()->paginate(1);
       return view('mukena.index', compact('mukenas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mukena.create');
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
            'stok' => 'required|integer',
            'image' => 'required|mimes:png,jpeg,jpg'
        ]);

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath, $name);

        Mukena::create([
        'name'=>$request->get('name'),
        'description'=>$request->get('description'),
        'stok'=>$request->get('stok'),
        'image'=>$name
        ]);
        return redirect()->back()->with('message', 'Mukena
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
        $mukena = Mukena::find($id);
        return view('mukena.edit',compact('mukena'));
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
            'image'=> 'required|mimes:png,jpeg,jpg'

        ]);

        $mukena = Mukena::find($id);
        $name = $mukena->image;
        if($request->hasFile('image')){
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath,$name);
        }
        $mukena->name = $request->get('name');
        $mukena->description = $request->get('description');
        $mukena->stok = $request->get('stok');
        $mukena->image = $name;
        $mukena->save();
        return
        redirect()->route('mukena.index')->with('message','Mukena Telah Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mukena = Mukena::find($id);
        $mukena->delete();
        return redirect()->route('mukena.index')->with('message', 'Mukena Berhasil Dihapus');
    }

    public function listMukena(){
         $categories = Category::with('mukena')->get();
        return view('index', compact('categories'));
    }

    public function detailMukena($id){
         $mukena = Mukena::find($id);
         return view('detail', compact('mukena'));
    }
}
