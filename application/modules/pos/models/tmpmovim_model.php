<?php
/**
 * Description of tmpmovim
 *
 * @author dnl
 */
class Tmpmovim_model extends MY_Model{
  function __construct() {
    parent::__construct();
    $this->setTable('tmpmovim');
  }
  function getDetalle($puesto, $numero,$sucursal){
    $this->db->select('tmpmovim.id');
    $this->db->select('cantidad');
    $this->db->select('articulo as articulo_id');
    $this->db->select('articulos.nombre as articulo_nombre');
    $this->db->select('tmpmovim.precio as articulo_precio');
    $this->db->select('articulos.publico as articulo_publico');
    $this->db->select('tmpmovim.precio as articulo_precio');
    $this->db->select('tmpmovim.precio * cantidad as importe');
    $this->db->from($this->getTable());
    $this->db->join('articulos', 'articulo=articulos.id', 'inner');
    $this->db->where('puesto', $puesto);
    $this->db->where('numero', $numero);
    $this->db->where('sucursal', $sucursal);
    $this->db->order_by('tmpmovim.id', 'DESC');
    return $this->db->get()->result();
  }
  function vacioTemporal($puesto, $numero ,$sucursal){
    $this->db->where('puesto', $puesto);
    $this->db->where('numero', $numero);
    $this->db->where('sucursal', $sucursal);
    $this->db->delete($this->getTable());
  }
  function toSave($puesto, $numero,$sucursal){
    $this->db->select('cantidad');
    $this->db->select('articulo as articulo_id');
    $this->db->select('tmpmovim.precio as articulo_precio');
    $this->db->select('articulos.publico as articulo_publico');
    $this->db->select('tmpmovim.precio as articulo_precio');
    $this->db->select('tmpmovim.precio * cantidad as importe');
    $this->db->from($this->getTable());
    $this->db->join('articulos', 'articulo=articulos.id', 'inner');
    $this->db->where('puesto', $puesto);
    $this->db->where('numero', $numero);
    $this->db->where('sucursal', $sucursal);
    $this->db->order_by('tmpmovim.id', 'DESC');
    return $this->db->get()->result();
  }
  
}
