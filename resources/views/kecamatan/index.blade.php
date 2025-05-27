@extends('layouts.app')
@section('content')
    <div class="card">
      <div class="card-header">
        Data Kecamatan
      </div>
      <div class="card-content p-3">
        @session('success')
          <div class="alert alert-success" role="alert">
            {{ session('success')}}
          </div>
        @endsession

        <div class="col-12 text-start">
          <a href="{{ route('kecamatan.create') }}" class="btn btn-primary">Tambah</a>
        </div>

        <div class="table-responsive mt-3 mb-3">
          <table class="table table-bordered table-striped datatable">
            <thead>
              <tr class="text-start">
                <th style="width: 20px;">No</th>
                <th style="width: 100px;">Kode</th>
                <th>Nama Kecamatan</th>
                <th style="width: 50px;">Active</th>
                <th style="width: 150px;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $item)
                  <tr class="align-top">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode }}</td>
                    <td>{{ $item->nama }}</td>
                    <td class="text-center">
                      <div class="form-check text-center">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @if($item->is_active) checked @endif disabled  >
                        
                      </div>
                    </td>
                    <td class="gap-2 d-flex">
                      <a href="{{ route('kecamatan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('kecamatan.destroy', $item->id) }}" method="post">
                        @method('delete')
                        @csrf

                        <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
@endsection