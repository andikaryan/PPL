@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Proyek Investasi | {{ $proyek->nama_proyek }}</h1>
</div>
<div class="mb-3">
<a href="/m/proyek" class="btn btn-info me-2"> <span data-feather="arrow-left"></span> Kembali</a>  
@if ($proyek->status != 'rilis')
<a href="/m/proyek/{{ $proyek->id }}/edit" class="btn btn-warning me-2"><span data-feather="edit-2"> </span> Edit</a> 
@endif
</div>
<div class="col-lg-6" >
    <div class="card mb-4" >
      <div class="card-body">
        <p class=""><h4>Proyek</h4></p>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0 mt-3">Nama Proyek</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0 mt-3">{{ $proyek->nama_proyek }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Nominal</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">Rp{{ $proyek->nominal}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Deskripsi</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $proyek->deskripsi }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Tanggal Dibuka</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $proyek->tgl_dibuka }}</p>
          </div>
        </div>
        <hr>   
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Tanggal Ditutup</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $proyek->tgl_ditutup }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Tanggal Dana Kembali</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $proyek->tgl_kembali }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Status</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $proyek->status }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Dana Masuk</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">Rp{{ $sum }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Dana yang harus dikembalikan</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">Rp{{ $pengembalian }}</p>
          </div>
        </div>
        @if($status)
        @if ($status->status == 'dibayar')
        <div class="d-flex justify-content-center">
          <a class="btn btn-success me-2 mt-5"> Anda sudah Mengembalikan dana investasi</a>  
        </div>
        <p class="mt-3">Bukti Pembayaran</p>
        <img src="{{ asset('storage/' . $status->image) }}" class="img-fluid mt-3 rounded">
        @elseif ($status->status == 'diproses')
        <div class="d-flex justify-content-center">
          <a class="btn btn-success me-2 mt-5"> Pengembalian dana sedang diproses</a>  
        </div>
        <p class="mt-3">Bukti Pembayaran</p>
        <img src="{{ asset('storage/' . $status->image) }}" class="img-fluid mt-3 rounded">
        @elseif ($status->status == 'gagal')
        <p class="mt-5"><h5>Foto yang anda kirim tidak valid, segera perbarui foto!</h5></p>
        <a href="/m/proyek/pengembalian/{{ $proyek->id }}" data-bs-toggle="modal" data-bs-target="#perbarui" class="btn btn-success me-2 "> <span data-feather="arrow-right"></span> Perbarui foto</a>
        <p class="mt-3">Bukti Pembayaran</p>
        <img src="{{ asset('storage/' . $status->image) }}" class="img-fluid mt-3 rounded">
        @endif
        @endif
       @if ($proyek->status == 'selesai' && $status == Null)
       <div class="d-flex justify-content-center">
        <a href="/m/proyek/pengembalian/{{ $proyek->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-success me-2 mt-5"> <span data-feather="arrow-right"></span> Kembalikan dana</a>  
      </div>
       @endif
      </div>
    </div>
    
  </div>

  {{-- upload foto --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Kirim bukti Pembayaran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
          <form method="post" action="/m/proyek/pengembalian" enctype="multipart/form-data">
            {{-- @method('put') --}}
            @csrf
            <div class="mb-3">
              <p> Pastikan anda sudah transfer sejumlah Rp{{ $pengembalian }}!!</p>
              <label for="image" class="form-label">Upload Gambar</label>
              <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
              <input type="text" class="form-control" hidden id="nominal" name="nominal"  value="{{ $pengembalian }}">
              <input type="text" class="form-control" hidden id="proyek_id" name="proyek_id"  value="{{ $proyek->id }}">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required onchange="previewImage()">
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
           
              <button type="submit" onclick="return confirm('Apakah data yang anda masukkan sudah benar ?')" class="btn btn-primary mb-3">Simpan</button>
           
          </form>
        </div>
        </div>
        
      </div>
    </div>
  </div>

  {{-- perbarui --}}
  <div class="modal fade" id="perbarui" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Kirim bukti Pembayaran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
          <form method="post" action="/m/proyek/pengembalian/{{ $status->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <p> Pastikan anda sudah transfer sejumlah Rp{{ $pengembalian }}!!</p>
              <label for="image" class="form-label">Upload Gambar</label>
              <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
              {{-- <input type="text" class="form-control" hidden id="nominal" name="nominal"  value="{{ $pengembalian }}">
              <input type="text" class="form-control" hidden id="proyek_id" name="proyek_id"  value="{{ $proyek->id }}"> --}}
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required onchange="previewImage()">
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
           
              <button type="submit" onclick="return confirm('Apakah data yang anda masukkan sudah benar ?')" class="btn btn-primary mb-3">Simpan</button>
           
          </form>
        </div>
        </div>
        
      </div>
    </div>
  </div>
  @endsection()