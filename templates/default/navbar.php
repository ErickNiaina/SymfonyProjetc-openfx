<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link d-lg-none" data-widget="pushmenu" href="#"><img src="{{server_url()}}/of_ERH/public/images/openflex.png" alt="Openflex.cloud Logo" class="brand-image img-fluid" style="opacity: 0.8; height:33px;margin-top: -7px;"></a>
        </li>
        <li class="nav-item d-none d-sm-none d-md-inline-block">
            <a href="#" class="nav-link active">e-RH</a>
        </li>
        <li class="nav-item d-none d-sm-none d-md-inline-block">
            <a href="/" class="nav-link">Accueil</a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <!-- <img src="../template/img/user.png" class="img-circle img-fluid" style="height:25px; margin-right:5px;vertical-align: top;" alt="User Image"> -->
                <i class="fas fa-user"></i> &nbsp;
                <span>admin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!--  <a href="#" class="dropdown-item dropdown-footer">Mon compte</a> -->
                <div class="dropdown-divider"></div>
                <a href="../../user/logout.php" class="dropdown-item dropdown-footer">Déconnexion</a>
            </div>
        </li>
        <li class="nav-item d-xl-none d-lg-none d-md-none">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
</nav>