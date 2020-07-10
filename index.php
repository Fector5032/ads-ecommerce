<?php 
    if (isset($_GET['page']) && $_GET['page'] != 'add_product') {
    	session_start(['name' => 'ZooShop_Client']);
    } else {
    	session_start(['name' => 'ZooShop_Client']);
    }

    require_once 'config/config.php';
    require_once 'controllers/productsController.php';
?>
<?php if (isset($_GET['page']) && $_GET['page'] != 'add_product') { ?>
<html>
    <head>
	        <meta charset="utf-8" />
	        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	        <title>Ecommerce</title>
	        <link rel="shortcut icon" href="<?php echo SERVER_URL; ?>static/images/zs-small.png">
	        <link href="<?php echo SERVER_URL; ?>static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	        <link href="<?php echo SERVER_URL; ?>static/css/icons.css" rel="stylesheet" type="text/css">
	        <link href="<?php echo SERVER_URL; ?>static/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<?php } elseif (!isset($_GET['page'])) { ?>
	<html>
    <head>
	        <meta charset="utf-8" />
	        <meta http-equiv="X-UA-Compatible" content="IE=edge">
	        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	        <title>Ecommerce</title>
	        <link rel="shortcut icon" href="<?php echo SERVER_URL; ?>static/images/zs-small.png">
	        <link href="<?php echo SERVER_URL; ?>static/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	        <link href="<?php echo SERVER_URL; ?>static/css/icons.css" rel="stylesheet" type="text/css">
	        <link href="<?php echo SERVER_URL; ?>static/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
<?php
}
            if (isset($_GET['page'])) {
                if (file_exists('views/pages/'.$_GET['page'].'.php')) {
                    if ($_GET['page'] != 'add_product') {
                    	require_once 'views/components/navbar.php'; 
                    	require_once 'views/components/footer.php';
                    }

                    $page = 'views/pages/'.$_GET['page'].'.php';
                } else {
                    $page = 'views/pages/error/404.php';
                }

            } else {
            	// session_start(['name' => 'ZooShop_Client']);

                require_once 'views/components/navbar.php'; 
                require_once 'views/components/footer.php';

                $page = 'views/pages/home.php';
            }
            
            include_once $page;
        
         if (isset($_GET['page']) && $_GET['page'] != 'add_product') { 
?>
	        <!-- jQuery  -->
	        <script src="<?php echo SERVER_URL; ?>static/js/jquery.min.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/bootstrap.bundle.min.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/jquery.slimscroll.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/waves.min.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/jquery.mask.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/masks.js"></script>
	        
	        <!-- App js -->
	        <script src="<?php echo SERVER_URL; ?>static/js/app.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/add_cart.js"></script>
	        <?php if (isset($_GET['page']) && $_GET['page'] == "registro") { ?>
	            <script src="<?php echo SERVER_URL; ?>static/js/register.js"></script>
	        <?php } ?>
	        <?php if (isset($_GET['page']) && $_GET['page'] == "producto") { ?>
	            <script src="<?php echo SERVER_URL; ?>static/js/cart.js"></script>
	        <?php } ?>
	        <script src="<?php echo SERVER_URL; ?>static/js/sweetalert.js"></script>
	        <?php if (isset($_SESSION['nombres'])) { ?>
	        	<script src="<?php echo SERVER_URL; ?>static/js/logout.js"></script>
	        <?php } ?>
    </body>

</html>
	    <?php } elseif (!isset($_GET['page'])) { ?>

			<script src="<?php echo SERVER_URL; ?>static/js/jquery.min.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/bootstrap.bundle.min.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/jquery.slimscroll.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/waves.min.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/jquery.mask.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/masks.js"></script>
	        
	        <!-- App js -->
	        <script src="<?php echo SERVER_URL; ?>static/js/app.js"></script>
	        <script src="<?php echo SERVER_URL; ?>static/js/add_cart.js"></script>
	        <?php if (isset($_GET['page']) && $_GET['page'] == "registro") { ?>
	            <script src="<?php echo SERVER_URL; ?>static/js/register.js"></script>
	        <?php } ?>
	        <?php if (isset($_GET['page']) && $_GET['page'] == "producto") { ?>
	            <script src="<?php echo SERVER_URL; ?>static/js/cart.js"></script>
	        <?php } ?>
	        <script src="<?php echo SERVER_URL; ?>static/js/sweetalert.js"></script>
	        <?php if (isset($_SESSION['nombres'])) { ?>
	        	<script src="<?php echo SERVER_URL; ?>static/js/logout.js"></script>
	        <?php } ?>
    </body>

</html>

	    <?php } ?>
