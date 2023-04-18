@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Grove Blog</h1>
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
               <a href="/i/blog/{{ $item->id }}" class="btn btn-outline-success btn-sm">Read More</a>
                {{-- <a href="" class="btn btn-outline-danger btn-sm"><i class="far fa-heart"></i></a> --}}
              </div>
             </div>
            </div>
        @endforeach

      
    </div>
  </div>
  </section>
  
@endsection()