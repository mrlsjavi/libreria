<?php
//bussines logic
	require_once('orm/config.php');
	require_once('orm/ORM.php');
	//
	require_once('orm/_producto.php');


class Producto_Model extends Model{

	function __construct(){
		//para que inicialize el constructor del modal 
		parent::__construct();
	}


	function process(){
		$acc = $_POST['acc'];

		if($acc==4){
			//busca la mesa 
			//$values = json_decode($_POST['values']);

			//solo tengo el titulo 
			//$values->titulo;

			//$producto = _producto::where('titulo', 'consome');

			/*if($producto){
				$poblaciones = null;
				foreach ($producto as $index => $producto) {
					$poblaciones[] = array(
						'id' => $producto->id,
						'titulo' => $producto->titulo,
						'cantidad' =>$producto->cantidad,
						'estatus' =>$producto->estatus
					);
				}
				$result = $poblaciones;
			}

			//echo "va el id del restaurante ".$result[0]['id'];
			$id_restaurante = $result[0]['titulo'];*/

			//$javier = $id_restaurante;
			$javier = array('cod' => 1, 'msj' => 'busco');
			/*
				$restaurante =  restaurante::where('titulo', $values->restaurante);
			//$usuario = usuario::all();

			//print_r($restaurante);


			if ($restaurante) {
				$poblaciones = null;
				foreach ($restaurante as $index => $restaurante) {
					$poblaciones[] = array(
						'id' => $restaurante->id,
						'titulo' => $restaurante->titulo,
						'direccion' =>$restaurante->direccion
					);
				}
				$result = $poblaciones;
			}
			else {
				$result = array('cod' => 0, 'mensaje' => 'no hay restaurante');
			}

			//echo "va el id del restaurante ".$result[0]['id'];
			$id_restaurante = $result[0]['id'];
			*/





		}
		else{
			$values = json_decode($_POST['values']);

		//if($acc == 1){
			$data = array(
				'id'=>'',	//id de mesa //buscar si hay una disponible para eso 
				'titulo'=>$values->titulo,	//id de restaurante//buscar el id del restaurante 
				'cantidad'=>$values->cantidad,
				'estatus'=>1   //$values->reserva,			//
				
			);

			$producto = new _producto($data);
			$result = $producto->save();
			//$esto =  $result['cod'];
			//$javier = " esto tengo ".$esto;

			//$javier = array('cod' => 1, 'msj' => 'guardado que sera ');
			$javier = $result;

			//$javier = "llegno";

			echo json_encode($javier);
		}

		//}

	}


}