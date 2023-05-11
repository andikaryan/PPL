@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kirim Bukti Pembayaran</h1>
  </div>

  <div class="col-lg-8">
  <form method="post" action="/i/transaksi" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="nominal" class="form-label">Nominal</label>
      <small><p> Minimal Rp1.000.000</p></small>
      <div class="input-group mb-3 " >
      <span class="input-group-text">Rp</span>
      <div class="form-floating">
      <input type="text" class="form-control @error('nominal') is-invalid @enderror" id="nominal" name="nominal" required autofocus value="{{ old('nominal') }}">
    </div>
      </div>
      @error('nominal')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <input type="text" hidden class="form-control @error('nominal') is-invalid @enderror" id="proyek_id" name="proyek_id" required autofocus value="{{ $id }}">
      </div>  
    <div class="mb-3">
      <label for="image" class="form-label">Upload Gambar</label>
      <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required onchange="previewImage()">
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary mb-3" onclick="return confirm('Apakah data yang anda masukkan sudah benar ?')">Simpan</button>
    <a href="/i/proyek" class="btn btn-danger mb-3">Kembali</a>
  </form>
</div>

<script> 
// const judul = document.querySelector('#judul');
// const slug = document.querySelector('#slug');

// title.addEventListener('change', function(){
//  fetch('/m/blog/checkSlug?title=' + judul.value)
//  .then(response => response.json())
//  .then(data => slug.value = data.slug)
// });

// document.addEventListener('trix-file-accept',function(e){
//   e.preventDefault();
  
// })

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