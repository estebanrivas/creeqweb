<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localizacoes_model extends CI_Model {

	public $idlocalizacao;
	public $localizacao;


	public function __construct(){
		parent::__construct();

	}

	public function listar_localizacoes(){
        // $this->db->limit(10);
		$this->db->select('idlocalizacao,localizacao');
		$this->db->from('tblocalizacao');
        $this->db->order_by('localizacao','ASC');
		return $this->db->get()->result();
    }

    public function listar_localizacoes1()
    {
        $this->db->select('idlocalizacao,localizacao');
        $this->db->from('tblocalizacao');
        $this->db->order_by('localizacao', 'ASC');
        return $this->db->get()->result();
    }

	public function listar_localizar($idlocalizacao)
    {
        $this->db->from('tblocalizacao');
        $this->db->where('md5(idlocalizacao)',$idlocalizacao);
        return $this->db->get()->result();
	}

    public function adicionar($localizacao)
    {
        $dados['localizacao'] = $localizacao;
        return $this->db->insert('tblocalizacao', $dados);
    }

    public function excluir($idlocalizacao)
    {
        $this->db->where('md5(idlocalizacao)', $idlocalizacao);
        return $this->db->delete('tblocalizacao');
    }

        public function alterar($localizacao, $idlocalizacao)
    {
        $dados['localizacao']= $localizacao;
        $this->db->where('idlocalizacao', $idlocalizacao);
        return $this->db->update('tblocalizacao', $dados);
    }

    public function contar()
    {
        return $this->db->count_all('tblocalizacao');
    }

    public function contar1($idlocalizacao)
    {
        $this->db->where('tblocalizacao =' . $idlocalizacao);
        return $this->db->count_all_results('tblocalizacao');
    }
}
