<?php
class Facencab_model extends MY_Model{
	function __construct(){
		parent::__construct();
		$this->setTable('facencab');
	}
	function agregar($datos){
		$this->db->set('fecha','NOW()', false);
		return $this->add($datos);
	}
}