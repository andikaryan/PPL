@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Grove Proyek Investasi</h1>
  </div>
  @if(session()->has('success'))
  <div class="alert alert-success col-lg-9" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <div class="table-responsive col-lg-9">
    @if (count($proyeks)>0)
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Proyek</th>
          <th scope="col">Nominal</th>
          <th scope="col">Status</th>
          <th scope="col" style="width: 110px" >Detail</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach ($proyeks as $proyek)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $proyek->nama_proyek }}</td>
          <td>{{ $proyek->nominal }}</td> 
          <td>{{ $proyek->status   }}</td> 
          <td>
            <a href="/a/proyek/{{ $proyek->id }}" class="badge bg-info"><span data-feather="eye"></span></a> 
            {{-- <a href="/a/proyek/{{ $proyek->id }}/edit" class="badge bg-warning"><span data-feather="edit-2"></span></a>  --}}
            {{-- <form action="/m/proyek/{{ $proyek->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('  anda yakin ingin menghapus?')"><span data-feather="trash"></span></button>
            </form> --}}
            {{-- <a href="" class="badge bg-danger"><span data-feather="trash"></span></a> --}}
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    @else
    <div class="position-absolute top-50 start-50 translate-middle"><h3 class="text-muted">Belum ada Proyek</h3></div>
    @endif
  </div>
  
@endsection()