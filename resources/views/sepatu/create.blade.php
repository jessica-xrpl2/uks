@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }} <a href="{{route('sepatu.index')}}">Lihat data</a>
            </div>
            @endif
            <form action="{{ route('sepatu.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Tambah Sepatu Baru</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi</label>
                            <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror"></textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">harga</label>
                            <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">kategori</label>
                            <select name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach(App\Models\Category::all() as $kategori)
                                <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                                @endforeach
                            </select>
                            @error('kategori')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal">tanggal</label>
                            <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                            @error('tanggal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">gambar</label>
                            <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
                            @error('gambar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-primary mt-3" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection