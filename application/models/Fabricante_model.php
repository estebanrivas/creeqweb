<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabricante_model extends CI_Model {

	public $idfabricante;
	public $fabricante;


	public function __construct(){
		parent::__construct();

	}

	public function listar_fabricantes(){
		// $this->db->limit(10);
		$this->db->select('idfabricante,fabricante');
		$this->db->from('tbfabricante');
		$this->db->order_by('fabricante','ASC');
		return $this->db->get()->result();
    }

    public function listar_fabricantes1()
    {
		$this->db->select('idfabricante,fabricante');
        $this->db->from('tbfabricante');
        $this->db->order_by('fabricante', 'ASC');
        return $this->db->get()->result();
    }

    public function pesquisa_fabricantes()
    {

        $pesquisar = $this->input->post('txt-pesquisar');
        $this->db->select('idfabricante,fabricante');
        $this->db->from('tbfabricante');
        $this->db->order_by('fabricante', 'ASC');
        $this->db->like('fabricante', $pesquisar);

        return $this->db->get()->result();
    }
    
    
        public function listar_fabricante($idfabricante)
    {
        $this->db->from('tbfabricante');
        $this->db->where('md5(idfabricante)', $idfabricante);
        return $this->db->get()->result();
    }

    public function adicionar($fabricante)
    {
        $dados['fabricante'] = $fabricante;
        return $this->db->insert('tbfabricante', $dados);
    }

    public function excluir($idfabricante)
    {
        $this->db->where('md5(idfabricante)', $idfabricante);
        return $this->db->delete('tbfabricante');
    }

	public function alterar($fabricante, $idfabricante)
    {
        $dados['fabricante']= $fabricante;
        $this->db->where('idfabricante', $idfabricante);
        return $this->db->update('tbfabricante', $dados);
	}
	
	public function contar()
    {
        return $this->db->count_all('tbfabricante');
    }

    public function contar1($idfabricante)
    {
        $this->db->where('tbfabricante ='.$idfabricante);
        return $this->db->count_all_results('tbfabricante');
    }
}
