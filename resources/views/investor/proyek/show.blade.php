@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Proyek Investasi | {{ $proyek->nama_proyek }}</h1>
</div>
<div class="mb-3">
<a href="/i/proyek" class="btn btn-info me-2"> <span data-feather="arrow-left"></span> Kembali</a>  
{{-- <a href="/i/proyek/{{ $proyek->id }}/edit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning me-2"><span data-feather="edit-2"> </span> Edit status</a>  --}}
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
            <p class="text-muted mb-0">{{ $proyek->nominal}}</p>
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
      </div>
    </div>
  </div>

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
  @endsection()