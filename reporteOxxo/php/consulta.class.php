<?php
require_once ("conexion.php");
//require_once (__DIR__ . '/medio.php');

class consulta {

	public function __constructor($arr = null) {

		foreach ($arr as $key => $value) {
			$this -> {$key} = $value;
		}

	}

	public function consultar($id) {
		global $conexion;

		$query_sql = "SELECT  * FROM clienteUsuario";

		//"insert into compras values (0, '" . $nombre . "');";
		$conexion -> consulta($query_sql);
		$query_php = $conexion -> datos(true);
		return $query_php;
	}

	public function concatenar($Cliente) {
		$datosDeQuery = $this -> consultar($Cliente);
		$obteniendo = new medio();

		$object = $datosDeQuery[0];

		$idOxxo = $obteniendo -> getIdOxxo();
		$idCliente = $object["idCliente"];
		$idClienteUsuario = $object["idClienteUsuario"];
		$idUsuario = $object["idUsuario"];
		$fecha = $obteniendo -> getFecha();
		$monto = $obteniendo -> getMonto();

		preg_match('(^\d{2}$)', $idOxxo, $matchIdOxxo);
		preg_match('(^\d{1,2}$)', $idCliente, $matchIdCliente);
		preg_match('(^\d{1,4}$)', $idClienteUsuario, $matchIdClienteUsuario);
		preg_match('(^\d{1,7}$)', $idUsuario, $matchIdUsuario);
		preg_match('(^\d{8}$)', $fecha, $matchFecha);
		preg_match('(^\d{1,7}$)', $monto, $matchMonto);

		if (count($matchIdOxxo) && count($matchIdCliente) && count($matchIdClienteUsuario) && count($matchIdUsuario) && count($matchFecha) && count($matchMonto) > 0) {

			//	print_r($matchIdCliente);
			$a = str_pad($idOxxo, 2, "0", STR_PAD_LEFT);
			$b = str_pad($idCliente, 2, "0", STR_PAD_LEFT);
			$c = str_pad($idClienteUsuario, 4, "0", STR_PAD_LEFT);
			$d = str_pad($idUsuario, 7, "0", STR_PAD_LEFT);
			$e = str_pad($fecha, 8, "0", STR_PAD_LEFT);
			$f = str_pad($monto, 7, "0", STR_PAD_LEFT);

			$concat = $a . $b . $c . $d . $e . $f;

			

		} else {
			echo 'Datos incorrectos erroneos, ud ha ingresado un id incorrecto o a consultado 
			datos de un usuario con datos incompletos';
		}
		return $concat;

	}

}

/*$consulta1 = new consulta();
 $dat = $consulta1 -> consultar(60);
print_r($dat);*/
//echo ''.json_encode($dat).'';
?>