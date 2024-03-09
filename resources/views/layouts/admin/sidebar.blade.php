  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="./assets/bpn.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Blanko Sertipikat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Beranda
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/pengajuan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>PENGAJUAN BLANKO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/blanko" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>BLANKO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/ketersediaan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>KETERSEDIAAN</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/users" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>USER</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/tim" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>TIM</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/pengajuan/create" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Input Pengajuan
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>