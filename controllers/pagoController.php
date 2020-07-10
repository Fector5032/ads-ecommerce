<?php 
	require_once './models/pagoModel.php';

	class PagoController extends PagoModel
	{
		public function get_address_shipping($client)
		{
			try {
				$direccion = PagoModel::get_shipping_address($client);

				return $direccion;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function get_order_products($client)
		{
			try {
				$order = PagoModel::get_order($client);

				return $order;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function payment_order($card, $order, $shipping)
		{
			try {
				$payment = PagoModel::insert_payment($card);

				$complete = PagoModel::complete_order($order, $shipping, $payment);
				// var_dump($complete);
				if ($complete === True) {
					$response = array(
						'status' => True,
						'message' => "Pago realizado con exito",
						'mail' => True
					);
				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>


