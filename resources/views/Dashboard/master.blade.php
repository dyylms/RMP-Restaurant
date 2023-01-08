@include('Dashboard.header')

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url ('home') }}">
        <div class="sidebar-brand-text mx-3">RMP Restaurant</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      @if (auth()->user()->role == "admin")
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="bi bi-person-circle"></i>
          <span>Dashboard Admin</span></a>
      </li>@endif
      @if (auth()->user()->role == "manajer")
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="bi bi-person-circle"></i>
          <span>Dashboard Manajer</span></a>
      </li>@endif
      @if (auth()->user()->role == "kasir")
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="bi bi-person-circle"></i>
          <span>Dashboard Kasir</span></a>
      </li>@endif

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        User
      </div>
      <li class="nav-item active">
        <a class="nav-link">
          <span>{{ auth()->user()->name }}</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Data
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="bi bi-clipboard-data-fill"></i>
          <span>Basic Data</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            @if (auth()->user()->role == "admin")
            <a class="collapse-item" href="{{ route('users.index') }}">Add User</a>
            @endif

            @if (auth()->user()->role == "manajer")
            <a class="collapse-item" href="{{ url('Manajer') }}">Menu</a>
            <a class="collapse-item" href="{{ route('laporan')}}">Laporan</a>
            @endif

            @if (auth()->user()->role == "kasir")
            <a class="collapse-item" href="{{ url ('Kasir')}}">Transaksi</a>
            @endif

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Login -->
      <li class="nav-item">
        <a class="nav-link" href=" {{ route('login') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <br>
        <div class="container">
          <section class="content">
            @yield('content')
          </section>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; RMP | Restaurant Website 2021</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>


  @include('Dashboard.script')

</body>

</html>
