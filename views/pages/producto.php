<?php 
	require_once 'controllers/productsController.php';

	$producto = new ProductsController();
	$info = $producto->ver_producto($_GET['id']);
?>
<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="row pt-3">
							<div class="col-6 text-center img-container-product">
								<img src="<?php echo SERVER_URL.$info['imagen'] ?>" class="img-product-detail" alt="Imagen de producto">
							</div>
							<div class="col-6">
								<div class="h4"><?php echo $info['nombre']; ?></div>
								<div class="text-success pt-2"><?php echo MONEY.$info['precio']; ?></div>
								<div class="pt-2 text-justify" style="height: 100px;"><?php echo $info['descripcion']; ?></div>
								<?php if (isset($_SESSION['nombres'])) { ?>
									<form id="add_product" method="POST">
										<input type="hidden" id="product" name="product" value="<?php echo $_GET['id']; ?>">
										<input type="hidden" id="action" name="action" value="add_product">
										<input type="hidden" id="price" name="price" value="<?php echo $info['precio']; ?>">
										<div class="row pt-5">
											<div class="col-6">
												<button type="button" id="remove" class="btn btn-warning d-inline" style="vertical-align: unset;">-</button>

												<input type="number" id="quantity" name="quantity" class="text-center form-control col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-inline" value="1" readonly>

												<button type="button" id="add" class="btn btn-warning d-inline" style="vertical-align: unset;">+</button>
											</div>
												<div class="col-6">
													<button class="btn btn-primary" type="submit">Agregar al carrito</button>
												</div>
										</div>
									</form>
								<?php } else { ?>
									<div class="col-6">
										<a href="index.php?page=registro" class="btn btn-primary">Registrarme</a>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
