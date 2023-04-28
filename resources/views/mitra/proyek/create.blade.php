@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Membuat Proyek Baru</h1>
</div>
<div class="col-lg-8">
    <form method="post" action="/m/proyek">
      @csrf
      <div class="mb-3">
        <label for="nominal" class="form-label">Nama Proyek</label>
        <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror" id="nama_proyek" name="nama_proyek" required autofocus value="{{ old('nama_proyek') }}">
        @error('nama_proyek')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <small><p>dana yang diperlukan</p></small>
        <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" required value="{{ old('nominal') }}">
        @error('nominal')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      <div class="mb-3">
        <label for="deskripsi">deskripsi</label>
        <input id="deskripsi" type="hidden" name="deskripsi" required value="{{ old('deskripsi') }}">
        <trix-editor input="deskripsi"></trix-editor>
        @error('deskripsi')
        <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-3 ">
        <label for="tgl_dibuka" class="form-label">Tanggal Dibuka</label>
        <input type="date" class="form-control @error('tgl_dibuka') is-invalid @enderror" id="tgl_dibuka" name="tgl_dibuka" required value="{{ old('tgl_dibuka') }}">
        @error('tgl_dibuka')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 ">
        <label for="tgl_ditutup" class="form-label">Tanggal Ditutup</label>
        <input type="date" class="form-control @error('tgl_ditutup') is-invalid @enderror" id="tgl_ditutup" name="tgl_ditutup" required value="{{ old('tgl_ditutup') }}">
        @error('tgl_ditutup')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3 ">
        <label for="tgl_kembali" class="form-label">Tanggal Dana Kembali</label>
        <input type="date" class="form-control @error('tgl_kembali') is-invalid @enderror" id="tgl_kembali" name="tgl_kembali" required value="{{ old('tgl_kembali') }}">
        @error('tgl_kembali')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary mb-3">Simpan</button>
      <a href="/m/proyek" class="btn btn-danger mb-3">Kembali</a>
    </form>
  </div>
@endsection()