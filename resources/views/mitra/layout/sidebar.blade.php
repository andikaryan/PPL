<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"> <span>Mitra</span></h6>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('m/dashboard') ? 'active' : '' }}" aria-current="page" href="/m/dashboard">
            <span data-feather="home" class="align-text-bottom"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('m/blog*') ? 'active' : '' }}" href="/m/blog">
            <span data-feather="file-text" class="align-text-bottom"></span>
            Blog
          </a>
        </li>  
      </ul>
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
          <a class="nav-link {{ Request::is('a/users*') ? 'active' : '' }}" href="/a/users">
            <span data-feather="user" class="align-text-bottom"></span>
            Users
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
        {{-- <li class="nav-item">
          <a class="nav-link {{ Request::is('a/users*') ? 'active' : '' }}" href="/a/users">
            <span data-feather="user" class="align-text-bottom"></span>
            Users
          </a>
        </li>   --}}
      </ul>
      @endcan
    </div>
  </nav>