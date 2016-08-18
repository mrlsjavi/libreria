<?php
require_once("iusuario.php");

require_once("orm/config.php");
require_once("orm/ORM.php");
require_once("orm/usuario_model.php");

//bussines logic
class usuario_Imp implements iUsuario{

	private $nombre;

	public function setVariable($name, $var){
		$nombre = $var;
		echo $nombre;
	}
	public function getVariable($name){

		echo $nombre;

	}

	public function guardar(){
		$values = json_decode($_POST['values']);

		//$result = array('cod'=>1, 'msj'=>$values->nombre);

		

		$data = array(
			'id'=>'',
			'nombre'=>$values->nombre,
			'apellido'=>$values->apellido,
			'estado'=>1);

		$usuario = new usuario_model($data);

		$result = $usuario->save();

		echo json_encode($result);
	}

	public function marcaje(){
		$values = json_decode($_POST['values']);
		$s = "";

		foreach($values as $v){
			$s = $s.$v->usuario;
		}

		$result = array('cod'=>1, 'msj'=>$s);

		echo json_encode($result);
	}

	/*public function setVariable($name, $var){
		$this->$name = $var;
		echo "ok";
	}
	public function getVariable($name){

		echo $this->$name;

	}*/
}