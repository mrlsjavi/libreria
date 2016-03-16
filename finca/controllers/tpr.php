<?php

class Tpr extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		//Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		$this->view->js = array('tpr/js/funcionalidad_formulario.js', 'tpr/js/buscador.js');

	}

	function index(){
		$this->view->title = 'TPR';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('tpr/tpr');
		$this->view->render('footer');
	}

	function process(){

		

		$this->model->process();


		
	}

	

	function buscar(){
		//echo "javier";
		echo '<h1>Buscar TPR</h1>
				<div class="cf form-horizontal" obj="Item" acc="4">
					<div class="form-group">
						<label class="col-sm-2 control-label">Codigo TPR: </label>
						<div class="col-sm-10 dato">
							<input type="text" class="data form-control" id="titulo">
						</div>
					</div>
					<div class="boton_ejecutar btn btn-primary btn-lg btn-block">
						Ejecutar
					</div>
				</div>';


	}
}