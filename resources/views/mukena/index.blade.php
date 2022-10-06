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
        <div class="card-header">Semua Mukena
          <span class="float-end">
            <a href="{{ route('mukena.create') }}">
              <button class="btn btn-outline-secondary">Tambah Mukena</button>
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

              @if(count($mukenas)>0)
              @foreach ($mukenas as $key=>$mukena)

              <tr>
                <td><img src="{{ asset('image') }}/{{ $mukena->image}}" width="100" alt=""></td>
                <td>{{$mukena->name}}</td>
                <td>{{$mukena->description}}</td>
                <td>{{$mukena->stok}}</td>
                
                <td>
                  <a href="{{ route('mukena.edit', [$mukena->id]) }}"><button class="btn btn-outline-success">Edit</button>
                  </a>
                </td>

                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$mukena->id}}">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$mukena->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="{{route('mukena.destroy',[$mukena->id])}}" method="post">
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
          {{ $mukenas->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection