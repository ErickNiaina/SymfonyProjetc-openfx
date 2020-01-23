<aside class="main-sidebar sidebar-light-primary">
  <!-- Brand Logo -->
  <a href="#" class="brand-link" data-widget="pushmenu">
      <img src="{{server_url()}}/of_ERH/public/images/openflex.png" alt="Openflex.cloud Logo" class="brand-image img-circle" style="opacity: 0.8">
      <span class="brand-text font-weight-light title-text">Openflex</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2 menu-sidebar-left">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
     with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview menu-open">
                  <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>
                          Pointage
                          <i class="right fas fa-angle-left"></i>
                      </p>
                  </a>
                  <ul class="nav nav-treeview sous-menu-sidebar-left">
                      <li class="nav-item">
                          <a href="{{ path('pointage_new') }}" class="nav-link">
                              <i class="far fa-clipboard nav-icon"></i>
                              <p>Nouveau pointage</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ path('pointage_list') }}" class="nav-link">
                              <i class="far fas fa-clipboard-list nav-icon"></i>
                              <p>Liste pointage</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ path('pointage_feuilleTemps') }}" class="nav-link">
                              <i class="far fas fa-history nav-icon"></i>
                              <p>Feuille de temps</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="{{ path('pointage_configuration') }}" class="nav-link">
                              <i class="far fas fa-cog nav-icon"></i>
                              <p>Configuration</p>
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
