      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
          <img
            src="vistas/recursos/dist/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
          <span class="brand-text font-weight-light">Cafetería Chimazat</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img
                src="<?php echo $admin["foto"] ?>"
                class="img-circle elevation-2"
                alt="User Image"
              />
            </div>
            <div class="info">
              <a href="#" class="d-block"><?php echo $admin["nombre"] ?></a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input
                class="form-control form-control-sidebar"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul
              class="nav nav-pills nav-sidebar flex-column"
              data-widget="treeview"
              role="menu"
              data-accordion="false"
            >
              <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              <li class="nav-item menu">
                <a href="#" class="nav-link active">
                  <i><ion-icon name="book-sharp"></ion-icon></i>
                  <p>
                    Menu
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="platillos" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Platillos</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="bebidas" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Bebidas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="postres" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Postres</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="carta" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Ver Carta</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i><ion-icon name="cash-sharp"></ion-icon></i>
                  <p>
                    Prueba
                  </p>
                </a>
              </li>
              <li class="nav-item menu">
                <a href="#" class="nav-link">
                  <i><ion-icon name="people-sharp"></ion-icon></ion-icon></i>
                  <p>
                    Gestión de usuarios
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="usuarios" class="nav-link active">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manejo de usuarios</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="roles" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Manejo de Roles</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>