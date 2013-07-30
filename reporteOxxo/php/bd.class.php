<?php

abstract Class BDAbstracta {
	protected $BD;
	protected $host;
	protected $usuario;
	protected $contraseña;
	protected $debug;
	protected $bd;
	protected $obj;
	protected $query;
	protected $error = 'Ha habido un error en la base de datos.';
	protected $mensaje = 'Se ha ejecutado la consulta exitosamente.';
	
	public final function __construct($json){
		if(!array_key_exists('tipo', $json)){
			throw new Exception('No se ha especificado el tipo de Bases de datos que se usará.');
		}
		if(!array_key_exists('host', $json)){
			throw new Exception('No se ha especificado el host.');
		}
		if(!array_key_exists('usuario', $json)){
			throw new Exception('No se ha especificado el usuario.');
		}
		if(!array_key_exists('contraseña', $json)){
			throw new Exception('No se ha especificado la contraseña.');
		}
		if(!array_key_exists('bd', $json)){
			throw new Exception('No se ha especificado la base de datos.');
		}
		
		foreach($json as $prop => $valor){
			$this->{$prop} = $valor;
		}
		
		$this->inicializacion();
	}
	
	public function __destruct(){
		
	}
	
	public function __set($prop, $valor){
		 $this->$prop = $valor;
	}
	
	public function __get($prop){
		return $this->$prop;
	}
	
	public function establecerConexion($host = null, $usuario = null, $contraseña = null, $bd = null){
		$this->establezcoConexion($host, $usuario, $contraseña, $bd);
	}
	
	public function cerrarConexion(){
		$this->cierroConexion();
	}
	
	public function consulta($query, $error = null){
		$this->consulto($query, $error);
	}
	
	public function generarQueryInsert($tabla, $datos){
		return $this->queryInsert($tabla, $datos);
	}
	
	public function datos($solodatos = null, $mensaje = null){
		$respuesta = $this->resultados($solodatos, $mensaje);
		if(!array_key_exists('exito', $respuesta)){
			throw new Exception('No se declaró "exito"');
		}
		if(!array_key_exists('mensaje', $respuesta)){
			throw new Exception('No se declaró el mensaje de respesta para la UI del usuario');
		}
		if(!array_key_exists('datos', $respuesta)){
			throw new Exception('La respuesta de la base de datos debe ser contenida en "datos", la cual no ha sido especificada');
		}
		
		if($solodatos == true){
			$respuesta = $respuesta['datos'];
		}
		
		return $respuesta;
	}
	
	public function ultimoID(){
		$respuesta = $this->ultimoIDinsertado();
		
		return $respuesta;
	}
	
	abstract protected function inicializacion();
	abstract protected function consulto($query, $error = null);
	abstract protected function resultados($mensaje = null);
	abstract protected function ultimoIDinsertado();
	abstract protected function queryInsert($tabla, $datos);
	abstract protected function establezcoConexion($host = null, $usuario = null, $contraseña = null, $bd = null);
	abstract protected function cierroConexion();
}

class BD extends BDAbstracta{
	protected function inicializacion(){
		$json = get_object_vars($this);
		$this->BD = new $json['tipo']($json);
	}
	
	protected function consulto($query, $error = null){
		$this->BD->consulto($query, $error);
	}
	
	protected function resultados($mensaje = null){
		return $this->BD->resultados($mensaje);
	}
	
	protected function establezcoConexion($host = null, $usuario = null, $contraseña = null, $bd = null){
		$this->BD->establezcoConexion($host, $usuario, $contraseña, $bd);
	}
	
	protected function cierroConexion(){
		$this->BD->cierroConexion();
	}
	
	protected function ultimoIDinsertado(){
		return $this->BD->ultimoIDinsertado();
	}
	
	protected function queryInsert($tabla, $datos){
		return $this->BD->queryInsert($tabla, $datos);
	}
}

Class Vi_mysql extends BDAbstracta {
	
	
	protected function inicializacion(){
		$this->establezcoConexion($host = null, $usuario = null, $contraseña = null, $bd = null);
		
	}
	
	protected function consulto($query, $error = null){
		$mierror = $this->error;
		if($error != null){
			$mierror = $error;
		}
		
		$this->query = $this->obj->query($query);
		
		if($this->query == false){
			$error = array('mensaje' => $mierror, 'exito' => false, 'BD' =>$this->obj->error, 'query');
			if($this->debug == true){
				$error['consulta'] = $query;
			}
			die(json_encode($error));
		}
	}
	
	protected function resultados($mensaje = null){
		
		$mimensaje = $this->mensaje;
		if($mensaje != null){
			$mimensaje = $mensaje;
		}
		
		$datos = array();
		$i = 0;
		while($dato = $this->query->fetch_assoc()){
			$datos[] = array_map('utf8_encode', $dato);
		}
		
		$respuesta = array('datos' => $datos, 'mensaje' => $mimensaje, 'exito' => true);
		return $respuesta;
	}
	
	protected function ultimoIDinsertado(){
		$id = $this->obj->insert_id;
		return $id;
	}
	
	protected function queryInsert($tabla, $datos){
		$consulta = "INSERT INTO ".$tabla." ";
		$campos = "";
		$valores = "";
		foreach ($datos as $key => $value) {
			if( gettype($value) == 'boolean') {
				//$value = ($value == true) ? 'true' : 'false';
				$value = ($value == true) ? '1' : '0';
			}else if(gettype($value) != 'integer' && gettype($value) != 'double'){
				$value = "'".$value."'";
			}
			$campos .= $key.", ";
			$valores .= $value.", ";
		}
		$campos = substr($campos, 0, -2);
		$valores = substr($valores, 0, -2);
		
		$consulta .= "(".$campos.") VALUES (".$valores.")";
		
		return $consulta;
	}
	
	protected function establezcoConexion($host = null, $usuario = null, $contraseña = null, $bd = null){
		if($host == null){
			$host = $this->host;
		}
		if($usuario == null){
			$usuario = $this->usuario;
		}
		if($contraseña == null){
			$contraseña = $this->contraseña;
		}
		if($bd == null){
			$bd = $this->bd;
			
		}
		
		$this->obj = new mysqli($host, $usuario, $contraseña, $bd);
		if ($this->obj->connect_errno) {
		    die("Falló la conexión a MySQL: (" . $this->obj->connect_errno . ") " . $this->obj->connect_error);
		}
		$this->obj->set_charset('utf8');
	}
	
	protected function cierroConexion(){
		$this->obj->close();
	}
}

?>