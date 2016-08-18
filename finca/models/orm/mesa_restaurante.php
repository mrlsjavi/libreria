<?php 

	class mesa_restaurante extends ORM {
		public $id, $restaurante, $obj_restaurante, $mesa, $obj_mesa,  $estatus;
		protected static $table = 'mesa_restaurante';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->restaurante = isset($data['restaurante']) ? $data['restaurante'] : null;
			

			if($this->restaurante){
				$this->obj_restaurante = restaurante::find($this->restaurante);
				
			}

			$this->mesa = isset($data['mesa']) ? $data['mesa'] : null;
			
			if($this->mesa){
				$this->obj_mesa = mesa::find($this->mesa);
			}
			
			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;
		}
	}

?>

