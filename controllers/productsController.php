<?php 
	require_once './models/productsModel.php';

	class ProductsController extends ProductosModel
	{
		public function get_products_controller($action = NULL)
		{
			try {
				if ($action == "precios_bajos") {
					$products = ProductosModel::get_lower_prices_model();
				} elseif ($action == "productos_nuevos") {
					$products = ProductosModel::get_new_products_model();
				} else {
					$products = ProductosModel::get_products_model();
				}
				// var_dump($products);
				return $products;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function ver_producto($producto)
		{
			try {
				$producto = ProductosModel::Decryption($producto);

				$info = ProductosModel::get_producto_details($producto);
				// var_dump($info);
				return $info;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>
