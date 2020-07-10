<?php 
	require_once './models/main.php';

	class ProductosModel extends Main
	{
		protected function get_products_model()
		{
			try {
				$sql = "SELECT * FROM productos ORDER BY fecha_creacion DESC";

				$stm = Main::Connection()->prepare($sql);

				if ($stm->execute()) {
					$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				return $result;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function get_lower_prices_model()
		{
			try {
				$sql = "SELECT * FROM productos WHERE precio <= 25 ORDER BY precio ASC LIMIT 8";

				$stm = Main::Connection()->prepare($sql);

				if ($stm->execute()) {
					$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				return $result;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function get_new_products_model()
		{
			try {
				$sql = "SELECT * FROM productos ORDER BY fecha_creacion DESC LIMIT 4";

				$stm = Main::Connection()->prepare($sql);

				if ($stm->execute()) {
					$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				return $result;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function get_producto_details($producto)
		{
			try {
				$sql = "SELECT * FROM productos WHERE id = :id AND estado = 1";

				$stm = Main::Connection()->prepare($sql);

				$stm->bindParam(":id", $producto);

				if ($stm->execute()) {
					$result = $stm->fetch(PDO::FETCH_ASSOC);
				}

				return $result;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>

