<?php 
	$form_data = json_decode(file_get_contents("php://input"));

	if ($form_data->logout) {
		session_start(['name' => 'ZooShop_Client']);

		session_unset();
		$data = array(
			'logout' => session_destroy(),
		);
	}


	echo json_encode($data);
?>
