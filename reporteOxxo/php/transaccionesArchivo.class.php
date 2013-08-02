
  <?php
  include_once 'conexion.php';
  include_once 'bd.class.php';
  

  class Datos {

    function leerArchivo (){

         //SI EL ARCHIVO SE ENVIA Y ADEMAS SE SUBIO CORRECTAMENTE
      if (isset($_FILES["archivo"]) && is_uploaded_file($_FILES['archivo']['tmp_name'])) {

        //SE ABRE EL ARCHIVO EN MODO LECTURA
       $fp = fopen($_FILES['archivo']['tmp_name'], "r");

        //RECORRER
       while (!feof($fp)){ //LEE EL ARCHIVO A DATA, LO VECTORIZA A DATA

        //preg_match_all('[a-z]');

        //SI SE LEE SEPARADO POR COMAS
        $data  = explode(",", fgets($fp));
        
        //-> COMENTARIOS ALEXIS 
        //-> CICLO DE LECTURA DE $DATA
          foreach ($data as $key => $value) {

            echo($key.' '.$value.'</br> ');

            global $conexion;

            $query_sql = "INSERT INTO recibosOxxo(nombrePlazaOxxo,nombreTiendaOxxo,fechaPagoEnOxxo,horaPagoEnOxxo,barcodeReciboPt1,barcodeReciboPt2,importe) 
            VALUES('".$value[0]."','".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[5]."')";
        
            $conexion -> consulta($query_sql);

            //para realizar consultas
            //$query_php = $conexion -> datos(true);

               
          }

        

        //NOTA CADA VUELTA EQUIVALE A UNA LINEA COMPLETA DEL ARCHIVO CSV
     } 

     echo "Archivo recorrido alexis";

   } else 
   echo "Error de subida";


  }

  public function guardarDatosTxt() {
    global $conexion;

    $query_sql = "INSERT INTO recibosOxxo(nombrePlazaOxxo,nombreTiendaOxxo,fechaPagoEnOxxo,horaPagoEnOxxo,barcodeReciboPt1,barcodeReciboPt2,importe) 
    VALUES('Plaza cruz','Faja de Oro BJX','20101227','16:52','370000048197280220110137','926000000000000000000000',0000000004235.00)";
    
    $conexion -> consulta($query_sql);
    $query_php = $conexion -> datos(true);
  }
    


}

$datos = new Datos();
$datos -> leerArchivo();



  ?>  