<?php 

	class usuario_model extends ORM {
		public $id, $nombre, $apellido, $estado; 
		protected static $table = 'Usuario';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->nombre = isset($data['nombre']) ? $data['nombre'] : null;
			$this->apellido = isset($data['apellido']) ? $data['apellido'] : null;
			$this->estado = isset($data['estado']) ? $data['estado'] : null;
		}
	}

?>
