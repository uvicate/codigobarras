<?php
require_once (__DIR__ . '/medio.php');
class conCliente {

	function __construct($argument) {

	}

	public function recibirPeticion() {

		if (isset($_POST["json"])) {
			
			$json = $_POST["json"];
			$data = json_decode($json, true);
			$id = $data['fecha'];
			
			echo ($id);
			
			
		} else {
			echo "N0, mail is not set";
		}

	}

}
?>

