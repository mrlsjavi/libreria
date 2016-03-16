<?php
	require_once('orm/config.php');
	require_once('orm/ORM.php');
	
	require_once('orm/restaurante.php');
	require_once('orm/reserva.php');

//bussines logic
class Reservacion_Model extends Model{

	function __construct(){
		//para que inicialize el constructor del modal 
		parent::__construct();

	}


	function process(){
		Database::getConnection(DB_PROVIDER, DB_HOST, DB_USER, DB_PASSWORD, DB_DB);
		 $javier = "morales";
		 $javier = null;
		 $datos = array();
		 $parametros = "";

		if($_POST){

			$numero2 = count($_POST);
			$tags2 = array_keys($_POST);

			for ($i=0; $i < $numero2; $i++) { 
				$parametros = $parametros.$tags2[$i];

			}

			$acc = $_POST['acc'];
			$values = json_decode($_POST['values']);

			

			if($acc == 1){ //ingresar una reservacion 
				//insert
				$javier = "hacer insert ".$values->reserva;


			//buscar el restaurante 
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
				$result = array('cod' => 0, 'msj' => 'no hay restaurante');
			}

			//echo "va el id del restaurante ".$result[0]['id'];
			$id_restaurante = $result[0]['id'];
			//echo '<br/>';
			//echo '<br/>';

			//	print_r($result);

			//termina buscar el restaurante	

			//buscar si existe una mesa 	
			$fumador = $values->area;
			//$fumador = 0;
		    //$capacidad = 5;
		    $capacidad = $values->personas;
		   // $restaurante = "campero";
		    $nombre_restaurante = $values->restaurante;
		    $hora = $values->hora.':00';
		    $dia = $values->fecha;
		    $mesa = reserva::disponible($fumador, $capacidad, $nombre_restaurante, $hora, $dia);
		    
		    $existe = count($mesa);
		   
		    if($existe > 0){
		        $reservar_mesa = $mesa[0]['mesa'];
		    }
		    else{
		       // echo "no hay mesa disponible";
		    	$reservar_mesa = 0;
		    }

			//termina la busqueda de la mesa 

			if($reservar_mesa > 0 and $id_restaurante > 0){
				$data = array(
							'id'=>'',
							'mesa'=>$reservar_mesa,			//id de mesa //buscar si hay una disponible para eso 
							'restaurante'=>	$id_restaurante,	//id de restaurante//buscar el id del restaurante 
							'cliente'=>$values->reserva,			//
							'dia'=>$values->fecha,
							'hora'=>$values->hora.':00',
							'comensales'=>$values->personas,
							'en_sitio'=>0,
							'estatus'=>1

							//'2015-11-19', '03:07:00'
						);


						//values:{"reserva":"javier","restaurante":"","area":"No Fumador","personas":"","hora":"","fecha":""}

					$reserva = new reserva($data);

					$result = $reserva->save();
					$esto =  $result['cod'];

					$javier = " esto tengo ".$esto;
					$javier = $result;

			}
			else {
				$javier = array('cod' => 0, 'msj' => 'No hay mesas disponibles');
			}

				
					//print_r($result);

				//

			}
			else if($acc == 4){
				//search 

			}
			
		}
		else{
			$javier = array('cod' => 0, 'msj' => '');
		}

		
		   
			echo json_encode($javier);
	} 


	function restaurante(){

		$text = $_POST['variable'];

		echo json_encode($text);
	}


	

	
}