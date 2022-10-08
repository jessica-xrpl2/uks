@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }} <a href="{{route('jurusan.index')}}">Lihat data</a>
            </div>
            @endif

            <form action="{{ route('jurusan.store') }}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header">Halaman Jurusan</div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class=" mt-3 btn btn-outline-primary">Submit</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection