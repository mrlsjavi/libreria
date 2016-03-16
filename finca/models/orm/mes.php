<?php 

	class mes extends ORM {
		public $id, $titulo, $ubicacion, $fumador, $capacidad, $estatus;
		protected static $table = 'mesa';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;
			$this->ubicacion = isset($data['ubicacion']) ? $data['ubicacion'] : null;
			$this->fumador = isset($data['fumador']) ? $data['fumador'] : null;
			$this->capacidad = isset($data['capacidad']) ? $data['capacidad'] : null;
			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;
		}
	}

?>