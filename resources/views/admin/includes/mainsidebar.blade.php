  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.index') }}" class="brand-link">
      <img src="{{ asset('/AriaTheme/images/logo.svg') }}" alt="Bus-Book Logo" class="brand-image" style="opacity: .8">
      <span class="brand-text font-weight-light">Bus-Book Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">
          <img src="{{ asset('/bower_components/admin-lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="Admin Avatar">
        </div>
        <div class="info">
          <a href="{{ route('admin.index') }}" class="d-block font-weight-bold">{{ Auth::check() ? Auth::user()->name : 'Administrator' }}</a>
          <span class="badge badge-success text-xs"><i class="fas fa-check-circle"></i> Admin</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- User Management -->
          <li class="nav-item">
            <a href="{{ route('admin.users') }}" class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>User Management</p>
            </a>
          </li>

          <!-- Bus Management -->
          <li class="nav-item {{ (request()->routeIs('admin.show.buslist*') || request()->routeIs('admin.bus.add*') || request()->routeIs('admin.edit.bus*') || request()->routeIs('admin.view.bus*')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->routeIs('admin.show.buslist*') || request()->routeIs('admin.bus.add*') || request()->routeIs('admin.edit.bus*') || request()->routeIs('admin.view.bus*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-bus"></i>
              <p>
                Bus Management
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.show.buslist') }}" class="nav-link {{ request()->routeIs('admin.show.buslist*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Buses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.bus.add') }}" class="nav-link {{ request()->routeIs('admin.bus.add*') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Bus</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header mt-3">SESSION</li>

          <!-- Logout -->
          <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('admin-sidebar-logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
            <form id="admin-sidebar-logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
