@extends('mitra.layout.main')

@section('container')

@if(session()->has('alert'))
  <div class="alert alert-success col-lg-9" role="alert">
    {{ session('alert') }}
  </div>
  @endif
{{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}

@endsection()