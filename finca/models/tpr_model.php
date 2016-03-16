<?php
//bussines logic
	require_once('orm/config.php');
	require_once('orm/ORM.php');
	
	require_once('orm/_tpr.php');


class Tpr_Model extends Model{

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
				'direccion'=>$values->direccion,	//id de restaurante//buscar el id del restaurante 
				'estatus'=>1,//$values->reserva,			//
				
			);

			$tpr = new _tpr($data);

			$result = $tpr->save();
			//$esto =  $result['cod'];
			//$javier = " esto tengo ".$esto;

			$javier = array('cod' => 1, 'msj' => '');
			$javier = $result;


			echo json_encode($javier);
		}

		//}

	}


}