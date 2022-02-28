<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model {

	public $idstatus;
	public $status;


	public function __construct(){
		parent::__construct();

	}

	public function listar_status(){
        // $this->db->limit(10);
		$this->db->select('idstatus,status');
		$this->db->from('tbstatus');
        $this->db->order_by('status','ASC');
		return $this->db->get()->result();
    }

    public function listar_status1()
    {
        $this->db->select('idstatus,status');
        $this->db->from('tbstatus');
        $this->db->order_by('status', 'ASC');
        return $this->db->get()->result();
    }

	public function listar_statu($idstatus)
    {
        $this->db->from('tbstatus');
        $this->db->where('md5(idstatus)',$idstatus);
        return $this->db->get()->result();
	}
	
    public function adicionar($status)
    {
        $dados['status'] = $status;
        return $this->db->insert('tbstatus', $dados);
    }

    public function excluir($idstatus)
    {
        $this->db->where('md5(idstatus)', $idstatus);
        return $this->db->delete('tbstatus');
    }

        public function alterar($status, $idstatus)
    {
        $dados['status']= $status;
        $this->db->where('idstatus', $idstatus);
        return $this->db->update('tbstatus', $dados);
    }

    public function contar()
    {
        return $this->db->count_all('tblocalizacao');
    }

    public function contar1($idstatus)
    {
        $this->db->where('tblocalizacao =' . $idstatus);
        return $this->db->count_all_results('tblocalizacao');
    }
}
