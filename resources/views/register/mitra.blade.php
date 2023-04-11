@extends('layout.home')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">
      

        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center" >Registrasi | Mitra</h1>
            <form action="/m/register" method="post">
                @csrf
                <div class="form-floating">
                    <input type="text" name="nama_usaha" class="form-control rounded-top @error('nama_usaha') is-invalid @enderror" id="nama_usaha" placeholder="Nama usaha" required value="{{ old('nama_usaha') }}">
                    <label for="nama_usaha">Nama Usaha</label>
                    @error('nama_usaha')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>  
             
                <div class="form-floating">
                    <input type="text" name="name" class="form-control @error('nama_pemilik') is-invalid @enderror" id="name" placeholder="Nama Pemilik" required value="{{ old('name') }}">
                    <label for="name">Nama Pemilik</label>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div> 
                <div class="form-floating">
                    <input type="number" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" placeholder="No HP" required value="{{ old('no_hp') }}">
                    <label for="no_hp">No HP</label>
                    @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                    <label for="email">Email</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" required placeholder="Password" >
                    <label for="password">Password</label>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                </div>
              <button class="w-100 btn btn-lg btn-primary" type="submit">Registrasi</button>
              
            </form>
            <a href="/" class="w-100 btn btn-lg btn-danger mt-2">Kembali<a> 
            <small class="mt-2 ">Sudah memiliki akun ? <a href="/login">Login</a></small>
          </main> 
    </div>
</div>

@endsection