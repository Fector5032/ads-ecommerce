<?php 
    if (isset($_GET['page']) && $_GET['page'] == "password") {
        $carrito = False;
    } else {
        $carrito = True;
    }
?>
<div class="header-bg">
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo container-->
                <div class="logo">
                    <a href="index.html" class="logo">
                        <img src="static/images/zs-small.png" alt="" class="logo-small">
                        <img src="static/images/zoo-shop-logo.png" alt="" class="logo-large">
                    </a>
                </div>
                <!-- End Logo container-->

                <div class="menu-extras topbar-custom">

                    <ul class="navbar-right list-inline float-right mb-0">

                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <form role="search" class="app-search">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" placeholder="Buscar..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </li>

                        <li class="dropdown notification-list list-inline-item">
                        	<?php if (2 == 3) { ?>
	                            <div class="dropdown notification-list nav-pro-img">
	                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
	                                    <img src="static/images/users/user-4.jpg" alt="user" class="rounded-circle">
	                                </a>
	                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
	                                    <!-- item-->
	                                    <a class="dropdown-item" href="?page=perfil"><i class="mdi mdi-account-circle"></i> Mi Perfil</a>
	                                    <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power text-danger"></i>Cerrar sesión</a>
	                                </div>
	                            </div>
                        	<?php } else { ?>
	                            <div class="dropdwon notification-list nav-pro-img">
                                    <button type="button" class="btn btn-warning btn-icon" data-toggle="modal" data-target="#Login">
                                        <span class="btn-icon-label"><i class="mdi mdi-login mr-2"></i></span> Iniciar Sesión
                                    </button>
                                    <a href="index.php?page=registro" class="btn btn-info btn-icon">
                                        <span class="btn-icon-label"><i class="mdi mdi-login mr-2"></i></span> Registro
                                    </a>   
                                </div>
                            <?php } ?>
                        </li>

    
                        <li class="menu-item list-inline-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle nav-link">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </li>

                    </ul>
                </div>
                <!-- end menu-extras -->

                <div class="clearfix"></div>

            </div> <!-- end container -->
        </div>
        <!-- end topbar-main -->


        <!-- MENU Start -->
        <div class="navbar-custom">
            <div class="container-fluid">
                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">

                        <li class="has-submenu">
                            <a href="index.php"><i class="ion ion-md-home"></i>Inicio</a>
                        </li>

                        <li class="has-submenu">
                            <a href="?page=catalogo"><i class="ion ion-md-basket"></i>Productos</a>
                        </li>

                        <li class="has-submenu">
                            <a href="?page=pedidos"><i class="fas fa-shipping-fast"></i>Mis pedidos</a>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="ion ion-md-contact"></i>Contacto</a>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="ion ion-md-business"></i>Quienes somos</a>
                        </li>

                    </ul>
                    <!-- End navigation menu -->
                </div> <!-- end #navigation -->
            </div> <!-- end container -->
        </div> <!-- end navbar-custom -->
    </header>
    <!-- End Navigation Bar-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">
                                <?php 
                                    if (isset($_GET['page'])) {
                                        if ($_GET['page'] == 'password') {
                                            echo "Recuperar ".$_GET['page'];
                                        } else {
                                            if ($_GET['page'] == "envio") {
                                                echo "Envío y pago";
                                            } else {
                                                if ($_GET['page'] == "pago") {
                                                    echo "Confirmación";
                                                } else {
                                                    echo ucfirst($_GET['page']);
                                                }
                                            }
                                        }
                                    } else {
                                        echo "Inicio";
                                    }
                                ?>
                            </h4>
                        </div>
                        <div class="col-sm-6">
                            <div class="float-right d-none d-md-block">
                                <div class="dropdown">
                                    <?php if (isset($_GET['page']) && $_GET['page'] == 'carrito') { ?>
                                        <a href="?page=envio" class="btn btn-primary btn-icon">
                                            <span class="btn-icon-label"><i class="far fa-money-bill-alt"></i></span> Proceder al pago
                                        </a>
                                    <?php 
                                        } 

                                        if (isset($_GET['page']) && $_GET['page'] == 'perfil') {
                                    ?>
                                        <a href="index.php" class="btn btn-info btn-icon">
                                            <span class="btn-icon-label"><i class="fas fa-arrow-left mr-2"></i></span> Regresar
                                        </a>
                                        <a href="#" class="btn btn-warning btn-icon">
                                            <span class="btn-icon-label"><i class="fas fa-pencil-alt mr-2"></i></span> Editar perfil
                                        </a>
                                    <?php 
                                        } else { 
                                            if ($carrito === True) {
                                    ?>
                                        <a href="?page=carrito" class="btn btn-success btn-icon">
                                            <span class="btn-icon-label"><i class="ion ion-md-cart mr-2"></i></span> Carrito
                                        </a>
                                    <?php 
                                            }
                                        } 
                                    ?>
                                </div>
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div>
                <!-- end page title -->
            </div> <!-- end col -->
        </div> <!-- end row-->
    </div>
</div>
<div id="Login" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Iniciar sesión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" autocomplete="off">
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" placeholder="example@server.com" id="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" id="password">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success btn-icon">
                            <span class="btn-icon-label"><i class="mdi mdi-login mr-2"></i></span> Iniciar sesión
                        </button>
                    </div>
                </form>
                <div class="mt-4 text-center">
                    <a href="?page=password"><i class="mdi mdi-lock"></i> Olvidaste tu contraseña?</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
