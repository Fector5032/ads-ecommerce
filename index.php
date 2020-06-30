<?php 
    require_once 'config/config.php';
    require_once 'controllers/productsController.php';
?>
<!DOCTYPE html>
<html lang="en">
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
            if (isset($_GET['page'])) {
                if (file_exists('views/pages/'.$_GET['page'].'.php')) {
                    require_once 'views/components/navbar.php'; 
                    require_once 'views/components/footer.php';

                    $page = 'views/pages/'.$_GET['page'].'.php';
                } else {
                    $page = 'views/pages/error/404.php';
                }

            } else {
                require_once 'views/components/navbar.php'; 
                require_once 'views/components/footer.php';

                $page = 'views/pages/home.php';
            }
            
            include_once $page;
        ?>

        <!-- jQuery  -->
        <script src="static/js/jquery.min.js"></script>
        <script src="static/js/bootstrap.bundle.min.js"></script>
        <script src="static/js/jquery.slimscroll.js"></script>
        <script src="static/js/waves.min.js"></script>
        
        <!-- App js -->
        <script src="static/js/app.js"></script>
        
    </body>

</html>
