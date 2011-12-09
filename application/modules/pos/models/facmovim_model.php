<?php

class Facmovim_model extends MY_Model{
	function __construct(){
		parent::__construct();
		$this->setTable('facmovim');
	}
	function add($datos){
		foreach($datos as $d){
			$this->db->insert($this->getTable(),$d);
		}
		return true;
	}
	function getComprobante($idencab){
		$this->db->from($this->getTable());
		$this->db->join('facencab','facencab.id=facmovim.facencab_id','inner');
		$this->db->join('articulos','facmovim.articulo_id=facmovim.facencab_id','inner');
		$this->db->where('facmovim.facencab_id',$idencab);
		return $this->db->get()->result();
	}
}