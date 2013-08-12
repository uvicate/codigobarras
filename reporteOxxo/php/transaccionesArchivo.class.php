
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
               $d = array();
             while (!feof($fp)){ //LEE EL ARCHIVO A DATA, LO VECTORIZA A DATA
              $data  = explode(",", fgets($fp));//SI SE LEE SEPARADO POR COMAS
                                     
                              

                $nomPlazaOxxo = $data[0];
                echo "</br>tu nombre plaza: ".$nomPlazaOxxo." ";  
                /*$nomTiendaOxxo = $data[1];
                $fechaPagoEnOxxo = $data[2];
                $horaPagoEnOxxo = $data[3];
                $barcodeReciboPt1 = $data[4];
                $barcodeReciboPt2 = $data[5];
                $importePagado = $data[6]; */ 
                echo "</br> tu data 0 mide: ".strlen($data[0]);                          
                
              preg_match('(^[A-Za-z0-9\s]+$)', $nomPlazaOxxo, $matchNombrePlaza); 
                            
                if(strlen($matchNombrePlaza[0]) === strlen($data[0])){
                    echo " ,paso ";
                    echo '</br> es el match '.$matchNombrePlaza[0];
                    echo '</br> es lo recibido '.$data[0];
                    } 
                    else
                        echo "no pasa </br>";


              

               
                
                /*preg_match('(^\d{25}$)', $nomTiendaOxxo, $matchTienda);
                preg_match('(^\d{8}$)', $fechaPagoEnOxxo, $matchFechaPago);
                preg_match('(^\d{5}$)', $horaPagoEnOxxo , $matchHoraPago);
                preg_match('(^\d{1,25}$)', $barcodeReciboPt1, $matchBarcodePt1);
                preg_match('(^\d{1,25}$)', $barcodeReciboPt2, $matchBarcodePt2);
                preg_match('(^\d{1,7}$)', $importePagado, $matchImporte);*/

                /*if(count($matchNombrePlaza > 0)){
                  $d[] = $data;
                }else{
                 //echo "no coincide :(";
                } */                                           
             }                            
          } else{ 
              echo "Error de subida";
            }         
          
    } 

    public function validarTodo(){

     $this->validarNombTiendaOxxo();
     $this->validarFechaPagoEnOxxo();
     $this->validarFechaPagoEnOxxo();
     $this->validarHoraPagoOxxo();
     $this->validarBarcodeReciboPt1();
     $this->validarBarcodeReciboPt2();
     $this->validaImportePagado();

    }

    public function validarNombPLazaOxxo(){
      
      $nombrePlazaValido;

      $datosLeidos=$this->leerArchivo();
       preg_match('([\w\s\d]{1,25})', $nomPlazaOxxo, $matchNombrePlaza); 
                //print_r($matchNombrePlaza);

                if(strlen($matchNombrePlaza) === strlen($data[0])){
                    echo "paso";
                    } 
                    else
                        echo "no pasa";


      return nombrePlazaValido;
    }

    public function validarNombTiendaOxxo(){

      preg_match('([\w\s\d]{1,25})', $nomPlazaOxxo, $matchNombrePlaza); 
                //print_r($matchNombrePlaza);

                if(strlen($matchNombrePlaza) === strlen($data[0])){
                    echo "paso";
                    } 
                    else
                        echo "no pasa";

      return nombreTiendaValido;
    }

    public function validarFechaPagoEnOxxo(){

      preg_match('(^\d{8}$)', $fechaPagoEnOxxo, $matchFechaPago);
      return fechaPagoValido;
    }

    public function validarHoraPagoOxxo(){

      preg_match('(^\d{5}$)', $horaPagoEnOxxo , $matchHoraPago);
      return horaPagoValido;
    }
    public function validarBarcodeReciboPt1(){

      preg_match('(^\d{1,25}$)', $barcodeReciboPt1, $matchBarcodePt1);
      return barcodePt1Valido;
    }
    public function validarBarcodeReciboPt2(){

      preg_match('(^\d{1,25}$)', $barcodeReciboPt2, $matchBarcodePt1);
      return barcodePt2Valido;
    }
    public function validaImportePagado(){

      preg_match('(^\d{1,7}$)', $importePagado, $matchImporte);
      return importeValido;
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