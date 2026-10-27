  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.index') }}" class="nav-link">Dashboard</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" target="_blank" class="nav-link" title="Open public booking website">
          <i class="fas fa-external-link-alt mr-1"></i> Visit Website
        </a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Toggle Fullscreen">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <!-- Admin Logout -->
      <li class="nav-item">
        <a class="nav-link text-danger font-weight-bold" href="{{ route('admin.logout') }}"
           onclick="event.preventDefault(); document.getElementById('admin-nav-logout-form').submit();"
           role="button" title="Sign out of Admin Portal">
          <i class="fas fa-sign-out-alt mr-1"></i> Logout
        </a>
        <form id="admin-nav-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->