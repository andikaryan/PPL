@extends('mitra.layout.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb-5">{{ $post->judul }}</h2>
            <a href="/m/blog/" class="btn btn-info me-2"> <span data-feather="arrow-left"></span> Kembali</a>  
            <a href="/m/blog/{{ $post->slug }}/edit" class="btn btn-warning me-2"><span data-feather="edit-2"> </span> Edit</a>  
            <form action="/m/blog/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('anda yakin ingin menghapus?')"><span data-feather="trash"></span> Hapus</button>
              </form>  
            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3">
            <article class="my-3 fs-5">
            {!! $post->body !!}
            </article>
        </div>
    </div>
</div>

@endsection()