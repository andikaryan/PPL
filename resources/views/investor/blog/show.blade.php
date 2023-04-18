@extends('mitra.layout.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-1">{{ $blog->judul }}</h2>
            <a href="/m/blog/" class="btn btn-default me-2 mb-5"> {{ $blog->mitra->nama_usaha }}</a>  <br>
            <a href="/i/blog/" class="btn btn-info me-2"> <span data-feather="arrow-left"></span> Kembali</a>  
            {{-- <form action="/m/blog/{{ $blog->slug }}" method="blog" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('anda yakin ingin menghapus?')"><span data-feather="trash"></span> Hapus</button>
              </form>   --}}
            <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid mt-3">
            <article class="my-3 fs-5">
            {!! $blog->body !!}
            </article>
        </div>
    </div>
</div>

@endsection()