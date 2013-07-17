<?php
require_once (__DIR__ . '/medio.php');

//print_r( $_POST);

//$_POST ='12121212';

class conCliente {

	function __construct($argument) {

	}

	public function recibirPeticion() {
		if (isset($_POST["fecha"])) {

			$data = $_POST["fecha"];

			//$data = json_decode($json, true);

			$fecha = $data;

			$medio1 = new medio();
			$dat4 = $medio1 -> getFecha($fecha);
			$datos1 = $medio1 -> generarDigito();
			

			return $datos1;
		} else {
			echo "N0, json is not set";
		}

	}

	/*	public function enviar() {
	 $medio1 = new medio();

	 $datos1 = $medio1 -> generarDigito();
	 return $datos1;
	 }*/

}

$medio2 = new conCliente();
$datos2 = $medio2 -> recibirPeticion();

echo $datos2;
?>

