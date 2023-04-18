@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Grove Blog</h1>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-9" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <section id="gallery">
    <div class="container">
      <div class="row">
        @if(is_null($blog))
            <h1>Belum ada blog</h1>
        @else
        @foreach ($blog as $item)
        <div class="col-lg-4 mb-4">
            <div class="card">
              <img src="{{ asset('storage/' . $item->image) }}" alt="" class="card-img-top img-fluid">
              <div class="card-body">
                <h5 class="card-title">{{ $item->judul }}</h5>
                <p class="card-title text-muted">{{ $item->mitra->nama_usaha }}</p>
                <p class="card-text">{{ $item->excerpt }}</p>
               <a href="/a/blog/{{ $item->id }}" class="btn btn-outline-success btn-sm">Read More</a>
               <form action="/a/blog/{{ $item->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-outline-danger btn-sm ms-1" onclick="return confirm('anda yakin ingin menghapus?')"><span data-feather="trash"></span></button>
              </form>  
              </div>
             </div>
            </div>
        @endforeach
        @endif
        

      
    </div>
  </div>
  </section>
  
@endsection()