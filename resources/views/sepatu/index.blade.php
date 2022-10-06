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
        <div class="card-header">Semua Sepatu
          <span class="float-end">
            <a href="{{ route('sepatu.create') }}">
              <button class="btn btn-outline-secondary">Tambah Sepatu</button>
            </a>
          </span>

          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Button</button>
          </div>

        </div>
        <div class="card-body">
          <table class="table table-responsive">
            <thead class="table-dark">
              <tr>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Harga</th>
                <th scope="col">Kategori</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>

              @if(count($sepatus)>0)
              @foreach ($sepatus as $key=>$sepatu)

              <tr>
                <td><img src="{{ asset('image') }}/{{ $sepatu->image}}" width="100" alt=""></td>
                <td>{{$sepatu->name}}</td>
                <td>{{$sepatu->description}}</td>
                <td>{{$sepatu->price}}</td>
                <td>{{$sepatu->category->name}}</td>
                <td>{{$sepatu->tanggal}}</td>
                <td>
                  <a href="{{ route('sepatu.edit', [$sepatu->id]) }}"><button class="btn btn-outline-success">Edit</button>
                  </a>
                </td>

                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$sepatu->id}}">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$sepatu->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="{{route('sepatu.destroy',[$sepatu->id])}}" method="post">
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
          {{ $sepatus->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection