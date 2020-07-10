<?php 
    if (!isset($_SESSION['nombres'])) {
        echo '<script>window.location.href = "index.php"</script>';   
    } 
?>
<div class="wrapper">
    <div class="container-fluid">                
        <div class="row">
            <div class="col-12">
            	<?php 
            		require_once 'views/components/breadcrumb.php';

            		echo breadcrumb(True, False, False);
            	?>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
	                                <tr>
	                                    <th>Imagen</th>
	                                    <th>Producto</th>
	                                    <th>Precio</th>
                                        <th>Cantidad</th>
	                                    <th>Subtotal</th>
	                                    <th></th> 
	                                </tr>
                                </thead>
                                <tbody id="carrito">
                                    <?php
                                        require_once 'controllers/pedidoController.php';

                                        $orden = new PedidosController();
                                        $productos = $orden->get_carrito_controller($_SESSION['id']);

                                        // var_dump($productos);
                                        if (!empty($productos)) {
                                            foreach ($productos as $producto) { 
                                    ?>
    	                                <tr>
    	                                    <td class="product-list-img">
    	                                        <img src="<?php echo SERVER_URL.$producto['imagen']; ?>" class="img-fluid thumb-md rounded" alt="tbl" width="48" height="48">
    	                                    </td>
    	                                    <td>
    	                                        <h6 class="mt-0 mb-1"><?php echo $producto['nombre']; ?></h6>
    	                                        <p class="m-0 font-14"><?php echo $producto['descripcion']; ?></p>
    	                                    </td>
    	                                    <td><?php echo MONEY.$producto['precio'] ?></td>
                                            <td><?php echo $producto['cantidad']; ?></td>
    	                                    <td><?php echo MONEY.$producto['precio'] * $producto['cantidad']; ?></td>
    	                                    <td>
    	                                        <a id="remove" class="text-danger remove-cart-product" data-toggle="tooltip" data-placement="top" title="" data-original-title="Remover producto" data-action="remove_product" data-order="<?php echo $producto['pedido']; ?>" data-price="<?php echo $producto['precio']; ?>" data-quantity="<?php echo $producto['cantidad']; ?>" data-product="<?php echo $producto['producto_id']; ?>" style="cursor: pointer;">
                                                    <i class="mdi mdi-close font-18"></i>
                                                </a>
    	                                    </td>
    	                                </tr>
                                    <?php 
                                            }
                                        } else {
                                    ?>
                                        <tr>
                                            <td class="text-center" colspan="6">
                                                No has agregado ningun producto al carrito
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
