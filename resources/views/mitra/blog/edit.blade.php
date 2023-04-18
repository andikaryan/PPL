@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Blog</h1>
  </div>

  <div class="col-lg-8">
  <form method="post" action="/m/blog/{{ $blog->slug }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="judul" class="form-label">Judul</label>
      <small><p>Ini Judul</p></small>
      <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul',$blog->judul) }}">
      @error('judul')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <small><p>ini-judul</p></small>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug',$blog->slug) }}">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Upload Gambar</label>
      <input type="hidden" name="oldImage" value="{{ $blog->image }}">
      @if($blog->image)
      <img src="{{ asset('storage/'. $blog->image) }}" class="img-preview d-block img-fluid mt-3 mb-3 col-sm-5" alt="">
      @else
      <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
      @endif
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="body">Body</label>
      <input id="body" type="hidden" name="body" required value="{{ old('body',$blog->body) }}">
      <trix-editor input="body"></trix-editor>
      @error('body')
      <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary mb-3">Simpan</button>
    <a href="/m/blog" class="btn btn-danger mb-3">Kembali</a>
  </form>
</div>

<script> 
const judul = document.querySelector('#judul');
const slug = document.querySelector('#slug');

title.addEventListener('change', function(){
 fetch('/m/blog/checkSlug?title=' + judul.value)
 .then(response => response.json())
 .then(data => slug.value = data.slug)
});

document.addEventListener('trix-file-accept',function(e){
  e.preventDefault();
})

function previewImage(){
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview')

  imgPreview.style.display = 'block';

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
}
</script>
@endsection()