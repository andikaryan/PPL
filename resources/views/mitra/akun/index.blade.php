@extends('mitra.layout.main')

@section('container')
<section>
  
    <div class="container py-5">
        <a href="/m/akun/{{ $mitra->id }}/edit" class="btn btn-warning me-2 mb-3"><span data-feather="edit-2"> </span> Ubah Akun</a>  
        @if(session()->has('success'))
<div class="alert alert-success col-lg-9" role="alert">
  {{ session('success') }}
</div>
@endif
      <div class="row">
        <div class="col-lg-4 ">
          <div class="card mb-4" >
            <div class="card-body text-center">
              @if ($mitra->image)
                  
              <img src="{{ asset('storage/' . $mitra->image) }}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px; height:150px">
              @else
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
                  
              @endif
              <h5 class="my-3">{{ $mitra->nama_usaha }}</h5>
              <p class="text-muted mb-3">{{ $mitra->user->email }}</p>
              <a href="" type="button" class="btn btn-primary mb-4" >{{ $mitra->status }}</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6" >
          <div class="card mb-4" >
            <div class="card-body">
              <p class=""><h4>Akun</h4></p>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0 mt-3">Nama usaha</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 mt-3">{{ $mitra->nama_usaha }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama Pemilik</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $mitra->user->name }}</p>
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
                  <p class="mb-0">Bio</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $mitra->bio }}</p>
                </div>
              </div>
              <hr>
              @if($mitra->province_id)
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Provinsi</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $mitra->province->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Kabupaten</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $mitra->regency->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Kecamatan</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $mitra->district->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Desa</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $mitra->village->name }}</p>
                </div>
              </div>
              <hr>
            
              @else
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Provinsi</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">-</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Kabupaten</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">-</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Kecamatan</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">-</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Desa</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">-</p>
                </div>
              </div>
              <hr>
              @endif
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Alamat</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $mitra->alamat }}</p>
                </div>
              </div>
              

              <hr>
              
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">No rekening</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $mitra->norek }}</p>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><h4>Foto KTP</h4></p>
                  <a href="/m/ktp/{{ $mitra->id }}/edit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="badge bg-warning"><span data-feather="edit-2"></span></a> 
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Foto KTP</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <div class="row justify-content-center">
                          <form method="post" action="/m/ktp/{{ $mitra->id }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                              <div class="mb-3">
                                {{-- <label for="image" class="form-label"></label> --}}
                                <input type="hidden" name="oldImage" value="{{ $mitra->fotoKTP }}">
                                @if($mitra->fotoKTP)
                                <img src="{{ asset('storage/'. $mitra->fotoKTP) }}" class="img-preview d-block img-fluid mt-3 mb-3 col-sm-5" alt="">
                                @else
                                <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                                @endif
                                <input class="form-control @error('fotoKTP') is-invalid @enderror" type="file" id="image" name="fotoKTP" required onchange="previewImage()">
                                @error('fotoKTP')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                                @enderror
                              </div>
                            </div>
                           
                              <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                           
                          </form>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <img src="{{ asset('storage/' . $mitra->fotoKTP) }}" class="img-fluid mt-3 rounded">
                </div>
              </div>
            </div>
       
      </div>
      
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
  </section>
@endsection()