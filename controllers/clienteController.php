<?php 
	require_once './models/clienteModel.php';

	class ClientesController extends ClienteModel
	{
		public function create_client($nombres, $apellidos, $email, $username, $password)
		{
			try {
				$nombres = strval($nombres);
				$apellidos = strval($apellidos);
				$email = strval($email);
				$username = strval($username);
				$password = strval($password);

				$register = self::register_model($nombres, $apellidos, $email, $username, $password);

				if ($register != False) {
					$response = True;
				} else {
					$response = False;
				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function login_cliente($email, $password)
		{
			try {
				$response = self::login_cliente_model($email, $password);

				return $response;	
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function get_info_client($client)
		{
			try {
				$info = ClienteModel::get_info_client_model($client);

				return $info;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		public function edit_info_client($data, $client)
		{
			try {
				// var_dump($data);
				$perfil = ClienteModel::update_info_client($data['nombre'], $data['apellidos'], $data['username'], $data['email'], $data['password'], $client);
				$shipping_address = ClienteModel::update_info_shipping($data['linea1'], $data['linea2'], $data['municipio'], $data['departamento'], $data['descripcion'], $data['postal'], $client);

				if ($perfil === $shipping_address) {
					$response = True;
				} else {
					$response = array(
						'perfil' => $perfil,
						'shipping' => $shipping,
					);
				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>

