<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regional_model extends CI_Model {

	public $idregional;
	public $regional;


	public function __construct(){
		parent::__construct();

	}

    public function listar_regionais()
    {
        // $this->db->limit(10);
		$this->db->select('idregional,regional');
		$this->db->from('tbregional');
		$this->db->order_by('regional','ASC');
		return $this->db->get()->result();
    }

    public function listar_regionais1()
    {
        $this->db->select('idregional,regional');
        $this->db->from('tbregional');
        $this->db->order_by('regional', 'ASC');
        return $this->db->get()->result();
    }

	public function listar_regional($idregional)
    {
        $this->db->from('tbregional');
        $this->db->where('md5(idregional)',$idregional);
        return $this->db->get()->result();
	}

    public function adicionar($regional)
    {
        $dados['regional'] = $regional;
        return $this->db->insert('tbregional', $dados);
    }

    public function excluir($idregional)
    {
        $this->db->where('md5(idregional)', $idregional);
        return $this->db->delete('tbregional');
    }

	public function alterar($regional, $idregional)
    {
        $dados['regional']= $regional;
        $this->db->where('idregional', $idregional);
        return $this->db->update('tbregional', $dados);
	}
	
	public function contar()
    {
        return $this->db->count_all('tbregional');
    }

    public function contar1($idregional)
    {
        $this->db->where('tbregional ='.$idregional);
        return $this->db->count_all_results('tbregional');
    }
}
