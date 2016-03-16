<?php

class Producto extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		//Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		$this->view->js = array('producto/js/funcionalidad_formulario.js', 'producto/js/buscador.js');

	}

	function index(){
		$this->view->title = 'Producto';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('producto/producto');
		$this->view->render('footer');
	}

	function process(){

		$this->model->process();
		
	}

	

	function buscar(){
		//echo "javier";
		echo '<h1>Buscar Producto</h1>
				<div class="cf form-horizontal" obj="Item" acc="4">
					<div class="form-group">
						<label class="col-sm-2 control-label">Producto: </label>
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