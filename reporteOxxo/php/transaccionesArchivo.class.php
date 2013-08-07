
  <?php
  include_once 'conexion.php';
  include_once 'bd.class.php';
  

  class Datos {

    public function leerArchivo (){
         //SI EL ARCHIVO SE ENVIA Y ADEMAS SE SUBIO CORRECTAMENTE
          if (isset($_FILES["archivo"]) && is_uploaded_file($_FILES['archivo']['tmp_name'])) {
              //SE ABRE EL ARCHIVO EN MODO LECTURA
             $fp = fopen($_FILES['archivo']['tmp_name'], "r");
              //RECORRER $fp
             while (!feof($fp)){ //LEE EL ARCHIVO A DATA, LO VECTORIZA A DATA
              //SI SE LEE SEPARADO POR COMAS
              $data  = explode(",", fgets($fp)); 
             } 
              echo "Archivo recorrido alexis";

          } else{ 
              echo "Error de subida";
            }         
          return $data;
    } 

    public function guardarDatosTxt() {

      $datos = $this-> leerArchivo();
      // global $conexion;

      //          $idOxxo = $obteniendo -> getIdOxxo();
      //          $idCliente = $object["idCliente"];
      //          $idClienteUsuario = $object["idClienteUsuario"];
      //          $idUsuario = $object["idUsuario"];
      //          $fecha = $obteniendo -> getFecha();
      //          $monto = $obteniendo -> getMonto();

      //          preg_match('(^\d{2}$)', $idOxxo, $matchIdOxxo);
      //          preg_match('(^\d{1,2}$)', $idCliente, $matchIdCliente);
      //          preg_match('(^\d{1,4}$)', $idClienteUsuario, $matchIdClienteUsuario);
      //          preg_match('(^\d{1,7}$)', $idUsuario, $matchIdUsuario);
      //          preg_match('(^\d{8}$)', $fecha, $matchFecha);
      //          preg_match('(^\d{1,7}$)', $monto, $matchMonto);

      //          $query_sql = "INSERT INTO recibosOxxo(nombrePlazaOxxo,nombreTiendaOxxo,fechaPagoEnOxxo,horaPagoEnOxxo,barcodeReciboPt1,barcodeReciboPt2,importe) 
      //          VALUES('".$data[0]."','".$data[1]."','".$data[2]."','".$data[3]."','".$data[4]."','".$data[5]."','".$data[6]."')";
          
      //          $conexion -> consulta($query_sql);
    }
    


}

$datos = new Datos();
$d= $datos -> leerArchivo();
print_r($d);






  ?>  