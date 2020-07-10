<?php 
	require_once './config/database.php';

	class Main
	{
		
		/*--------- Conexión a la Base de Datos ---------*/
		protected static function Connection()
		{
			try {
				if (DRIVER == 'mysql' || DRIVER == NULL) {
					$connect = new PDO(SGBD, USER, PASSWORD);
					// $connect->exec('SET NAMES '.CHARSET);
					// $connect->exec('SET NAMES UTF8');
					$connect->exec('SET CHARACTER SET '.CHARSET);
				}

				return $connect;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		/*--------- Encriptado ---------*/
		public function Encryption($string)
		{
			try {
				$output = false;

				$key = hash('sha256', SECRET_KEY);
				$iv =  substr(hash('sha256', SECRET_IV), 0, 16);
				$output = openssl_encrypt($string, METHOD, $key, 0, $iv);
				$output = base64_encode($output);

				return $output;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

		/*--------- Desencriptado ---------*/
		public static function Decryption($string)
		{
			try {
				$key = hash('sha256', SECRET_KEY);
				$iv = substr(hash('sha256', SECRET_IV), 0, 16);
				$output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);

				return $output;
			} catch (Exception $e) {
				die($e->getMessage());
			}
		}

	}
?>
