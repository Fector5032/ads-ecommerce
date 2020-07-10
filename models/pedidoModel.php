<?php 
	require_once './models/main.php';

	class PedidosModel extends Main
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

		protected function get_order($customer)
		{
			try {
				$sql = "SELECT * FROM pedidos WHERE estado = 'Creado' AND cliente_id = :cliente";

				$stm = $this->pdo->prepare($sql);

				$stm->bindParam(":cliente", $customer);

				if ($stm->execute()) {
					$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				return $result;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function get_or_create_order($client)
		{
			try {
				$order = self::get_order($client);

				if (empty($order) || $order == NULL) {
					$create_order = "INSERT INTO pedidos (estado, cliente_id) VALUES ('Creado', :cliente)";

					$stm = $this->pdo->prepare($create_order);

					$stm->bindParam(":cliente", $client);

					if ($stm->execute()) {
						$response = self::get_order($client);
					}
				} else {
					$response = self::get_order($client);
				}

				return $response[0];
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function get_order_model($cliente)
		{
			try {
				$order = self::get_order($cliente);

				$sql = "SELECT pedidos.id as pedido, productos_pedido.producto_id, productos.imagen, productos.nombre, productos.descripcion, productos.precio, productos_pedido.cantidad FROM productos_pedido INNER JOIN pedidos ON productos_pedido.pedido_id = pedidos.id INNER JOIN productos ON productos_pedido.producto_id = productos.id WHERE pedidos.cliente_id = :cliente AND pedidos.estado = 'Creado' AND productos_pedido.estado = 1 ORDER BY productos_pedido.fecha_creacion DESC";

				$stm = $this->pdo->prepare($sql);

				$stm->bindParam(":cliente", $cliente);

				if ($stm->execute()) {
					$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				return $result;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function update_price_order($pedido, $total, $price, $quantity, $action)
		{
			try {
				if ($action == "add") {
					$new_total = $total + ($price * $quantity);
				}

				if ($action == "remove") {
					$new_total = $total - ($price * $quantity);
				}

				$update_price = "UPDATE pedidos SET total = :total WHERE id = :pedido";

				$stm = $this->pdo->prepare($update_price);

				$stm->bindParam(":total", $new_total);
				$stm->bindParam(":pedido", $pedido);

				$stm->execute();

				// var_dump($stm->errorInfo());
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function add_product_order($product, $quantity, $price, $action, $client)
		{
			try {
				$pedido = self::get_or_create_order($client);

				if ($action == "add_product") {
					self::update_price_order($pedido['id'], $pedido['total'], $quantity, $price, "add");

					$data = array(
						':pedido' => $pedido['id'],
						':cantidad' => $quantity,
						':estado' => 1,
						':producto' => Main::Decryption($product),
					);
					// var_dump($data);

					$add_product = "INSERT INTO productos_pedido (pedido_id, cantidad, estado, producto_id) VALUES (:pedido, :cantidad, :estado, :producto)";

					$stm = $this->pdo->prepare($add_product);

					if ($stm->execute($data)) {
						$response = array(
							'status' => True,
							'message' => "Producto agregado al carrito"
						);
					}
				}
				// var_dump($pedido);
				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function remove_product_order($action, $product, $quantity, $price, $order, $client)
		{
			try {
				$pedido = self::get_or_create_order($client);

				self::update_price_order($order, $pedido['total'], $price, $quantity, "remove");

				$sql = "UPDATE productos_pedido SET estado = 2 WHERE pedido_id = :pedido AND producto_id = :producto AND estado = 1";

				$stm = $this->pdo->prepare($sql);

				$stm->bindParam(":pedido", $order);
				$stm->bindParam(":producto", $product);

				if ($stm->execute()) {
					$response = array(
						'status' => True,
						'message' => "Producto retirado del carrito"
					);
				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function get_all_orders($cliente)
		{
			try {
				$sql = "SELECT pedidos.estado, pedidos.total, pedidos.total_envio, pagos.ultimos4, direcciones_envio.linea1, direcciones_envio.municipio, direcciones_envio.departamento FROM pedidos INNER JOIN pagos ON pedidos.pago_id = pagos.id INNER JOIN direcciones_envio ON pedidos.envio_id = direcciones_envio.id WHERE pedidos.cliente_id = :cliente AND (pedidos.estado = 'Creado' OR pedidos.estado = 'Pagado' Or pedidos.estado = 'Cancelado')";

				$stm = $this->pdo->prepare($sql);

				$stm->bindParam(":cliente", $cliente);

				if ($stm->execute()) {
					$response = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>
