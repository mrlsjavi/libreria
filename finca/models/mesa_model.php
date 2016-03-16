<?php
//bussines logic
	require_once('orm/config.php');
	require_once('orm/ORM.php');
	
	require_once('orm/mes.php');


class Mesa_Model extends Model{

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
				'ubicacion'=>$values->ubicacion,	//id de restaurante//buscar el id del restaurante 
				'fumador'=>$values->fumador,//$values->reserva,			//
				'capacidad'=>$values->capacidad,
				'estatus'=>1
			);

			$mesa = new mes($data);

			$result = $mesa->save();
			$esto =  $result['cod'];
			$javier = " esto tengo ".$esto;

			$javier = $result;


			echo json_encode($javier);
		}

		//}

	}


}