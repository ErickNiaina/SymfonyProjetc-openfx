<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link d-lg-none" data-widget="pushmenu" href="#"><img src="{{server_url()}}/public/images/openflex.png" alt="Openflex.cloud Logo" class="brand-image img-fluid"
           style="opacity: 0.8; height:33px;margin-top: -7px;"></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">e-RH</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li nav-item>
            <form class="form-inline search">
                <input type="search" class="form-control search__input" name="search" placeholder="Recherche" onload="equalWidth()">
                <button class="search__btn"><i class="fa fa-search"></i></button>
                <i class="fas fa-search search__icon"></i>
            </form>
        </li>
        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown">
            
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="{{server_url()}}/of_ERH/public/images/andry.jpg" class="img-circle img-fluid" style="height:25px; margin-right:5px;vertical-align: top;" alt="User Image"> 
                <span>{{app.user.username}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item dropdown-footer">Mon compte</a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">Déconnexion</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->