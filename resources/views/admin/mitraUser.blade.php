@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">User Mitra</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-9" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="table-responsive col-lg-9">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nama</th>
          <th scope="col">email</th>
          <th scope="col">status</th>
          <th scope="col" style="width: 110px" >Action</th>
          
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
            <a href="/a/users/{{ $user->name }}" class="badge bg-info"><span data-feather="eye"></span></a> 
            <a href="/a/users/{{ $user->name }}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a> 
            <form action="/a/users/{{ $user->name }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('anda yakin ingin menghapus?')"><span data-feather="trash"></span></button>
            </form>
            {{-- <a href="" class="badge bg-danger"><span data-feather="trash"></span></a> --}}
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
          <th scope="col">nama</th>
          <th scope="col">email</th>
          <th scope="col">status</th>
          <th scope="col" style="width: 110px" >Action</th>
          
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
            <a href="/a/users/{{ $user->name }}" class="badge bg-info"><span data-feather="eye"></span></a> 
            <a href="/a/users/{{ $user->name }}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a> 
            <form action="/a/users/{{ $user->name }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('anda yakin ingin menghapus?')"><span data-feather="trash"></span></button>
            </form>
            {{-- <a href="" class="badge bg-danger"><span data-feather="trash"></span></a> --}}
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
  </div>
@endsection()