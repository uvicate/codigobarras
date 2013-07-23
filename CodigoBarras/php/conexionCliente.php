<?php
require_once (__DIR__ . '/medio.php');

//print_r( $_POST);

//$_POST ='12121212';

class conCliente {

	/*function __construct($argument) {

	}*/

	public function recibirPeticion() {
		if (isset($_POST["json"])) {

			$json = $_POST["json"];

			$datos = json_decode($json, true);

			$fecha = $datos['fecha'];

			return $fecha;
		} else {
			echo "N0, json is not set";
		}

	}

	public function enviarDatos() {

		$medio1 = new medio();

		$datos1 = $medio1 -> generarDigito();
		$forJs = json_encode($datos1);
		return ($forJs);
	}

	/*	public function enviar() {
	 $medio1 = new medio();

	 $datos1 = $medio1 -> generarDigito();
	 return $datos1;
	 }*/

}

$medio2 = new conCliente();
$datos2 = $medio2 -> enviarDatos();

echo $datos2;


?>

