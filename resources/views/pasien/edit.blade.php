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
            <form action="{{ route('pasiekn.update', [$pasien->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">Update Pasien</div>

                <div class="card-body">
                        <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" name="nama" value="{{$pasien->name}}" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>

                         <div class="form-group">
                        <label for="kelas">Category</label>
                        <select name="kelas" class="form-control @error('kelas') is-invalid @enderror">
                            <option value="">Pilih kelas</option>
                            @foreach(App\Models\Kelas::all() as $category)
                            <option value="{{$kelas->id}}"
                            @if($kelas->id==$pasien->kelas_id) selected @endif>{{$kelas->name}}
                            </option>
                            @endforeach
                            </select>
                            @error('kelas')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror">
                            <option value="">Pilih Kategori</option>
                            @foreach(App\Models\Jurusan::all() as $jurusan)
                            <option value="{{$jurusan->id}}"
                            @if($jurusan->id==$pasien->jurusan_id) selected @endif>{{$jurusan->name}}
                            </option>
                            @endforeach
                            </select>
                            @error('jurusan')
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
