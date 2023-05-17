@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Proyek Investasi | {{ $detail->proyek->nama_proyek }}</h1>
</div>
 <div class="mb-3">
<a href="/i/transaksi" class="btn btn-info me-2"> <span data-feather="arrow-left"></span> Kembali</a>  

</div>
<div class="col-lg-6" >
    <div class="card mb-4" >
      <div class="card-body">
        <p class="d-flex"><h4>Proyek </h4> <h5>{{ $detail->proyek->mitra->nama_usaha }}</h5></p>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0 mt-3">Nama Proyek</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0 mt-3">{{ $detail->proyek->nama_proyek }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Nominal</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">Rp{{ $detail->proyek->nominal}}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Deskripsi</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $detail->proyek->deskripsi }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Tanggal Dibuka</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $detail->proyek->tgl_dibuka }}</p>
          </div>
        </div>
        <hr>   
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Tanggal Ditutup</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $detail->proyek->tgl_ditutup }}</p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Tanggal Dana Kembali</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $detail->proyek->tgl_kembali }}</p>
          </div>
        </div> 
        <p class=""><h5>transaksi</h5></p>
        <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">nominal Investasi</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">Rp{{ $detail->transaksi->nominal }}</p>
            </div>
          </div> 
          <hr>
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Status</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $detail->status }}</p>
          </div>
        </div>
        <hr>
        @if ($detail->status != 'dibayar')
        <div class="d-flex justify-content-center">
          <a href="/i/transaksi/{{ $detail->transaksi->id }}/edit" class="btn btn-warning me-2"> Edit</a>  
        </div>
        @endif
      </div>
    </div>
  </div>


  
  @endsection()