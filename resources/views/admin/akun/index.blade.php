@extends('mitra.layout.main')

@section('container')
<section>
    <div class="container py-5">
      @if(session()->has('success'))
<div class="alert alert-success col-lg-9" role="alert">
  {{ session('success') }}
</div>
@endif
        <a href="/a/akun/{{ $user->id }}/edit" class="btn btn-warning me-2 mb-3"><span data-feather="edit-2"> </span> Edit</a>  
      <div class="row">
        {{-- <div class="col-lg-4 ">
          <div class="card mb-4" >
            
          </div>
        </div> --}}
        <div class="col-lg-6" >
          <div class="card mb-4" >
            <div class="card-body">
              <div class="card-body text-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                  class="rounded-circle img-fluid" style="width: 150px;">
                <h5 class="my-3">{{ $user->name }}</h5>
                <p class="text-muted mb-3">{{ $user->email }}</p>
                <a href="" type="button" class="btn btn-primary mb-4" >{{ $user->role }}</a>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nama</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->name }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Role</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">{{ $user->role }}</p>
                </div>
              </div>
              {{-- <div class="row">
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
               --}}
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
      
    </div>
  </section>

@endsection()