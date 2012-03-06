<?php
/**
 * Description of numerador_model
 *
 * @author dnl
 */
class Numerador_model extends MY_Model{
  function __construct() {
    parent::__construct();
    $this->setTable('numerador');
  }
  function getNextRemito($puesto){
    $this->db->select('numero');
    $this->db->from($this->getTable());
    $this->db->where('puesto',$puesto);
    $this->db->where('tipcom',1);
    return $this->db->get()->row()->numero;
  }
  function nextRemito($puesto){
    $this->db->set('numero','numero+1',false);
    $this->db->where('puesto',$puesto);
    $this->db->where('tipcom',1);
	return $this->db->update($this->getTable());
  }  
}
