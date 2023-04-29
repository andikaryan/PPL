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

  @endsection()