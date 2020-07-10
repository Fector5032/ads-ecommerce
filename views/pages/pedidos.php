<?php 
	require_once './controllers/pedidoController.php';

	$ordenes = new PedidosController();

	$pedidos = $ordenes->get_orders($_SESSION['id']);
	// var_dump($pedidos);
?>
<div class="wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
	                                <tr>
	                                    <th>Estado</th>
	                                    <th>Total con envío</th>
	                                    <th>Direccion</th>
	                                    <th>Metodo de pago</th>
	                                </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($pedidos as $pedido) { ?>
		                                <tr>
		                                    <td><?php echo $pedido['estado']; ?></td>
		                                    <td><?php echo MONEY.($pedido['total'] + $pedido['total_envio']); ?></td>
		                                    <td><?php echo $pedido['linea1'].', '.$pedido['municipio'].', '.$pedido['departamento'] ?></td>
		                                    <td>**** **** **** <?php echo $pedido['ultimos4']; ?></td>
		                                </tr>
	                            	<?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
