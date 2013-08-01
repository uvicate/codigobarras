
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

              $insertar=new BD();
              $insertar-> queryInsert('recibosOxxo',$value);

                
              //echo($key.' '.$value.'</br> </n>');                 
                

               }
        //NOTA CADA VUELTA EQUIVALE A UNA LINEA COMPLETA DEL ARCHIVO CSV
     } 

     echo "Archivo recorrido alexis";

   } else 
   echo "Error de subida";


  }
}

$datos = new Datos();
$datos -> leerArchivo();



  ?>  