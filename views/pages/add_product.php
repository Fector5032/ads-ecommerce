<?php 
	// session_start(['name' => 'ZooShop_Client']);

	require_once './models/pedidoModel.php';
	
	$response = NULL;
	
	$form_data = json_decode(file_get_contents("php://input"));

	$pedido = new PedidosModel();
	// var_dump($_POST['action']);
	if (isset($_POST['action']) && $_POST['action'] == "add_product") {
		$response = $pedido->add_product_order($_POST['product'], $_POST['quantity'], $_POST['price'], $_POST['action'], $_SESSION['id']);
	}

	if (isset($form_data->action) && $form_data->action == "remove_product") {
		$response = $pedido->remove_product_order($form_data->action, $form_data->producto, $form_data->cantidad, $form_data->precio, $form_data->pedido, $_SESSION['id']);
		// var_dump($form_data);
	}

	if (isset($_POST['action']) && $_POST['action'] == "payment_order") {
		require_once './controllers/pagoController.php';

		$pago = new PagoController();
		// var_dump($_POST['direccion']);
		$response = $pago->payment_order($_POST['tarjeta'], $_POST['orden'], $_POST['direccion']);
	}
	// var_dump($response);
	echo json_encode($response);
?>
