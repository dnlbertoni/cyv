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
		$this->db->select('facencab.fecha as fecha');
		$this->db->select('facencab.puesto as puesto');
		$this->db->select('facencab.numero as numero');
		$this->db->select('facencab.sucursal_id as sucursal_id');
		$this->db->select('sucursales.nombre as sucursal_nombre');
		$this->db->select('facmovim.articulo_id as articulo_id');
		$this->db->select('articulos.nombre as articulo_nombre');
		$this->db->select('facmovim.cantidad as cantidad');
        $this->db->select('facmovim.publico as publico');
		$this->db->select('facmovim.precio as precio');
		$this->db->select('facmovim.precio * facmovim.cantidad as importe');
		$this->db->select('facencab.importe as total');
		$this->db->from($this->getTable());
		$this->db->join('facencab','facencab.id=facmovim.facencab_id','inner');
		$this->db->join('articulos','facmovim.articulo_id=articulos.id','inner');
		$this->db->join('sucursales', 'facencab.sucursal_id=sucursales.id','inner');
		$this->db->where('facmovim.facencab_id',$idencab);
		//echo $this->db->_compile_select();
		return $this->db->get()->result();
	}
}