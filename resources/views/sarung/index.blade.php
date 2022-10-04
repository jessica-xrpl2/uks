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
        <div class="card-header">Semua Sarung
          <span class="float-end">
            <a href="{{ route('sarung.create') }}">
              <button class="btn btn-outline-secondary">Tambah Sarung</button>
            </a>
          </span>
        </div>
        <div class="card-body">
          <table class="table table-responsive">
            <thead class="table-dark">
              <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Stok</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>

              @if(count($sarungs)>0)
              @foreach ($sarungs as $key=>$sarung)

              <tr>
                <td><img src="{{ asset('image') }}/{{ $sarung->image}}" width="100" alt=""></td>
                <td>{{$sarung->name}}</td>
                <td>{{$sarung->description}}</td>
                <td>{{$sarung->stok}}</td>
                
                <td>
                  <a href="{{ route('sarung.edit', [$sarung->id]) }}"><button class="btn btn-outline-success">Edit</button>
                  </a>
                </td>

                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$sarung->id}}">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$sarung->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="{{route('sarung.destroy',[$sarung->id])}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah yakin?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Apakah Kamu Yakin?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-outline-danger">Ya</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
              @else
              <td>Tidak ada Kategori yang dapat ditampilkan.</td>
              @endif
            </tbody>
          </table>
          {{ $sarungs->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection