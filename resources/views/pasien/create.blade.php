@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }} <a href="{{route('pasien.index')}}">Lihat data</a>
            </div>
            @endif
            <form action="{{ route('pasien.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">Tambah Pasien Baru</div>

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
                            <label for="kelas">kelas</label>
                            <select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                                <option value="">Pilih Kelas</option>
                                @foreach(App\Models\Kelas::all() as $kelas)
                                <option value="{{$kelas->id}}">{{$kelas->name}}</option>
                                @endforeach
                            </select>
                            @error('kelas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jurusan">jurusan</label>
                            <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                                <option value="">Pilih Kategori</option>
                                @foreach(App\Models\Jurusan::all() as $jurusan)
                                <option value="{{$jurusan->id}}">{{$jurusan->name}}</option>
                                @endforeach
                            </select>
                            @error('jurusan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- <div class="card-body"> -->
                        <div class="form-group">
                            <label for="kondisi">kondisi</label>
                            <input type="text" name="kondisi" class="form-control @error('kondisi') is-invalid @enderror">
                            @error('kondisi')
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
                            <button class="btn btn-outline-primary mt-3" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection