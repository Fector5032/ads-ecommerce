<?php 
	require_once './models/main.php';

	class ProductosModel extends Main
	{
		public function get_products_model()
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

		public function get_lower_prices_model()
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

		public function get_new_products_model()
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
	}
?>

