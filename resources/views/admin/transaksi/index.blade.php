@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Grove Transaksi Investasi</h1>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-9" role="alert">
    {{ session('success') }}
  </div>
  @endif
<div class="container mt-5 mb-3">
    <div class="row">
        @if (count($details)>0)
        @foreach($details as $detail)
        <div class="col-md-4">
            <div class="card p-3 mb-2">
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                        <div class="ms-2 c-details">
                            <h6 class="mb-0">{{ $detail->proyek->mitra->nama_usaha }}</h6> <span>Rp{{ $detail->proyek->nominal }}</span>
                        </div>
                    </div>
                    <div class="badge"> <span>Design</span> </div>
                </div>
                <div class="mt-5">
                    <h3 class="heading">{{ $detail->proyek->nama_proyek }}</h3>
                    <div class="mt-5">
                        <div class="mt-3">{{ $detail->proyek->tgl_dibuka }} | {{ $detail->proyek->tgl_ditutup }}</div>
                        <div class="position-absolute bottom-0 end-0">
                        <a href="/a/transaksi/{{ $detail->transaksi->id }}" class="btn btn-outline-success btn-sm m-2 me-3">Lihat</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
        @else
        <div class="position-absolute top-50 start-50"><h3 class="text-muted">Belum ada Transaksi Investasi</h3></div>
        @endif
        


    </div>
</div>
@endsection()