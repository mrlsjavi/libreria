<?php
//bussines logic
	require_once('orm/config.php');
	require_once('orm/ORM.php');

	require_once('orm/_forma_pago.php');


class Forma_pago_Model extends Model{

	function __construct(){
		//para que inicialize el constructor del modal 
		parent::__construct();
	}


	function process(){
		$acc = $_POST['acc'];

		if($acc==4){
			//busca la mesa 



		}
		else{
			$values = json_decode($_POST['values']);

		//if($acc == 1){
			$data = array(
				'id'=>'',
				'titulo'=>$values->titulo,			//id de mesa //buscar si hay una disponible para eso 
			//id de restaurante//buscar el id del restaurante 
				'estatus'=>1//$values->reserva,			//
				
			);



			$pago = new _forma_pago($data);



			$result = $pago->save();
			//$esto =  $result['cod'];
			//$javier = " esto tengo ".$esto;

			//$javier = array('cod' => 1, 'msj' => 'lleagndo');
			$javier = $result;
			//$javier ="lleangod";



			echo json_encode($javier);
		}

		//}

	}


}