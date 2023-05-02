<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <ul class="nav flex-column mb-5">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Auth</span></h6>
        <li class="nav-item">
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-link px-3"><span data-feather="log-out"> </span> Keluar</button>
          </form> 
        </li>  
      </ul>
    @can('mitra')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Mitra</span></h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('m/dashboard') ? 'active' : '' }}" aria-current="page" href="/m/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('m/akun') ? 'active' : '' }}" aria-current="page" href="/m/akun">
            <span data-feather="user" class="align-text-bottom"></span>
            Akun
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('m/profil*') ? 'active' : '' }}" aria-current="page" href="/m/profil">
            <span data-feather="shopping-bag" class="align-text-bottom"></span>
            Profil

          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('m/blog*') ? 'active' : '' }}" href="/m/blog">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Blog
          </a>
        </li>  
        <li class="nav-item">
          <a class="nav-link {{ Request::is('m/proyek*') ? 'active' : '' }}" href="/m/proyek">
            <span data-feather="clipboard" class="align-text-bottom"></span>
            Proyek Investasi
          </a>
        </li>  
      </ul>
      @endcan
      
      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Admin</span></h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('a/dashboard') ? 'active' : '' }}" aria-current="page" href="/a/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('a/akun*') ? 'active' : '' }}" aria-current="page" href="/a/akun">
            <span data-feather="user" class="align-text-bottom"></span>
            Akun
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link">
            <span data-feather="users" class="align-text-bottom"></span>
            Users
          </a>
        </li> 
        <li class="nav-item ms-4">
          <a class="nav-link {{ Request::is('a/mitra*') ? 'active' : '' }}" href="/a/mitra">
            <span data-feather="triangle" class="align-text-bottom"></span>
            Mitra
          </a>
        </li> 
        <li class="nav-item ms-4">
          <a class="nav-link {{ Request::is('a/investor*') ? 'active' : '' }}" href="/a/investor">
            <span data-feather="underline" class="align-text-bottom"></span>
            Investor
          </a>
        </li> 
        {{-- <li class="nav-item">
          <a class="nav-link {{ Request::is('a/profil*') ? 'active' : '' }}" aria-current="page" href="/a/profil">
            <span data-feather="shopping-bag" class="align-text-bottom"></span>
            Profil Mitra
          </a>
        </li> --}}
        <li class="nav-item">
          <a class="nav-link {{ Request::is('a/blog*') ? 'active' : '' }}" aria-current="page" href="/a/blog">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Blog
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('a/proyek*') ? 'active' : '' }}" aria-current="page" href="/a/proyek">
            <span data-feather="clipboard" class="align-text-bottom"></span>
          Proyek Investasi
          </a>
        </li>
      </ul>
      @endcan

      @can('investor')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Investor</span></h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('a/dashboard') ? 'active' : '' }}" aria-current="page" href="/i/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('i/akun*') ? 'active' : '' }}" aria-current="page" href="/i/akun">
            <span data-feather="user" class="align-text-bottom"></span>
            Akun
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('i/profil*') ? 'active' : '' }}" aria-current="page" href="/i/profil">
            <span data-feather="shopping-bag" class="align-text-bottom"></span>
            Mitra
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('i/blog*') ? 'active' : '' }}" href="/i/blog">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Blog
          </a>
        </li>  
        <li class="nav-item">
          <a class="nav-link {{ Request::is('i/proyek*') ? 'active' : '' }}" href="/i/proyek">
            <span data-feather="clipboard" class="align-text-bottom"></span>
            Proyek Investasi
          </a>
        </li>  
      </ul>
      @endcan

      
   
    </div>
  </nav>


