@extends('mitra.layout.main')

@section('container')
<section>

    <div class="container py-5">
      @if(session()->has('success'))
      <div class="alert alert-success col-lg-9" role="alert">
        {{ session('success') }}
      </div>
      @endif
        <a href="/i/akun/{{ $investor->id }}/edit" class="btn btn-warning me-2 mb-3"><span data-feather="edit-2"> </span> Edit</a>  
      <div class="row">
        <div class="col-lg-4 ">
          <div class="card mb-4" >
            <div class="card-body text-center">
              @if ($investor->image)
                  
              <img src="{{ asset('storage/' . $investor->image) }}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px; height:150px">
              @else
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
                  
              @endif

                
              <h5 class="my-3">{{ $investor->user->name }}</h5>
              <p class="text-muted mb-3">{{ $investor->user->email }}</p>
              <a href="" type="button" class="btn btn-primary mb-4" >{{ $investor->user->role }}</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6" >
          <div class="card mb-4" >
            <div class="card-body">
              {{-- <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama usaha</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->nama_usaha }}</p>
                </div>
              </div>
              <hr> --}}
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->user->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->user->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">No Hp</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->no_hp }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Provinsi</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->province->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Kabupaten</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->regency->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Kecamatan</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->district->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Desa</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->village->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Alamat</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->alamat }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">No rekening</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $investor->norek }}</p>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        {{-- <div class="row">
            <div class="col-md-6">
              <div class="card mb-4 mb-md-0">
                <div class="card-body">
                  <p class="mb-4"><h4>Foto KTP</h4></p>
                 
                </div>
              </div>
            </div>
       
      </div> --}}
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4 mb-md-0">
            <div class="card-body">
              <p class="mb-4"><h4>Foto KTP</h4></p>
              <a href="/i/ktp/{{ $investor->id }}/edit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="badge bg-warning"><span data-feather="edit-2"></span></a> 
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Foto KTP</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="row justify-content-center">
                      <form method="post" action="/i/ktp/{{ $investor->id }}" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                          <div class="mb-3">
                            {{-- <label for="image" class="form-label"></label> --}}
                            <input type="hidden" name="oldImage" value="{{ $investor->fotoKTP }}">
                            @if($investor->fotoKTP)
                            <img src="{{ asset('storage/'. $investor->fotoKTP) }}" class="img-preview d-block img-fluid mt-3 mb-3 col-sm-5" alt="">
                            @else
                            <img class="img-preview img-fluid mb-3 col-sm-5" alt="">
                            @endif
                            <input class="form-control @error('fotoKTP') is-invalid @enderror" type="file" id="image" name="fotoKTP" onchange="previewImage()">
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

              <img src="{{ asset('storage/' . $investor->fotoKTP) }}" class="img-fluid mt-3 rounded">
            </div>
          </div>
        </div>
   
  </div>
    </div>
  </section>
@endsection()