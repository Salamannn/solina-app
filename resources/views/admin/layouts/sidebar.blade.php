<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-secondary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
      <img src="{{ asset('img/logoUtama.png') }}" alt="logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
      <span class="brand-text font-weight-light">Solina Group</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
              data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
              <li class="nav-item">
                  <a href="" class="nav-link">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{route ('portfolios.index')}}" class="nav-link">
                      <div class="row">
                          <div class="col-2">
                              <i class="nav-icon fa-solid fa-briefcase"></i>
                          </div>
                          <div class="col-10">
                              <p>Project</p>
                          </div>
                      </div>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="" class="nav-link">
                      <div class="row">
                          <div class="col-2">
                              <i class="nav-icon fas fa-comment"></i>
                          </div>
                          <div class="col-10">
                              <p>Testimoni</p>
                          </div>
                      </div>
                  </a>
              </li>

              {{-- <li class="nav-item">
                  <a href="" class="nav-link">
                      <div class="row">
                          <div class="col-2">
                              <i class="nav-icon fas fa-user-plus"></i>
                          </div>
                          <div class="col-10">
                              <p>Akun Admin</p>
                          </div>
                      </div>
                  </a>
              </li> --}}
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
