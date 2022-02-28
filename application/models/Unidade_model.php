<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unidade_model extends CI_Model {

	public $idunidade;
    public $unidade;



	public function __construct(){
		parent::__construct();

	}

	public function listar_unidades(){
        // $this->db->limit(10);
		$this->db->select('idunidade,unidade');
		$this->db->from('tbunidades');
        $this->db->order_by('unidade','ASC');
		return $this->db->get()->result();
    }

    public function listar_unidades1()
    {
        $this->db->select('idunidade,unidade');
        $this->db->from('tbunidades');
        $this->db->order_by('unidade', 'ASC');
        return $this->db->get()->result();
	}

    public function listar_unidade($idunidade)
    {
        $this->db->from('tbunidades');
        $this->db->where('md5(idunidade)',$idunidade);
        return $this->db->get()->result();
    }

    public function adicionar($unidade)
    {
        $dados['unidade'] = $unidade;
        return $this->db->insert('tbunidades', $dados);
    }

    public function excluir($idunidade)
    {
        $this->db->where('md5(idunidade)', $idunidade);
        return $this->db->delete('tbunidades');
    }

        public function alterar($unidade, $idunidade)
    {
        $dados['unidade']= $unidade;
        $this->db->where('idunidade', $idunidade);
        return $this->db->update('tbunidades', $dados);
    }

    public function contar()
    {
        return $this->db->count_all('tblocalizacao');
    }

    public function contar1($idunidade)
    {
        $this->db->where('tblocalizacao =' . $idunidade);
        return $this->db->count_all_results('tblocalizacao');
    }
}
