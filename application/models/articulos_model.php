<?php
/**
 * Modelo de la tabla Articulos para el controlador Articulos
 *
 * @author dnl
 */
class Articulos_model extends MY_Model{
  function __construct() {
    parent::__construct();
    $this->setTable('articulos');
  }
}

