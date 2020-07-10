<?php 
	require_once './models/main.php';

	class PagoModel extends Main
	{
		private $pdo;
		
		function __construct()
		{
			try {
				$this->pdo = Main::Connection();
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function get_shipping_address($client)
		{
			try {
				$sql = "SELECT * FROM direcciones_envio WHERE cliente_id = :client";

				$stm = Main::Connection()->prepare($sql);

				$stm->bindParam(":client", $client);

				if ($stm->execute()) {
					$response = $stm->fetchAll(PDO::FETCH_ASSOC);

					if (empty($response) || $response == NULL) {
						$response = NULL;
					}
				}
				// var_dump($response);
				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function get_order($customer)
		{
			try {
				$sql = "SELECT * FROM pedidos WHERE estado = 'Creado' AND cliente_id = :cliente";

				$stm = Main::Connection()->prepare($sql);

				$stm->bindParam(":cliente", $customer);

				if ($stm->execute()) {
					$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				return $result;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function insert_payment($card)
		{
			try {
				$card = str_replace(' ', '', $card);

				$card = substr($card, -4);

				$create = "INSERT INTO pagos (ultimos4, estado) VALUES (:card, 1)";

				$stm = $this->pdo->prepare($create);

				$stm->bindParam(":card", $card);

				if ($stm->execute()) {
					$payment = $this->pdo->lastInsertId();
				}

				return $payment;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function complete_order($order, $shipping, $payment)
		{
			try {
				$data = array(
					':pedido' => $order,
					':envio' => $shipping,
					':pago' => $payment,
				);
				// var_dump($data);
				$sql = "UPDATE pedidos SET envio_id = :envio, pago_id = :pago, estado = 'Pagado' WHERE id = :pedido";

				$stm = $this->pdo->prepare($sql);

				if ($stm->execute($data)) {
					$response = True;
				} else {
					$response = $stm->errorInfo();
				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>


