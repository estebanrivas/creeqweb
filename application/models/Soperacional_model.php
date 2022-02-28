<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soperacional_model extends CI_Model {

	public $idso;
	public $so;


	public function __construct(){
		parent::__construct();

	}

	public function listar_sos(){
        // $this->db->limit(10);
		$this->db->select('idso,so');
		$this->db->from('tbso');
        $this->db->order_by('so','ASC');
		return $this->db->get()->result();
	}

    public function listar_sos1()
    {
        $this->db->select('idso,so');
        $this->db->from('tbso');
        $this->db->order_by('so', 'ASC');
        return $this->db->get()->result();
    }

	public function listar_so($idso)
    {
        $this->db->from('tbso');
        $this->db->where('md5(idso)',$idso);
        return $this->db->get()->result();
    }

    public function adicionar($so)
    {
        $dados['so'] = $so;
        return $this->db->insert('tbso', $dados);
    }

    public function excluir($idso)
    {
        $this->db->where('md5(idso)', $idso);
        return $this->db->delete('tbso');
    }

        public function alterar($so, $idso)
    {
        $dados['so']= $so;
        $this->db->where('idso', $idso);
        return $this->db->update('tbso', $dados);
    }

    public function contar()
    {
        return $this->db->count_all('tbso');
    }

    public function contar1($idso)
    {
        $this->db->where('tbso =' . $idso);
        return $this->db->count_all_results('tbso');
    }
}
