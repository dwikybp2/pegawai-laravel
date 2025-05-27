@extends('layouts.app')
@section('content')
    <div class="card">
      <div class="card-header">
        Edit Kelurahan
      </div>
      <div class="card-content p-3">
        <form action="{{ route('kelurahan.update', $kelurahan->id) }}" method="post">
          @csrf
          @method('PUT')
          
          
          <div class="mb-3">
            <label for="kecamatan_id" class="form-label required">Kecamatan</label>
            <select name="kecamatan_id" id="kecamatan_id" class="form-control @error('kecamatan_id') is-invalid @enderror" required>
              <option value="">-- Pilih Kecamatan --</option>
              @foreach ($parKecamatan as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
            </select>
            @error('kecamatan_id')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="kode" class="form-label required">Kode Kelurahan</label>
            <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror" value="{{ old('kode', $kelurahan->kode) }}"  placeholder="Masukkan Kode Kelurahan" required>
            @error('kode')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="nama" class="form-label required">Nama Kelurahan</label>
            <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $kelurahan->nama) }}" placeholder="Masukkan Nama Kelurahan" required>
            @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          
          <div class="mb-3">
            <label for="is_active" class="form-label required">Status</label> <br>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="is_active" id="is_active1" value="1" @if($kelurahan->is_active === 1) checked @endif>
              <label class="form-check-label" for="is_active1">
                Active
              </label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="is_active" id="is_active2" value="0"  @if($kelurahan->is_active === 0) checked @endif>
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