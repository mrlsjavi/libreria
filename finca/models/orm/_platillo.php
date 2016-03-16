<?php 

	class _platillo extends ORM {
		public $id, $titulo, $principal, $estatus;
		protected static $table = 'platillo';

		public function __construct($data){
			parent::__construct(); //llamo el orm
			if($data && sizeof($data)){
				$this->populateFromRow($data);
			}
		}

		public function populateFromRow($data){

			$this->id = isset($data['id']) ? intval($data['id']) : null;
			$this->titulo = isset($data['titulo']) ? $data['titulo'] : null;
			$this->principal = isset($data['principal']) ? intval($data['principal']) : null;
			$this->estatus = isset($data['estatus']) ? $data['estatus'] : null;
		}
	}

?>

