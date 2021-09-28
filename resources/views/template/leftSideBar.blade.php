 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <router-link to="/" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </router-link>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <router-link to="dashboard"  class="nav-link ">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="dataset"  class="nav-link ">
                  <i class="fas fa-database"></i>
                  <p>Dataset</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/model"  class="nav-link">
                  <i class="fas fa-calculator"></i>
                  <p>Model</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/hasilModel"  class="nav-link">
                  <i class="fas fa-calculator"></i>
                  <p>Hasil Pengujian Model</p>
                </router-link>
              </li>
              <li class="nav-item">
                <router-link to="/prediksi"  class="nav-link">
                  <i class="fas fa-chart-line"></i>
                  <p>
                    Prediksi & Grafik Data
                  </p>
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
