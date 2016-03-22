<?php

class Factory implements iAbstractFactory{

	public static function getInstance($name, $modelPath = 'models/'){

		require $modelPath.$name.'_imp.php';
		require $modelPath.$name.'_imp.php';
		$modelName = $name.'_Imp';
		$this->model = new $modelName();

		return $this->model;

		//para usarla seria algo como Factory::getInstance($name, $modelPath)

		/*	public function loadModel($name, $modelPath = 'models/'){
		$path = $modelPath.$name.'_imp.php';

		if(file_exists($path)){
			require $modelPath.$name.'_imp.php';
			$modelName = $name.'_Imp';
			$this->model = new $modelName();
			//aqui va el mando a llamar el $this->factory =  factoryproducer.getfactory("modelname")
			//y lo guardaro en $this->model =$this->factory.getShape("circle") ;
			//)
		}
	}*/
	}
}