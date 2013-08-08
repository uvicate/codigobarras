
  <?php
  include_once 'conexion.php';
  include_once 'bd.class.php';
  

  class Datos {

    public function leerArchivo (){
      global $data;

         //SI EL ARCHIVO SE ENVIA Y ADEMAS SE SUBIO CORRECTAMENTE
          if (isset($_FILES["archivo"]) && is_uploaded_file($_FILES['archivo']['tmp_name'])) {
              //SE ABRE EL ARCHIVO EN MODO LECTURA
             $fp = fopen($_FILES['archivo']['tmp_name'], "r");
              //RECORRER $fp
             while (!feof($fp)){ //LEE EL ARCHIVO A DATA, LO VECTORIZA A DATA
              $data  = explode(",", fgets($fp));//SI SE LEE SEPARADO POR COMAS
              

              /*if(strlen($data[0]) <= 0){
                die('invalido! no tiene datos');
              }*/              

                $nomPlazaOxxo = $data[0];  
                $nomTiendaOxxo = $data[1];
                $fechaPagoEnOxxo = $data[2];
                $horaPagoEnOxxo = $data[3];
                $barcodeReciboPt1 = $data[4];
                $barcodeReciboPt2 = $data[5];
                $importePagado = $data[6];
                
                foreach ($data as $key => $value) {
                 echo count($data[6]);
                 print_r($data[6]);
                }

                /*

                preg_match('([\w\s\d]{1,25})', $nomPlazaOxxo, $matchNombrePlaza); 
                //print_r($matchNombrePlaza);

                if(strlen($matchNombrePlaza) === strlen($data[0])){
                    echo "paso";
                    } 
                    else
                        echo "no pasa";

                //var_dump ("tu match ". $matchNombrePlaza[0].'</br>');
                /*preg_match('(^\d{25}$)', $nomTiendaOxxo, $matchTienda);
                preg_match('(^\d{8}$)', $fechaPagoEnOxxo, $matchFechaPago);
                preg_match('(^\d{5}$)', $horaPagoEnOxxo , $matchHoraPago);
                preg_match('(^\d{1,25}$)', $barcodeReciboPt1, $matchBarcodePt1);
                preg_match('(^\d{1,25}$)', $barcodeReciboPt2, $matchBarcodePt2);
                preg_match('(^\d{1,7}$)', $importePagado, $matchImporte);*/

                /*if(count($matchNombrePlaza > 0)){
                 //echo "coincide :)";
                }else{
                 //echo "no coincide :(";
                } */                                           
             }                            
          } else{ 
              echo "Error de subida";
            }         
          
    } 

    public function guardarDatosTxt() {

      $datos = $this-> leerArchivo();

      if (count($matchNombrePlaza) < 0) {

                       echo "Archivo recorrido alexis";
                      $a = $nomPlazaOxxo;
                      $b = $nomTiendaOxxo;
                      $c = $fechaPagoEnOxxo;
                      $d = $horaPagoEnOxxo;
                      $e = $barcodeReciboPt1;
                      $f = $barcodeReciboPt2;
                      $g = $importePagado;

                      global $conexion;

                      $query_sql = "INSERT INTO recibosOxxo(nombrePlazaOxxo,nombreTiendaOxxo,
                                          fechaPagoEnOxxo,horaPagoEnOxxo,barcodeReciboPt1,
                                          barcodeReciboPt2,importe) 
                      VALUES('".$a."','".$b."','".$c."','".$d."','".$e."','".$f."','".$g."')";
          
                      //$conexion -> consulta($query_sql);
      

                }
     
    }
    


}

$datos = new Datos();
$d= $datos -> leerArchivo();
print_r($d);






  ?>  