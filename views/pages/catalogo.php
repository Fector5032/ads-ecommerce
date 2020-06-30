<?php 
	require_once 'controllers/productsController.php';

	$productos = new ProductsController();
	$productos_activo = $productos->get_products_controller();
?>
<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<?php foreach ($productos_activo as $producto) { ?>
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
	</div>
</div>
