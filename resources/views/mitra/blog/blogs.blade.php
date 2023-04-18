@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Blog saya</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-9" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="table-responsive col-lg-9">
  <a href="/m/blog/create" class="btn btn-success mb-3"><span data-feather="plus" class="mb-1"></span> Blog Baru</a>
  @if (count($posts)>0)
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Judul</th>
        <th scope="col">Excerpt</th>
        <th scope="col" style="width: 110px" >Action</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $post->judul }}</td>
        <td>{{ $post->excerpt }}</td>
        <td>
          <a href="/m/blog/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a> 
          <a href="/m/blog/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a> 
          <form action="/m/blog/{{ $post->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('  anda yakin ingin menghapus?')"><span data-feather="trash"></span></button>
          </form>
          {{-- <a href="" class="badge bg-danger"><span data-feather="trash"></span></a> --}}
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  @else
  <div class="position-absolute top-50 start-50 translate-middle"><h3 class="text-muted">Belum ada Blog</h3></div>
  
  @endif
    
  </div>

@endsection()