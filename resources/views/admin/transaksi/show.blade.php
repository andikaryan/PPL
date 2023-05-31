@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Proyek Investasi | {{ $detail->proyek->nama_proyek }}</h1>
</div>
 <div class="mb-3">
<a href="/a/transaksi" class="btn btn-info me-2"> <span data-feather="arrow-left"></span> Kembali</a>  

</div>
<div class="d-flex ">
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
              <p class="mb-0">Investor</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $detail->transaksi->investor->user->name }}</p>
            </div>
          </div> 
          <hr>
        <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">nominal Investasi</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">Rp{{ $detail->transaksi->nominal }}</p>
            </div>
          </div> 
          <hr>
          @if($detail->status == 'dibayar')
          <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nominal Pengembalian</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">Rp{{ $pengembalian }}</p>
              </div>
            </div> 
          <hr>
          @endif
        <div class="row">
          <div class="col-sm-3">
            <p class="mb-0">Status</p>
          </div>
          <div class="col-sm-9">
            <p class="text-muted mb-0">{{ $detail->status }}</p>
          </div>
        </div>
        <hr>
        <p class="mb-0">Bukti Pembayaran</p>
        <img src="{{ asset('storage/' . $detail->transaksi->image) }}" class="img-fluid mb-3 mt-3 rounded">
        <div class="d-flex justify-content-center">
            <a  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning me-2"><span data-feather="edit-2"> </span> Ubah status</a> 
        </div>
      </div>
    </div>
  </div>
  
</div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Status Transaksi Investasi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
          <form method="post" action="/a/transaksi/{{$detail->id}}">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" name="status">  
                @if (old('status', $detail->status) == 'dibayar')
                <option value="{{ $detail->status }}">Dibayar</option>
                <option value="diproses">Diproses</option>
                <option value="gagal">gagal</option> 
                <option value="selesai">selesai</option> 
                @elseif (old('status', $detail->status) == 'gagal')
                <option value="{{ $detail->status }}">Gagal</option>
                <option value="diproses">Diproses</option>
                <option value="dibayar">Dibayar</option>                
                <option value="selesai">selesai</option> 
                @elseif (old('status', $detail->status) == 'selesai')
                <option value="{{ $detail->status }}">selesai</option>
                <option value="diproses">Diproses</option>
                <option value="dibayar">Dibayar</option>                
                <option value="gagal">gagal</option> 
                @else
                <option value="{{ $detail->status }}">Diproses</option>
                <option value="dibayar">Dibayar</option>
                <option value="gagal">gagal</option> 
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