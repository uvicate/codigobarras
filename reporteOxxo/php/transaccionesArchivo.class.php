
  <?php
  include_once 'conexion.php';
  include_once 'bd.class.php';
  

  class Datos {


    function __construct(){


    }
    public function leerArchivo (){

         //SI EL ARCHIVO SE ENVIA Y ADEMAS SE SUBIO CORRECTAMENTE
          if (isset($_FILES["archivo"]) && is_uploaded_file($_FILES['archivo']['tmp_name'])) {
              //SE ABRE EL ARCHIVO EN MODO LECTURA
             $fp = fopen($_FILES['archivo']['tmp_name'], "r");
              //RECORRER $fp
               $d = array();
             while (!feof($fp)){ //LEE EL ARCHIVO A DATA, LO VECTORIZA A DATA
              $data  = explode(",", fgets($fp));//SI SE LEE SEPARADO POR COMAS
                                     
              if ($data>0) {
               $d[]=$data;
              }else "Archivo Vacio";                                        
                                                       
             }                            
          } else{ 
              echo "Error de subida";
            } return $d;
          
    } 

    public function validarTodo(){

      
       $datosFinales= array( );

     $nombreTienda=$this->validarNombTiendaOxxo();
     $nombrePlaza= $this->validarNombPLazaOxxo()();
     $this->validarFechaPagoEnOxxo();
     $this->validarHoraPagoOxxo();
     $this->validarBarcodeReciboPt1();
     $this->validarBarcodeReciboPt2();
     $this->validarImportePagado();

     $datosFinales['datosFinales']= $nombreTienda;

     $b=$this->validarNombTiendaOxxo();

     return $datosFinales;

    }

    public function validarNombPLazaOxxo(){
     
      $contador=0;
      $nombrePlazaValido=array();
      
      $datosLeidos=$this->leerArchivo();
      $cantidadDatosRecibidos= count($datosLeidos)-2;

      while ($contador<= $cantidadDatosRecibidos) {
        $nombrePlazaOxxo=$datosLeidos[$contador];        

        preg_match('([\w\s\d]{25})', $nombrePlazaOxxo[0], $matchNombrePlaza);   
        
        if(count($matchNombrePlaza[0])>0){
          
          $nombrePlazaValido[]=$matchNombrePlaza[0];          
          
        } 
        else
              
              die('Tienes un error en el nombre de la plaza, dentro del .txt en la linea '.$contador);
                    
        $contador++;
                      
      }
      return $nombrePlazaValido;
    }

    public function validarNombTiendaOxxo(){

      $contador=0;
      $nombreTiendaValido=array();
      
      $datosLeidos=$this->leerArchivo();
      $cantidadDatosRecibidos= count($datosLeidos)-2;

      while ($contador<= $cantidadDatosRecibidos) {
        $nombreTiendaOxxo=$datosLeidos[$contador];   

        preg_match('([\w\s\d.]{25})', $nombreTiendaOxxo[1], $matchNombreTienda);   
        
        if(count($matchNombreTienda[0])>0){
          
          $nombreTiendaValido[]=$matchNombreTienda[0];          
          
        } 
        else
              
              die('Tienes un error en el nombre de la tienda, dentro del .txt en la linea '.$contador);
                    
        $contador++;
                      
      }

      return $nombreTiendaValido;
    }

    public function validarFechaPagoEnOxxo(){
    
    $contador=0;
      $fechaPagoValido=array();
      
      $datosLeidos=$this->leerArchivo();
      $cantidadDatosRecibidos= count($datosLeidos)-2;

      while ($contador<= $cantidadDatosRecibidos) {
        $fechaPagoOxxo=$datosLeidos[$contador];  
      
        
        preg_match('([\w\d]{8})', $fechaPagoOxxo[2], $matchFechaPago);  
        
        if(count($matchFechaPago[0])>0){
          
          $fechaPagoValido[]=$matchFechaPago[0];          
          
        } 
        else
              
              die('Tienes un error en el fecha de pago, dentro del .txt en la linea '.$contador);
                    
        $contador++;
                      
      }
      return $fechaPagoValido;
    }

    public function validarHoraPagoOxxo(){

      $contador=0;
      $horaPagoValido=array();
      
      $datosLeidos=$this->leerArchivo();
      $cantidadDatosRecibidos= count($datosLeidos)-2;

      while ($contador<= $cantidadDatosRecibidos) {
        $horaPagoOxxo=$datosLeidos[$contador];         

        preg_match('([\w\d:]{5})', $horaPagoOxxo[3], $matchHoraPago);  
        
        if(count($matchHoraPago[0])>0){
          
          $horaPagoValido[]=$matchHoraPago[0];          
          
        } 
        else
              
              die('Tienes un error en el hora de pago, dentro del .txt en la linea '.$contador);
                    
        $contador++;
                      
      }
      return $horaPagoValido;
    }

    public function validarBarcodeReciboPt1(){
      $contador=0;
      $barcodePt1Valido=array();
      
      $datosLeidos=$this->leerArchivo();
      $cantidadDatosRecibidos= count($datosLeidos)-2;

      while ($contador<= $cantidadDatosRecibidos) {
        $barcodePt1Oxxo=$datosLeidos[$contador];        

        preg_match('([\w\d]{25})', $barcodePt1Oxxo[4], $matchBarcodePt1);   
        
        if(count($matchBarcodePt1[0])>0){
          
          $barcodePt1Valido[]=$matchBarcodePt1[0];          
          
        } 
        else
              
              die('Tienes un error en el nombre de la plaza, dentro del .txt en la linea '.$contador);
                    
        $contador++;
                      
      }
      return $barcodePt1Valido;
    }

    public function validarBarcodeReciboPt2(){

      $contador=0;
      $barcodePt2Valido=array();
      
      $datosLeidos=$this->leerArchivo();
      $cantidadDatosRecibidos= count($datosLeidos)-2;

      while ($contador<= $cantidadDatosRecibidos) {
        $barcodePt2Oxxo=$datosLeidos[$contador];        

        preg_match('([\w\d]{25})', $barcodePt2Oxxo[5], $matchBarcodePt2);   
        
        if(count($matchBarcodePt2[0])>0){
          
          $barcodePt2Valido[]=$matchBarcodePt2[0];          
          
        } 
        else
              
              die('Tienes un error en el codigo de barras, dentro del .txt en la linea '.$contador);
                    
        $contador++;
                      
      }
      return $barcodePt2Valido;
    }
    public function validarImportePagado(){

      $contador=0;
      $importeValido= array();

      $datosLeidos=$this->leerArchivo();
      $cantidadDatosRecibidos= count($datosLeidos)-2;
               
        while ($contador<= $cantidadDatosRecibidos) {
        $barcodePt2Oxxo=$datosLeidos[$contador];     

         preg_match('([\d.]{16})', $barcodePt2Oxxo[6], $matchImportePagado);   
        
        if(count($matchImportePagado[0])>0){
          
          $importeValido[]=$matchImportePagado[0];          
          
        } 
        else
              
              die('Tienes un error en el importe pagado, dentro del .txt en la linea '.$contador);
                    
        $contador++;
                      
      }                                                                    
      return $importeValido;
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
$d= $datos -> validarNombPLazaOxxo();
print_r($d);



  ?>  