<?php 
	require_once './models/pedidoModel.php';

	class PedidosController extends PedidosModel
	{
		public function get_carrito_controller($cliente)
		{
			try {
				$response = PedidosModel::get_order_model($cliente);

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function get_orders($cliente)
		{
			try {
				$response = PedidosModel::get_all_orders($cliente);

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>
