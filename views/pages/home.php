<?php 
    require_once 'controllers/productsController.php';
    
    $product = new ProductsController();
    $productos = $product->get_products_controller("precios_bajos");
    $nuevos = $product->get_products_controller("productos_nuevos");
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="text-center pb-4">
            <h3 class="mt-0 pb-2">Bienvenido a ZooShop</h3>
            <h4 class="mt-0 header-title">Con nosotros encontraras los mejores productos</h4>
        </div>
        <div class="text-center">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="3000">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="img-fluid" src="static/images/small/img-1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid" src="static/images/small/img-2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid" src="static/images/small/img-3.jpg" alt="Third slide">
                    </div>
                </div>
            </div>  
        </div>
        <div class="text-center pt-5 pb-4">
            <h3 class="mt-0 pb-2">Los precios mas bajos</h3>
        </div>          
        <div class="row">
            <?php foreach ($productos as $producto) { ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card product-box">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="<?php echo SERVER_URL; ?>static/images/products/1.jpg" class="img-fluid rounded-top mx-auto d-block" alt="work-thumbnail">
                                <div class="product-overlay">
                                    <ul class="list-inline product-links social-links mb-0">
                                        <li class="list-inline-item">
                                            <a href="#" id="add_cart" data-toggle="tooltip" data-id="<?php echo Main::Encryption($producto['id']); ?>" data-placement="top" title="Agregar al carrito"><i class="dripicons-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="detail mt-3">
                                <h4 class="font-16"><a href="index.php?page=producto&id=<?php echo Main::Encryption($producto['id']); ?>" class="text-dark"><?php echo $producto['titulo']; ?></a> </h4>
                                <p class="text-muted">
                                    <i class="mdi mdi-star text-warning"></i>
                                    <i class="mdi mdi-star text-warning"></i>
                                    <i class="mdi mdi-star text-warning"></i>
                                    <i class="mdi mdi-star text-warning"></i>
                                    <i class="mdi mdi-star text-warning"></i>
                                </p>
                                <h5 class="my-0 font-16 float-right"> <b><?php echo MONEY.$producto['precio']; ?></b></h5>
                            </div>
                        </div>
                    </div>
                    <!-- end product-box -->
                </div>
            <?php } ?>
        </div>
        <div class="text-center pt-5 pb-4">
            <h3 class="mt-0 pb-2">Productos nuevos</h3>
        </div>
        <div class="row">
            <?php foreach ($nuevos as $nuevo) { ?>
                <div class="col-xl-3 col-md-6">
                    <div class="card product-box">
                        <div class="card-body">
                            <div class="product-img">
                                <img src="<?php echo SERVER_URL; ?>static/images/products/1.jpg" class="img-fluid rounded-top mx-auto d-block" alt="work-thumbnail">
                                <div class="product-overlay">
                                    <ul class="list-inline product-links social-links mb-0">
                                        <li class="list-inline-item">
                                            <a href="#" id="add_cart" data-toggle="tooltip" data-id="<?php echo Main::Encryption($nuevo['id']); ?>" data-placement="top" title="Agregar al carrito"><i class="dripicons-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="detail mt-3">
                                <h4 class="font-16"><a href="index.php?page=producto&id=<?php echo Main::Encryption($nuevo['id']); ?>" class="text-dark"><?php echo $nuevo['titulo']; ?></a> </h4>
                                <p class="text-muted">
                                    <i class="mdi mdi-star text-warning"></i>
                                    <i class="mdi mdi-star text-warning"></i>
                                    <i class="mdi mdi-star text-warning"></i>
                                    <i class="mdi mdi-star text-warning"></i>
                                    <i class="mdi mdi-star text-warning"></i>
                                </p>
                                <h5 class="my-0 font-16 float-right"> <b><?php echo MONEY.$nuevo['precio']; ?></b></h5>
                            </div>
                        </div>
                    </div>
                    <!-- end product-box -->
                </div>
            <?php } ?>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>