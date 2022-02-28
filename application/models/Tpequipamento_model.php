<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpequipamento_model extends CI_Model {

	public $idtpequipamento;
	public $tpequipamento;


	public function __construct(){
		parent::__construct();

	}

	public function listar_tpequipamentos(){
        // $this->db->limit(10);
		$this->db->select('idtpequipamento,tpequipamento');
		$this->db->from('tbtpequipamento');
        $this->db->order_by('tpequipamento','ASC');
		return $this->db->get()->result();
    }

    public function listar_tpequipamentos1()
    {
        $this->db->select('idtpequipamento,tpequipamento');
        $this->db->from('tbtpequipamento');
        $this->db->order_by('tpequipamento', 'ASC');
        return $this->db->get()->result();
    }

	public function listar_tpequipamento($idtpequipamento)
    {
        $this->db->from('tbtpequipamento');
        $this->db->where('md5(idtpequipamento)',$idtpequipamento);
        return $this->db->get()->result();
	}
	
    public function adicionar($tpequipamento)
    {
        $dados['tpequipamento'] = $tpequipamento;
        return $this->db->insert('tbtpequipamento', $dados);
    }

    public function excluir($idtpequipamento)
    {
        $this->db->where('md5(idtpequipamento)', $idtpequipamento);
        return $this->db->delete('tbtpequipamento');
    }

        public function alterar($tpequipamento, $idtpequipamento)
    {
        $dados['tpequipamento']= $tpequipamento;
        $this->db->where('idtpequipamento', $idtpequipamento);
        return $this->db->update('tbtpequipamento', $dados);
    }

    public function contar()
    {
        return $this->db->count_all('tblocalizacao');
    }

    public function contar1($idtpequipamento)
    {
        $this->db->where('tblocalizacao =' . $idtpequipamento);
        return $this->db->count_all_results('tblocalizacao');
    }
}
