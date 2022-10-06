@extends('front.layouts.master')

@section('content');
<br><br><br><br><br><br><br>
<div class="container mt-4">
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Product</div>
                <img src="{{ asset('image') }}/{{ $food->image }}" class="img-responsive" width="353"  alt="">
                
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail</div>
                <div class="card-body">
                    <p><h2>{{ $food->name }}</h2></p>
                    <p class="lead">{{ $food->description }}</p>
                    <p><h4>Rp.{{ $food->price }}</h4></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection