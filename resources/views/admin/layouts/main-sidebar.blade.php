<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Toko</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->nama }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/admin" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-header">Data Master</li>

          <li class="nav-item">
            <a href="/admin/user" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Data User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/slides" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Slide
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/event" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Event
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/admin/barang" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Data Barang
              </p>
            </a>
          </li>

          <li class="nav-header">Transaksi</li>

          <li class="nav-item">
            <a href="/admin/transaksi" class="nav-link">
              <i class="nav-icon far fa-edit"></i>
              <p>
                Data Transaksi
              </p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="/admin/transaksi/detail" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Transaksi Detail
              </p>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>