<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nivel_model extends CI_Model {

	public $idnivel;
	public $nivel_descricao;


	public function __construct(){
		parent::__construct();

	}

	public function listar_niveis(){
        
		$this->db->order_by('nivel_descricao','ASC');
		return $this->db->get('tbnivel')->result();
	}

}
