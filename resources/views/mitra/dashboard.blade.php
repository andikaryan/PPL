@extends('mitra.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  @if(auth()->user()->role === 'mitra')
  <h1 class="h2">Selamat datang, {{ $nama->nama_usaha }}</h1>
  @elseif(auth()->user()->role === 'investor')
  <h1 class="h2">Selamat datang, {{ $head->name }}</h1>
  @else
  <h1 class="h2">Selamat datang, Admin</h1>
  @endif
  
</div>

{{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

@endsection()