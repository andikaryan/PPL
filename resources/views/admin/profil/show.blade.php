@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Grove Profil | {{ $mitra->nama_usaha }}</h1>
  </div>
  <a href="/a/mitra" class="btn btn-danger me-2 mb-4"> <span data-feather="arrow-left"></span> Kembali</a>  
  <div class="row justify-content-center">
    {{-- <div class="col-lg-4 ">
      <div class="card mb-4" >
        
      </div>
    </div> --}}
    <div class="col-lg-6" >
      <div class="card mb-4" >
        <div class="card-body">
          <div class="card-body text-center">
            @if ($mitra->image)
                  
              <img src="{{ asset('storage/' . $mitra->image) }}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px; height:150px">
              @else
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
                  
              @endif
            <h5 class="my-3">{{ $mitra->nama_usaha }}</h5>
            <p class="text-muted mb-3">{{ $mitra->bio }}</p>
            {{-- <a href="" type="button" class="btn btn-primary mb-4" >{{ $mitra->bio }}</a> --}}
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Nama Usaha</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $mitra->nama_usaha }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Email</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $mitra->user->email }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">No Hp</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $mitra->no_hp }}</p>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-sm-3">
              <p class="mb-0">Alamat</p>
            </div>
            <div class="col-sm-9">
              <p class="text-muted mb-0">{{ $mitra->village->name }}, {{ $mitra->district->name }}, 
                {{ $mitra->regency->name }},{{ $mitra->province->name }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-5 border-bottom">
        <h1 class="h3">Proyek Investasi </h1>
      </div>
      <div class="container mt-5 mb-3">

        <div class="row">
            @if (count($proyeks)>0)
            @foreach($proyeks as $proyek)
            @if ( $proyek->status == 'rilis')
            <div class="col-md-4">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                            <div class="ms-2 c-details">
                                <h6 class="mb-0">{{ $proyek->mitra->nama_usaha }}</h6> <span>Rp{{ $proyek->nominal }}</span>
                            </div>
                        </div>
                        {{-- <div class="badge"> <span>Design</span> </div> --}}
                    </div>
                    <div class="mt-5">
                        <h3 class="heading">{{ $proyek->nama_proyek }}</h3>
                        <div class="mt-5">
                            <div class="mt-3">{{ $proyek->tgl_dibuka }} | {{ $proyek->tgl_ditutup }}</div>
                            <div class="position-absolute bottom-0 end-0">
                            <a href="/a/proyek/{{ $proyek->id }}" class="btn btn-outline-success btn-sm m-2 me-3">Lihat</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @else
            <div class=""><h3 class="text-muted">Belum ada Proyek Investasi</h3></div>
            @endif  
        </div>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-5 border-bottom">
        <h1 class="h3">Blog </h1>
      </div>
      <section id="gallery">
        <div class="container">
          <div class="row">
            @foreach ($blog as $item)
            <div class="col-lg-4 mb-4">
                <div class="card">
                  <img src="{{ asset('storage/' . $item->image) }}" alt="" class="card-img-top img-fluid">
                  <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-title text-muted">{{ $item->mitra->nama_usaha }}</p>
                    <p class="card-text">{{ $item->excerpt }}</p>
                   <a href="/a/blog/{{ $item->id }}" class="btn btn-outline-success btn-sm">Read More</a>
                    {{-- <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a> --}}
                  </div>
                 </div>
                </div>
            @endforeach
    
          
        </div>
      </div>
      </section>
</div>
@endsection()