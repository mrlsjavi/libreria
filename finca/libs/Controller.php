<?php

class Controller{

	function __construct(){
		//echo "Main Controller<br>";
		//en el controller principal tenemos el objeto de la vista
		$this->view = new View();

	}

	public function loadModel($name, $modelPath = 'models/'){
		$path = $modelPath.$name.'_imp.php';

		if(file_exists($path)){
			require $modelPath.$name.'_imp.php';
			$modelName = $name.'_Imp';
			$this->model = new $modelName();

			//aqui quedaria asi 
			//$this->model = Factoyr::getInstance($name, $modelPath='models/');

			//aqui va el mando a llamar el $this->factory =  factoryproducer.getfactory("modelname")
			//y lo guardaro en $this->model =$this->factory.getShape("circle") ;
			//)
		}
	}
}