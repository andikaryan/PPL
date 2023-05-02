@extends('mitra.layout.main')

@section('container')
<section>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Grove Profil</h1>
      </div>
    <div class="container py-5">
      @if(session()->has('success'))
<div class="alert alert-success col-lg-9" role="alert">
  {{ session('success') }}
</div>
@endif

        {{-- <a href="/a/akun/{{ $user->id }}/edit" class="btn btn-warning me-2 mb-3"><span data-feather="edit-2"> </span> Ubah Akun</a>   --}}
        <div class="container d-flex">
            @foreach ($mitras as $mitra)
            @if ($mitra->status == 'active')
                
            
            <div class="card p-3 me-4">
                <div class="d-flex ">
                    <div class="image">
                @if($mitra->image)
                <img src="{{ asset('storage/' . $mitra->image) }}" class="rounded" width="150" height="150" >
                @else
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
             width="150 ">
                @endif
                </div>
                <div class="ms-2" style="width: 100px">                   
                   <h4 class="mb-0 mt-0">{{ $mitra->nama_usaha }}</h4>
                   <span>{{ $mitra->user->name }}</span>
                   <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                    <div class="d-flex flex-column">
                        <span class="articles">Blog</span>
                        <span class="number1">{{ count($blogs) }}</span>                    
                    </div>
                    {{-- <div class="d-flex flex-column">
                        <span class="followers">Followers</span>
                        <span class="number2">980</span>                  
                    </div> --}}
                    <div class="d-flex flex-column">
                        <span class="rating">Proyek</span>
                        <span class="number3">{{ count($proyeks) }}</span>                  
                    </div>                   
                   </div>
                   <div class="button mt-2 d-flex flex-row align-items-center">

                    <a href="/i/profil/{{ $mitra->id }}" class="btn btn-outline-success btn-sm w-100">Lihat</a>
                    {{-- <button class="btn btn-sm btn-primary w-100 ml-2">Follow</button>                     --}}
                   </div>
                </div>                    
                </div>                
            </div>   
            @endif          
            @endforeach
         </div>
  </section>

@endsection()