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
            <form action="{{ route('mukena.update', [$mukena->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
            <div class="card">
                <div class="card-header">Update Mukena</div>

                <div class="card-body">
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$mukena->name}}" class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"  value="{{$mukena->description}}">{{$mukena->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="number" name="stok"
                        class="form-control" value="{{$mukena->stok}}" @error('stok') is-invalid @enderror">
                        @error('stok')
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        
                        

                        <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{$mukena->image}}">
                        @error('image')
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
