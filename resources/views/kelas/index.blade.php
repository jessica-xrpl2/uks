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
                    <a href="{{ route('kelas.create') }}">
                      <button class="btn btn-outline-secondary">Tambah Kelas</button>
                    </a>
                  </span>
                </div>

                <div class="card-body">
                    {{-- @foreach ($kelass as $kelas)
                        <p>{{ $kelas->name }}</p>
                    @endforeach --}}

                    <table class="table">
                        <thead class="table-dark">
                          <tr>
                            <th scope="col">no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>

                            @if(count($kelass)>0)
                            @foreach ($kelass as $key=>$kelas)

                          <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $kelas->name }}</td>
                            <td>
                                <a href="{{ Route('kelas.edit', [$kelas->id]) }}">
                                    <button class="btn btn-outline-success">Edit</button>
                                </a>
                            </td>
                            <td>
                            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$kelas->id}}">
    Delete
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$kelas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form
        action="{{route('kelas.destroy',[$kelas->id])}}"
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
                          <td>Tidak ada Kelas yang dapat ditampilkan.</td>
                          @endif
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
