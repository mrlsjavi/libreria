<?php

class Empleado extends Controller{

	function __construct(){
		parent::__construct(); //llamar el construct del padre que es controller(libs/controller)
		
		//Auth::handleLogin();

		
		//ya tenogo incluido el jquery y aqui mando a llamar su javascript independiente de cada vista 
		//$this->view->js = array('tpr/js/funcionalidad_formulario.js', 'tpr/js/buscador.js');

	}

	function index(){
		$this->view->title = 'Empleado';
		$this->view->render('header');
		//vista carpeta/archivo
		$this->view->render('Empleado/index');
		$this->view->render('footer');
	}

	function process(){

		

		//$this->model->process();


		
	}

	

	
}