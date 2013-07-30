<?php

	abstract Class medio {

		protected $peticion;
		protected $recibido;
		protected $error='El archivo insertado es erroneo, revise formato y contenido';

		public function __construct($_File){

	      if (isset($_FILES["archivo"]) && is_uploaded_file($_FILES['archivo']['tmp_name'])) {
								
	   		} else echo "Error de subida";
	   		this-> leerArchivo();


		}

	}


		public function __set($prop, $valor){
			$this->$prop = $valor;
		}
		
		public function __get($prop){
			return $this->$prop;
		}

		public function leerArchivo($nombre){

			$fp = fopen($_FILES[$nombre]['tmp_name'], "r");
	        
		       while (!feof($fp)){ //LEE EL ARCHIVO A DATA, LO VECTORIZA A DATA

		       	 $data  = explode(",", fgets($fp));
		        
		          foreach ($data as $key => $value) {
						echo($key.' '.$value.' ');
					}
		    	} 

		}



		/*protected function inicializacion(){
			$this->establezcoConexion($host = null, $usuario = null, $contraseña = null, $bd = null);
			
		}*/



	}





?>
