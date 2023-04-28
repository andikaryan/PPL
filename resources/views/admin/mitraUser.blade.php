@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">User Mitra</h1>
</div>

{{-- @if(session()->has('success'))
<div class="alert alert-success col-lg-9" role="alert">
  {{ session('success') }}
</div> --}}
@if(session()->has('status'))
<div class="alert alert-success col-lg-9" role="alert">
  {{ session('status') }}
</div>
@endif
<div class="table-responsive col-lg-9">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nama</th>
          <th scope="col">No Hp</th>
          <th scope="col">status</th>
          <th scope="col" style="width: 110px" >Detail</th>
      
        </tr>
      </thead>
      <tbody>
        @foreach ($active as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->nama_usaha }}</td>
          <td>{{ $user->no_hp }}</td>
          <td>{{ $user->status }}</td>
          <td>
            <a href="/a/mitra/{{ $user->id }}" class="badge bg-info"><span data-feather="eye"></span></a> 
            {{-- <a href="/a/mitra/{{ $user->id }}/edit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="badge bg-warning"><span data-feather="edit-2"></span></a>  --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Status Mitra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row justify-content-center">
                    <form method="post" action="/a/mitra/{{$user->id}}">
                      @method('put')
                      @csrf
                      <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status">  
                          @if (old('status', $user->status) == 'active')
                          <option value="{{ $user->status }}">Active</option>
                          <option value="pending">Pending</option>
                          @else
                          <option value="{{ $user->status }}">Pending</option>
                          <option value="active">Active</option> 
                          @endif
                        </select>
                        @error('judul')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                     
                        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                     
                    </form>
                  </div>
                  </div>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
            {{-- <form action="/a/users/{{ $user->name }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('anda yakin ingin menghapus?')"><span data-feather="trash"></span></button>
            </form> --}}
             {{-- <a href="" class="badge bg-danger"><span data-feather="trash"></span></a>  --}}
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
  <div class="table-responsive col-lg-9">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">No HP</th>
          <th scope="col">Status</th>
          <th scope="col" style="width: 110px" >Detail</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($pending as $user)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $user->nama_usaha }}</td>
          <td>{{ $user->no_hp }}</td>
          <td>{{ $user->status }}</td>
          <td>
            <a href="/a/mitra/{{ $user->id }}" class="badge bg-info"><span data-feather="eye"></span></a> 
            {{-- <a href="/a/mitra/{{ $user->id }}/edit" data-bs-toggle="modal" data-bs-target="#exampleModal" class="badge bg-warning"><span data-feather="edit-2"></span></a>  --}}
            <div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Status Mitra</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="row justify-content-center">
                    <form method="post" action="/a/mitra/{{$user->id}}">
                      @method('put')
                      @csrf
                      <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status">  
                          @if (old('status', $user->status) == 'active')
                          <option value="{{ $user->status }}">Active</option>
                          <option value="pending">Pending</option>
                          @else
                          <option value="{{ $user->status }}">Pending</option>
                          <option value="active">Active</option> 
                          @endif
                        </select>
                        @error('judul')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                     
                        <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                     
                    </form>
                  </div>
                  </div>
                  
                </div>
              </div>
            </div>
            {{-- <form action="/a/users/{{ $user->name }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('anda yakin ingin menghapus?')"><span data-feather="trash"></span></button>
            </form> --}}
            {{-- <a href="" class="badge bg-danger"><span data-feather="trash"></span></a> --}}
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
@endsection()