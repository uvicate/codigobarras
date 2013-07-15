<?php

require_once (__DIR__ . "/digitoVerificador.class.php");
require_once (__DIR__ . '/consulta.class.php');

class medio {
	// Método que recibe la peticion por parte del cliente

	public function recibirPeticion(){
		
	}
	
	public function obtenerDatos() {

		$idCliente = $this -> getIdCliente();
		$consulta1 = new consulta();
		return $consulta1 -> concatenar($idCliente);

	}

	//Metodo que recibe la concatenacion creada por obtencionDatos.php
	public function generarDigito() {
		$medio1= new medio();
		$luhn1 = new luhn();
		return $luhn1 -> crearDigitoVerificador($medio1->obtenerDatos());
		//return ;
		//return $luhn1->crearDigitoVerificador($medio1->getIdOxxo(),$medio1->obtenerDatos());

	}

	//enviaConcatenacion a el cliente
	public function enviarAlCliente() {

		$medio2= new medio();
		$medio2->generarDigito();

		return ;

	}

	public function getIdCliente() {
		return '60';
	}

	public function getIdOxxo() {
		return '09';
	}
	public function getFecha(){
			
		return '21122012';
	}
	public function getMonto(){
			
		return'3000';
	}

}

$medio1 = new medio();
$datos = $medio1 -> generarDigito();
echo($datos);
//$datos = $medio1 -> enviarCliente();
//$digito=  $medio1->obtenerDatos();


//echo $digito;
//die('ya');
//$datos2 = $medio1 -> enviarCliente();



//echo '' . json_encode($datos) . '';
?>