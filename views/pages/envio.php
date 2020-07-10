<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
                <?php 
                    require_once 'views/components/breadcrumb.php';

                    echo breadcrumb(True, True, False);
                ?>
                <div class="card">
                    <div class="card-body">
                        <form id="payment-form" action="" method="POST" autocomplete="off">
                            <?php 
                                require_once './controllers/pagoController.php';

                                $direcciones = new PagoController();
                                $direccion = $direcciones->get_address_shipping($_SESSION['id']);

                                $order = $direcciones->get_order_products($_SESSION['id']);
                                // var_dump($order);
                            ?>
                            <input type="hidden" name="direccion" id="direccion" value="<?php echo $direccion[0]['id'] ?>">
                            <input type="hidden" name="orden" id="orden" value="<?php echo $order[0]['id'] ?>">
                            <input type="hidden" name="action" id="action" value="payment_order">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="tarjeta" class="col-sm-4 col-form-label">Tarjeta</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="tarjeta" name="tarjeta" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="cvc" class="col-sm-4 col-form-label">CVC</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="cvc" name="cvc" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="vencimiento" class="col-sm-4 col-form-label">Fecha vencimiento</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="vencimiento" name="vencimiento" required>
                                        </div>
                                    </div>
                                    <?php if ($direccion != NULL) { ?>
                                        <div class="text-center">
                                            <!-- <a href="index.php?page=pago" class="btn btn-success btn-icon">
                                                <span class="btn-icon-label"><i class="ion ion-md-cart mr-2"></i></span>Realizar Pago
                                            </a> -->
                                            <button class="btn btn-success btn-icon">
                                                <span class="btn-icon-label"><i class="ion ion-md-cart mr-2"></i></span>Realizar Pago
                                            </button>
                                        </div>  
                                    <?php } ?>
                                </div>
                                
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h5>Orden # <?php echo $order[0]['id'] ?></h5>
                                                </div>
                                                <div class="col-12">
                                                    <h6>Dirección de envio</h6>
                                                    <div>
                                                        <?php if ($direccion != NULL) { ?>
                                                            <div><?php echo $direccion[0]['linea1']; ?></div>
                                                            <?php if (!empty($direccion[0]['linea2'])) { ?>
                                                                <div><?php echo $direccion[0]['linea2']; ?></div>
                                                            <?php } ?>
                                                            <div><?php echo $direccion[0]['municipio']." - ".$direccion[0]['departamento'] ?></div>
                                                            <div><?php echo "CP ".$direccion[0]['codigo_postal']; ?></div>
                                                        <?php } else {  ?>
                                                            <div>Agrega tu dirección de envio en tu <strong><a href="index.php?page=perfil" style="color: #FF9500;">perfil</a></strong></div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>         
            </div>
		</div>
	</div>
</div>
