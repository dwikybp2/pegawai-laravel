@extends('layouts.app')
@section('content')
    <div class="card">
      <div class="card-header">
        Data Pegawai
      </div>
      <div class="card-content p-3">
        @session('success')
          <div class="alert alert-success" role="alert">
            {{ session('success')}}
          </div>
        @endsession

        <div class="col-12 text-start">
          <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah</a>
        </div>

        <div class="table-responsive mt-3 mb-3">
          <table class="table table-bordered table-striped datatable">
            <thead>
              <tr class="text-start">
                <th style="width: 20px;">No</th>
                <th>Nama Pegawai</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Kelurahan</th>
                <th>Kecamatan</th>
                <th>Provinsi</th>
                <th style="width: 150px;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $item)
                  <tr class="align-top">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->tempat_lahir }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y')}}</td>
                    <td>{{ $item->jenis_kelamin == 1 ? "Pria" : "Wanita" }}</td>
                    <td>{{ $item->agama }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->kelurahan->nama }}</td>
                    <td>{{ $item->kecamatan->nama }}</td>
                    <td>{{ $item->provinsi->nama }}</td>
                    <td class="gap-2 d-flex">
                      <a href="{{ route('pegawai.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                      <form action="{{ route('pegawai.destroy', $item->id) }}" method="post">
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