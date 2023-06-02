@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Proyek Investasi | {{ $proyek->nama_proyek }}</h1>
</div>
@if(session()->has('success'))
  <div class="alert alert-success col-lg-9" role="alert">
    {{ session('success') }}
  </div>
  @endif
<div class="mb-3">
<a href="/a/proyek" class="btn btn-info me-2"> <span data-feather="arrow-left"></span> Kembali</a>  

</div>

<div class="d-flex">
<div class="col-lg-5" >
    <div class="card mb-4" >
      <div class="card-body">
        <p class=""><h4>Proyek</h4></p>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0 mt-3">Nama Proyek</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0 mt-3">{{ $proyek->nama_proyek }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Nominal</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">Rp{{ $proyek->nominal}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Dana Masuk</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">Rp{{ $sum}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Dana Pengembalian</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">Rp{{ $pengembalian}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Deskripsi</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">{{ $proyek->deskripsi }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Tanggal Dibuka</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">{{ $proyek->tgl_dibuka }}</p>
          </div>
        </div>
        <hr>   
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Tanggal Ditutup</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">{{ $proyek->tgl_ditutup }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Tanggal Dana Kembali</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">{{ $proyek->tgl_kembali }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Status</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">{{ $proyek->status }}</p>
          </div>
        </div>
        <div class="d-flex justify-content-center">
        <a href="/a/proyek/{{ $proyek->id }}/edit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning mt-3 me-2"><span data-feather="edit-2"> </span> Ubah status</a> 
      </div>
      </div>
    </div>
  </div>
  @if($kembali)
  <div class="col-lg-4 ms-5">
    <div class="card mb-4" >
      <div class="card-body">
        <p class=""><h4>Dana Pengembalian</h4></p>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Nominal</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">Rp{{ $kembali->nominal}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-4">
            <p class="mb-0">Status</p>
          </div>
          <div class="col-sm-5">
            <p class="text-muted mb-0">{{ $kembali->status }}</p>
          </div>
        </div>
        <hr>
        <p class="mb-0">Bukti Pembayaran</p>
        <img src="{{ asset('storage/' . $kembali->image) }}" class="img-fluid mb-3 mt-3 rounded">
        <div class="d-flex justify-content-center">
            <a  data-bs-toggle="modal" data-bs-target="#pengembalian" class="btn btn-warning me-2"><span data-feather="edit-2"> </span> Ubah status</a> 
        </div>
      </div>
    </div>
  </div>
  @endif
</div>

{{-- edit status proyek --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Status Proyek Investasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
          <form method="post" action="/a/proyek/{{$proyek->id}}">
            @method('put')
            @csrf
            <div class="mb-3">
              {{-- <label for="status" class="form-label">Status</label> --}}
              <select class="form-select" name="status">  
                @if (old('status', $proyek->status) == 'rilis')
                <option value="{{ $proyek->status }}">Rilis</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">selesai</option> 
                @elseif (old('status', $proyek->status) == 'selesai')
                <option value="{{ $proyek->status }}">Selesai</option>
                <option value="diproses">Diproses</option>
                <option value="rilis">Rilis</option>                
                @else
                <option value="{{ $proyek->status }}">Diproses</option>
                <option value="rilis">Rilis</option>
                <option value="selesai">selesai</option> 
                @endif
              </select>
              @error('judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
           
              <button type="submit" class="btn btn-primary mb-3">Simpan</button>
           
          </form>
        </div>
        </div>
        
      </div>
    </div>
  </div>

{{-- edit status pengembalian --}}
  <div class="modal fade" id="pengembalian" tabindex="-1" aria-labelledby="pengembalianLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="pengembalianLabel">Status Dana Pengembalian</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
          <form method="post" action="/a/pengembalian/{{$proyek->id}}">
            @method('put')
            @csrf
            <div class="mb-3">
              @if ($kembali)
              <select class="form-select" name="status">  
                @if (old('status', $kembali->status) == 'dibayar')
                <option value="{{ $kembali->status }}">dibayar</option>
                <option value="diproses">Diproses</option>
                <option value="gagal">gagal</option> 
                @elseif (old('status', $kembali->status) == 'gagal')
                <option value="{{ $kembali->status }}">Gagal</option>
                <option value="diproses">Diproses</option>
                <option value="dibayar">dibayar</option>                
                @else
                <option value="{{ $kembali->status }}">Diproses</option>
                <option value="dibayar">dibayar</option>
                <option value="gagal">gagal</option> 
                @endif
                
              </select>
              @endif
              @error('judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
           
              <button type="submit" class="btn btn-primary mb-3">Simpan</button>
           
          </form>
        </div>
        </div>
        
      </div>
    </div>
  </div>
  @endsection()