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
        <div class="card-header">Data Pasien
          <span class="float-end">
            <a href="{{ route('pasien.create') }}">
              <button class="btn btn-outline-secondary">Tambah Pasien</button>
            </a>
          </span>
        </div>
        <div class="card-body">
          <table class="table table-responsive">
            <thead class="table-dark">
              <tr>
                
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>

              @if(count($pasiens)>0)
              @foreach ($pasiens as $key=>$pasien)

              <tr>
                
                <td>{{$pasien->nama}}</td>
                <td>{{$pasien->kelas->name}}</td>
                <td>{{$pasien->jurusan->name}}</td>
                <td>{{$pasien->kondisi}}</td>
                <td>{{$pasien->tanggal}}</td>
                <td>
                  <a href="{{ route('pasien.edit', [$pasien->id]) }}"><button class="btn btn-outline-success">Edit</button>
                  </a>
                </td>

                <td>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$pasien->id}}">
                    Delete
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal{{$pasien->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="{{route('pasien.destroy',[$pasien->id])}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apa anda yakin?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            Apakah kamu yakin untuk menghapus data?
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
              <td>Tidak ada data yang dapat ditampilkan.</td>
              @endif
            </tbody>
          </table>
          {{ $pasiens-> links() }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection