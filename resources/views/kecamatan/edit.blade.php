@extends('layouts.app')
@section('content')
    <div class="card">
      <div class="card-header">
        Edit Kecamatan
      </div>
      <div class="card-content p-3">
        <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="post">
          @csrf
          @method('PUT')
          
          <div class="mb-3">
            <label for="kode" class="form-label required">Kode Kecamatan</label>
            <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode', $kecamatan->kode) }}"  placeholder="Masukkan Kode Kecamatan" required>
            @error('kode')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="nama" class="form-label required">Nama Kecamatan</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $kecamatan->nama) }}" placeholder="Masukkan Nama Kecamatan" required>
            @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="is_active" class="form-label required">Status</label> <br>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="is_active" id="is_active1" value="1" @if($kecamatan->is_active === 1) checked @endif>
              <label class="form-check-label" for="is_active1">
                Active
              </label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="is_active" id="is_active2" value="0"  @if($kecamatan->is_active === 0) checked @endif>
              <label class="form-check-label" for="is_active2">
                Not Active
              </label>
            </div>
            @error('is_active')
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