@extends('layouts.app')
@section('content')
    <div class="card">
      <div class="card-header">
        Edit Pegawai
      </div>
      <div class="card-content p-3">
        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="post">
          @csrf
          @method('PUT')
        

          <div class="mb-3">
            <label for="nama" class="form-label required">Nama Pegawai</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $pegawai->nama) }}" placeholder="Masukkan Nama Pegawai" required>
            @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          
          <div class="mb-3">
            <label for="tempat_lahir" class="form-label required">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir', $pegawai->tempat_lahir) }}"  placeholder="Masukkan Kode Pegawai" required>
            @error('tempat_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="tanggal_lahir" class="form-label required">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $pegawai->tanggal_lahir) }}"  placeholder="Masukkan Kode Pegawai" required>
            @error('tanggal_lahir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="jenis_kelamin" class="form-label required">Jenis Kelamin</label> <br>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="1"  @if($pegawai->jenis_kelamin == 1) checked @endif >
              <label class="form-check-label" for="jenis_kelamin1">
                Pria
              </label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="2" @if($pegawai->jenis_kelamin == 2) checked @endif >
              <label class="form-check-label" for="jenis_kelamin2">
                Wanita
              </label>
            </div>
            @error('jenis_kelamin')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          
          <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <input type="text" name="agama" id="agama" class="form-control @error('agama') is-invalid @enderror" value="{{ old('agama', $pegawai->agama) }}"  placeholder="Masukkan Kode Pegawai">
            @error('agama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" id="" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat', $pegawai->alamat) }}"></textarea>
            @error('alamat')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          
          <div class="mb-3">
            <label for="kelurahan_id" class="form-label required">Kelurahan</label>
            <select name="kelurahan_id" id="kelurahan_id" class="form-control @error('kelurahan_id') is-invalid @enderror" required>
              <option value="">-- Pilih Kelurahan --</option>
              @foreach ($parKelurahan as $item)
                  <option value="{{ $item->id }}" @if($item->id == $pegawai->kelurahan_id) selected @endif >{{ $item->nama }}</option>
              @endforeach
            </select>
            @error('kelurahan_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          
          <div class="mb-3">
            <label for="kecamatan_id" class="form-label required">Kecamatan</label>
            <select name="kecamatan_id" id="kecamatan_id" class="form-control @error('kecamatan_id') is-invalid @enderror" required>
              <option value="">-- Pilih Kecamatan --</option>
              @foreach ($parKecamatan as $item)
                  <option value="{{ $item->id }}" @if($item->id == $pegawai->kecamatan_id) selected @endif >{{ $item->nama }}</option>
              @endforeach
            </select>
            @error('kecamatan_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          
          
          <div class="mb-3">
            <label for="provinsi_id" class="form-label required">Provinsi</label>
            <select name="provinsi_id" id="provinsi_id" class="form-control @error('provinsi_id') is-invalid @enderror" required>
              <option value="">-- Pilih Provinsi --</option>
              @foreach ($parProvinsi as $item)
                  <option value="{{ $item->id }}" @if($item->id == $pegawai->provinsi_id) selected @endif >{{ $item->nama }}</option>
              @endforeach
            </select>
            @error('provinsi_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>

        </form>
      </div>
    </div>
@endsection