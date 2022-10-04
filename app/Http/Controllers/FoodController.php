<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $foods = Food::latest()->paginate(1);
       return view('food.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.create');
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
            'image' => 'required|mimes:png,jpeg,jpg'
        ]);

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath, $name);

        Food::create([
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
        $food = Food::find($id);
        return view('food.edit',compact('food'));
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
            'image' => 'mimes:png,jpg,jpeg'
        ]);

        $food = Food::find($id);
        $name = $food->image;
        if($request->hasFile('image')){
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/image');
        $image->move($destinationPath,$name);
        }
        $food->name = $request->get('nama');
        $food->description = $request->get('deskripsi');
        $food->price = $request->get('harga');
        $food->category_id = $request->get('kategori');
        $food->tanggal = $request->get('tanggal');
        $food->image = $name;
        $food->save();
        return
        redirect()->route('food.index')->with('message','Food
        information updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $food->delete();
        return redirect()->route('food.index')->with('message', 'Food berhasil dihapus');
    }

    public function listFood(){
         $categories = Category::with('food')->get();
        return view('index', compact('categories'));
    }

    public function detailFood($id){
         $food = Food::find($id);
         return view('detail', compact('food'));
    }
}
