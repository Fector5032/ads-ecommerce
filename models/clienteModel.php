<?php 
	require_once './models/main.php';

	class ClienteModel extends Main
	{
		protected function register_model($nombres, $apellidos, $email, $username, $password)
		{
			try {
				$data = array(
					':nombres' => $nombres, 
					':apellidos' => $apellidos, 
					':email' => $email, 
					':username' => $username, 
					':password' => Main::Encryption($password), 
					':estado' => 1,
				);
				// var_dump($data);
				$sql = "INSERT INTO clientes (nombres, apellidos, username, email, password, estado) VALUES (:nombres, :apellidos, :username, :email, :password, :estado)";

				$stm = Main::Connection()->prepare($sql);

				if ($stm->execute($data)) {
					$response = True;
				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function login_cliente_model($email, $password)
		{
			try {
				$password = Main::Encryption($password);

				$sql = "SELECT * FROM clientes WHERE email = :email";

				$stm = Main::Connection()->prepare($sql);

				$stm->bindParam(":email", $email);

				if ($stm->execute()) {
					$result = $stm->fetchAll(PDO::FETCH_ASSOC);
				}

				foreach ($result as $row) {
					if ($password == $row['password']) {
						session_start(['name' => 'ZooShop_Client']);
						
						$_SESSION['id'] = $row['id'];
						$_SESSION['nombres'] = $row['nombres'];
						$_SESSION['apellidos'] = $row['apellidos'];
						$_SESSION['email'] = $row['email'];

						$response = True;
					} else {
						$response = False;
					}

				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function get_info_client_model($client)
		{
			try {
				$sql = "SELECT clientes.id, clientes.nombres, clientes.apellidos, clientes.username, clientes.email, clientes.password, direcciones_envio.linea1, direcciones_envio.linea2, direcciones_envio.municipio, direcciones_envio.departamento, direcciones_envio.referencia, direcciones_envio.codigo_postal FROM clientes LEFT JOIN direcciones_envio ON direcciones_envio.cliente_id = clientes.id WHERE clientes.id = :cliente";

				$stm = Main::Connection()->prepare($sql);

				$stm->bindParam(":cliente", $client);

				if ($stm->execute()) {
					$result = $stm->fetch(PDO::FETCH_ASSOC);
				}

				return $result;
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

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function update_info_client($names, $lastnames, $username, $email, $password, $client)
		{
			try {
				$data = array(
					':names' => $names,
					':last_names' => $lastnames,
					':username' => $username,
					':email' => $email,
					':password' => Main::Encryption($password),
					':client' => $client,
				);

				$sql = "UPDATE clientes SET nombres = :names, apellidos = :last_names, username = :username, email = :email, password = :password WHERE id = :client";

				$stm = Main::Connection()->prepare($sql);

				if ($stm->execute($data)) {
					$response = True;
				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		protected function update_info_shipping($linea1, $linea2, $municipio, $departamento, $referencia, $postal, $client)
		{
			try {
				$shipping = self::get_shipping_address($client);

				if (empty($linea2)) {
					$linea2 = NULL;
				}

				$data = array(
					':line1' => $linea1,
					':line2' => $linea2,
					':city' => $municipio,
					':state' => $departamento,
					':reference' => $referencia,
					':postal' => $postal,
					':client' => $client,
				);
				// var_dump($data);
				if (!empty($shipping) || $shipping != NULL) {
					// echo "si";
					$sql = "UPDATE direcciones_envio SET linea1 = :line1, linea2 = :line2, municipio = :city, departamento = :state, referencia = :reference, codigo_postal = :postal WHERE id = :client";

					$stm = Main::Connection()->prepare($sql);

					if ($stm->execute($data)) {
						$response = True;
					} else {
						$response = $stm->errorInfo();
					}
					// var_dump($response);
				} else {
					// echo "no";
					$sql = "INSERT INTO direcciones_envio (linea1, linea2, municipio, departamento, referencia, codigo_postal, estado, cliente_id) VALUES (:line1, :line2, :city, :state, :reference, :postal, 1, :client)";

					$stm = Main::Connection()->prepare($sql);

					if ($stm->execute($data)) {
						$response = True;
					} else {
						$response = $stm->errorInfo();
					}
				}

				return $response;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}
	}
?>


