<?php
require_once("iusuario.php");
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


	/*public function setVariable($name, $var){
		$this->$name = $var;
		echo "ok";
	}
	public function getVariable($name){

		echo $this->$name;

	}*/
}