<?php
class luhn{
	//public $num = '091111111111111250620130030045';
	
	public function __constructor($arr = null){
		
		foreach ($arr as $key => $value) {
			$this->{$key} = $value;
		}
		//public $num = '091111111111111250620130030045';
		//$num= '090400010000001040720139999999'; // <----- Se paga 99,999.99 pesos
	    // <----- Se paga 1 peso
	}
	
	public function __toString(){
		return 'Mi número default es: '.$this->num;
	}
	
	public function crearDigitoVerificador($number ) {
		
		if($number == null){
			$number = $this->num;
		}
		  
		  $odd = true;
		  $sum = 0;
		 
		 
		 $i = 0;
		  foreach ( array_reverse(str_split($number)) as $num) {
		  	$n = (int)$num;
		  	
		  	if (!($i&1)){
		  		$n = $n *2;
				$n = str_split((string)$n);
				$sumita = 0;
				foreach ($n as $nn) {
					$sumita += (int)$nn;
				}
				
				$n = $sumita;
		  	}
			
			$sum += $n;
			
			$i++;
		  }
		 
		 $sum = $sum * 9;
		 $str = (string)$sum;
		 $ul =  substr($str, -1);
		 $verif = $number.$ul;
		 $codigoBarras['CodigoDeBarras'][] = array('codigo' => $concat);
		return $codigoBarras;
		} 	
	
}


$digito = new luhn();

$num = $digito ->crearDigitoVerificador();

print_r($num);
//Quiero tocar tus teclitas bebé n_________________n
//die('hasta aqui');*/

?>