<?php
//bussines logic
	require_once('orm/config.php');
	require_once('orm/ORM.php');
	
	require_once('orm/_tpr.php');


class Empleado_Model extends Model{

	function __construct(){
		//para que inicialize el constructor del modal 
		parent::__construct();
	}


	function process(){
	
		echo json_encode("javier");

	}


}