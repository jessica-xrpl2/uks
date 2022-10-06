@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
            @endif
            <form action="{{ route('sepatu.update', [$sepatu->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">Update Sepatu</div>

                <div class="card-body">
                        <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" name="nama" value="{{$sepatu->name}}" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="deskripsi">Description</label>
                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" value="{{$sepatu->deskripsi}}"></textarea>
                        @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="harga">Price</label>
                        <input type="number" name="harga"
                        class="form-control" value="{{$sepatu->price}}" @error('harga') is-invalid @enderror">
                        @error('harga')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="kategori">Category</label>
                        <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach(App\Models\Category::all() as $category)
                            <option value="{{$category->id}}"
                            @if($category->id==$sepatu->category_id) selected @endif>{{$category->name}}
                            </option>
                            @endforeach
                            </select>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                        @error('tanggal')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        

                        <div class="form-group">
                        <label for="gambar">Image</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                        @error('gambar')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                        <button class="btn btn-outline-primary mt-3"
                        type="submit">Submit</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
