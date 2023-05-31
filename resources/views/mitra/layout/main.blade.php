<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grove | {{ $title }} Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    {{-- trix --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"/> --}}
  <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
    
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <!-- Favicon -->
  <link rel="shortcut icon" href="/img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="/css/style.min.css">
    @livewireStyles
    {{-- style --}}
    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }
      
    </style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  </head>
  <body style="background-color: rgb(252, 252, 252)">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>

  

    
{{-- @include('mitra.layout.header')

<div class="container-fluid" >
  <div class="row" >
    @include('mitra.layout.sidebar') --}}
    

    <div class="page-flex">
      <!-- ! Sidebar -->
      <aside class="sidebar">
        <div class="sidebar-start">
            <div class="sidebar-head">
                <a href="/" class="logo-wrapper" title="Home">
                    {{-- <span class="sr-only">Home</span> --}}
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAUAadOacAFiwn5-fZVAHVUwNGoECB_p-1QA&usqp=CAU" style="border-radius:30px" width="50px" class=" me-3" alt="">
                    <div class="logo-text">
                        <span class="logo-title">Grove</span>
                        {{-- <span class="logo-subtitle">Dashboard</span> --}}
                    </div>
    
                </a>
                <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                    <span class="sr-only">Toggle menu</span>
                    <span class="icon menu-toggle" aria-hidden="true"></span>
                </button>
            </div>
            <div class="sidebar-body">
              @can('mitra')
                <ul class="sidebar-body-menu">
                  <span class="system-menu__title">Mitra</span>
                    <li>
                        <a class="{{ Request::is('m/dashboard') ? 'active' : '' }}" href="/m/dashboard"><span data-feather="home" class="me-3" area-hidden="true"></span> Dashboard</a>
                    </li>
                    <li>
                      <a class=" {{ Request::is('m/akun') ? 'active' : '' }}" aria-current="page" href="/m/akun">
                        <span data-feather="user" class="me-3"></span>
                        Akun
                      </a>
                    </li>
                    
                    <li>
                      <a class=" {{ Request::is('m/profil*') ? 'active' : '' }}" aria-current="page" href="/m/profil">
                        <span data-feather="shopping-bag" class="me-3"></span>
                        Profil
            
                      </a>
                    </li>
                    <li>
                      <a class=" {{ Request::is('m/blog*') ? 'active' : '' }}" href="/m/blog">
                        <span data-feather="file-text" class="me-3"></span>
                        Blog
                      </a>
                    </li>  
                    <li>
                      <a class=" {{ Request::is('m/proyek*') ? 'active' : '' }}" href="/m/proyek">
                        <span data-feather="clipboard" class="me-3"></span>
                        Proyek Investasi
                      </a>
                    </li>     
                </ul>
                @endcan
                @can('admin')      
      <ul class="sidebar-body-menu">
        <span class="system-menu__title">Admin</span>
          <a class=" {{ Request::is('a/dashboard') ? 'active' : '' }}" aria-current="page" href="/a/dashboard">
            <span data-feather="home" class="me-3"></span>
            Dashboard
          </a>
        </li>
        <li >
          <a class=" {{ Request::is('a/akun*') ? 'active' : '' }}" aria-current="page" href="/a/akun">
            <span data-feather="user" class="me-3"></span>
            Akun
          </a>
        </li>
        <li>
          <a class="show-cat-btn" href="##">
            <span data-feather="users" class="me-3"></span>Users
              <span class="category__btn transparent-btn" title="Open list">
                  <span class="sr-only">Open list</span>
                  <span data-feather="chevron-down" aria-hidden="true"></span>
              </span>
          </a>
          <ul class="cat-sub-menu">
              <li>
                <a class="{{ Request::is('a/mitra*') ? 'active' : '' }}" href="/a/mitra">
                  <span data-feather="triangle" class="me-3"></span>
                  Mitra
                </a>
              </li>
              <li>
                <a class="{{ Request::is('a/investor*') ? 'active' : '' }}" href="/a/investor">
                  <span data-feather="underline" class="me-3"></span>
                  Investor
                </a>
              </li>
          </ul>
      </li>
        <li >
          <a class=" {{ Request::is('a/blog*') ? 'active' : '' }}" aria-current="page" href="/a/blog">
            <span data-feather="file-text" class="me-3"></span>
            Blog
          </a>
        </li>
        <li >
          <a class=" {{ Request::is('a/proyek*') ? 'active' : '' }}" aria-current="page" href="/a/proyek">
            <span data-feather="clipboard" class="me-3"></span>
          Proyek Investasi
          </a>
        </li>
        <li >
          <a class=" {{ Request::is('a/transaksi*') ? 'active' : '' }}" aria-current="page" href="/a/transaksi">
            <span data-feather="file-plus" class="me-3"></span>
          Transaksi Investasi
          </a>
        </li>
      </ul>
      @endcan
      @can('investor')
      <ul class="sidebar-body-menu">
        <span class="system-menu__title">Investor</span>
        <li >
          <a class="{{ Request::is('a/dashboard') ? 'active' : '' }}" aria-current="page" href="/i/dashboard">
            <span data-feather="home" class="me-3"></span>
            Dashboard
          </a>
        </li>
        <li >
          <a class="{{ Request::is('i/akun*') ? 'active' : '' }}" aria-current="page" href="/i/akun">
            <span data-feather="user" class="me-3"></span>
            Akun
          </a>
        </li>
        <li >
          <a class="{{ Request::is('i/profil*') ? 'active' : '' }}" aria-current="page" href="/i/profil">
            <span data-feather="shopping-bag" class="me-3"></span>
            Mitra
          </a>
        </li>
        <li >
          <a class="{{ Request::is('i/blog*') ? 'active' : '' }}" href="/i/blog">
            <span data-feather="file-text" class="me-3"></span>
            Blog
          </a>
        </li>  
        <li >
          <a class="{{ Request::is('i/proyek*') ? 'active' : '' }}" href="/i/proyek">
            <span data-feather="clipboard" class="me-3"></span>
            Proyek Investasi
          </a>
        </li>  
        <li >
          <a class="{{ Request::is('i/transaksi*') ? 'active' : '' }}" href="/i/transaksi">
            <span data-feather="file-plus" class="me-3"></span>
            Transaksi
          </a>
        </li>  
      </ul>
      @endcan
         
            </div>
        </div>
        <div class="sidebar-footer">
            <a href="" class="sidebar-user">
              <ul class="nav flex-column mb-5">
                <span class="system-menu__title">Auth</span>
                <li class="nav-item">
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link px-3"><span data-feather="log-out" class="me-3" style="color:beige"> </span> Keluar</button>
                  </form> 
                </li>  
              </ul>
            </a>
        </div>
    </aside>
      <div class="main-wrapper">
        <!-- ! Main nav -->
        <nav class="main-nav--bg">
      <div class="container main-nav">
        <div class="main-nav-start">
          <div class="main-nav-start">
            {{-- @if(auth()->user()->role === 'mitra')
  <h5 class="h2">Selamat datang, {{ $nama->nama_usaha }}</h5>
  @elseif(auth()->user()->role === 'investor')
  <h5 class="h2">Selamat datang, {{ $head->name }}</h5>
  @else
  <h5 class="h2">Selamat datang, Admin</h5>
  @endif --}}
          </div>
        </div>
        <div class="main-nav-end">
          <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
            <span class="sr-only">Toggle menu</span>
            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
          </button>
          <div class="">
            
          </div>
          <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
            <span class="sr-only">Switch theme</span>
            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
          </button>
          <div class="notification-wrapper">
            <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
              <span class="sr-only">To messages</span>
              <span class="icon notification active" aria-hidden="true"></span>
            </button>
            <ul class="users-item-dropdown notification-dropdown dropdown">
              <li>
                <a href="##">
                  <div class="notification-dropdown-icon info">
                    <i data-feather="check"></i>
                  </div>
                  <div class="notification-dropdown-text">
                    <span class="notification-dropdown__title">System just updated</span>
                    <span class="notification-dropdown__subtitle">The system has been successfully upgraded. Read more
                      here.</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="notification-dropdown-icon danger">
                    <i data-feather="info" aria-hidden="true"></i>
                  </div>
                  <div class="notification-dropdown-text">
                    <span class="notification-dropdown__title">The cache is full!</span>
                    <span class="notification-dropdown__subtitle">Unnecessary caches take up a lot of memory space and
                      interfere ...</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="##">
                  <div class="notification-dropdown-icon info">
                    <i data-feather="check" aria-hidden="true"></i>
                  </div>
                  <div class="notification-dropdown-text">
                    <span class="notification-dropdown__title">New Subscriber here!</span>
                    <span class="notification-dropdown__subtitle">A new subscriber has subscribed.</span>
                  </div>
                </a>
              </li>
              <li>
                <a class="link-to-page" href="##">Go to Notifications page</a>
              </li>
            </ul>
          </div>
          <div class="nav-user-wrapper">
            <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
              <span class="sr-only">My profile</span>
              <span class="nav-user-img">
              
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">

              </span>
            </button>
            <ul class="users-item-dropdown nav-user-dropdown dropdown">
              <li><a href="##">
                  <i data-feather="user" aria-hidden="true"></i>
                  <span>Profile</span>
                </a></li>
              <li><a href="##">
                  <i data-feather="settings" aria-hidden="true"></i>
                  <span>Account settings</span>
                </a></li>
              <li><a class="danger" href="##">
                  <i data-feather="log-out" aria-hidden="true"></i>
                  <span>Log out</span>
                </a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    {{-- Main --}}
    <main class="container">
      @yield('container')
    </main>

        {{-- <footer class="footer">
      <div class="container footer-flex">
        <div class="footer-start">
          <p>2023 © Grove - <a href="elegant-dashboard.com" target="_blank"
              rel="noopener noreferrer">Kembangan Usahamu Disini    </a></p>
        </div>
        <ul class="footer-end">
          <li><a href="##">About</a></li>
          <li><a href="##">Support</a></li>
          <li><a href="##">Puchase</a></li>
        </ul>
      </div>
    </footer> --}}
      </div>
    </div>
    <!-- Chart library -->
    <script src="./plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
    
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous">
    </script>
    <script src="/js/dashboard.js"></script>
    <script src="/js/script.js"></script>
    @livewireScripts
  </body>
</html>
