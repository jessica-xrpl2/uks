@extends('admin.layouts.master')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      @if(Session::has('message'))
      <div class="alert alert-success">
        {{ Session::get('message') }}
      </div>
      @endif

      <div class="card">
        <div class="card-header">Semua Sendal
          <span class="float-end">
            <a href="{{ route('food.create') }}">
              <button class="btn btn-outline-secondary">Tambah Sendal</button>
            </a>
          </span>
        </div>
        <div class="card-body">
          <table class="table table-responsive">
            <thead class="table-dark">
              <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Penitip</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>

              @if(count($foods)>0)
              @foreach ($foods as $key=>$food)

              <tr>
                <td><img src="{{ asset('image') }}/{{ $food->image}}" width="100" alt=""></td>
                <td>{{$food->name}}</td>
                <td>{{$food->description}}</td>
                <td>{{$food->price}}</td>
                <td>{{$food->category->name}}</td>
                <td>{{$food->tanggal}}</td>
                <td>
                  <a href="{{ route('food.edit', [$food->id]) }}"><button class="btn btn-outline-success">Edit</button>
                  </a>
                </td>

                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$food->id}}">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$food->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="{{route('food.destroy',[$food->id])}}" method="post">
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
          {{ $foods->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection