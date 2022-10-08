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
            <div class="card">

                <div class="card-header">All Kelas
                  <span class="float-end">
                    <a href="{{ route('jurusan.create') }}">
                      <button class="btn btn-outline-secondary">Tambah Jurusan</button>
                    </a>
                  </span>
                </div>

                <div class="card-body">
                    {{-- @foreach ($jurusans as $jurusan)
                        <p>{{ $jurusan->name }}</p>
                    @endforeach --}}

                    <table class="table">
                        <thead class="table-dark">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>

                            @if(count($jurusans)>0)
                            @foreach ($jurusans as $key=>$jurusan)

                          <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $jurusan->name }}</td>
                            <td>
                                <a href="{{ Route('jurusan.edit', [$jurusan->id]) }}">
                                    <button class="btn btn-outline-success">Edit</button>
                                </a>
                            </td>
                            <td>
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$jurusan->id}}">
    Delete
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$jurusan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form
        action="{{route('jurusan.destroy',[$jurusan->id])}}"
        method="post">
        @csrf
        {{method_field('DELETE')}}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda Yakin ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-danger">Delete</button>
        </div>
      </div>
        </form>
    </div>
  </div>
                            </td>
                          </tr>
                          @endforeach
                          @else
                          <td>Tidak ada Jurusan yang dapat ditampilkan.</td>
                          @endif
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
