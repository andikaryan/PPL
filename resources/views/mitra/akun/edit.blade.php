@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit akun</h1>
  </div>

  <div class="col-lg-8">
  <form method="post" action="/m/akun/{{ $mitra->id }}" enctype="multipart/form-data">
    @method('put')
    @csrf
    
    <div class="mb-3">
        <label for="image" class="form-label">Foto Profil</label>
        <input type="hidden" name="oldImage" value="{{ $mitra->image }}">
        @if($mitra->image)
        <img src="{{ asset('storage/'. $mitra->image) }}" class="img-preview d-block img-fluid mt-3 mb-3 col-sm-5" alt="">
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
      <label for="nama_usaha" class="form-label">Nama Usaha</label>
      <input type="text" class="form-control @error('nama_usaha') is-invalid @enderror" id="nama_usaha" name="nama_usaha" required autofocus value="{{ old('nama_usaha',$mitra->nama_usaha) }}">
      @error('nama_usaha')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Nama Pemilik</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required value="{{ old('name',$mitra->user->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email',$mitra->user->email) }}">
        @error('email')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="no_hp" class="form-label">No Hp</label>
        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" required value="{{ old('no_hp',$mitra->no_hp) }}">
        @error('no_hp')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">password</label>
        <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  >
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="norek" class="form-label">Nomor Rekening</label>
        <input type="text" class="form-control @error('norek') is-invalid @enderror" id="norek" name="norek" required value="{{ old('norek',$mitra->norek) }}">
        @error('norek')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      @livewire('select')
      
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat',$mitra->alamat) }}">
        @error('alamat')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    <button type="submit" class="btn btn-primary mb-3">Simpan</button>
    <a href="/m/akun" class="btn btn-danger mb-3">Kembali</a>
  </form>
</div>


<script> 



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