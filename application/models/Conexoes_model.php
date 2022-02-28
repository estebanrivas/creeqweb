<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conexoes_model extends CI_Model {

	public $idconexao;
	public $conexao;


	public function __construct(){
		parent::__construct();

	}

	public function listar_conexoes(){
		$this->db->order_by('conexao','ASC');
		
        // if ($pular && $post_por_pagina) {
        //     $this->db->limit($post_por_pagina, $pular);
        // } else {
        //     $this->db->limit(10);
        // }

		return $this->db->get('tbconexao')->result();
    }

    public function pesquisa_conexoes()
    {

        $pesquisar = $this->input->post('txt-pesquisar');
        $this->db->select('idconexao,conexao');
        $this->db->from('tbconexao');
        $this->db->order_by('conexao', 'ASC');
        $this->db->like('conexao', $pesquisar);

        // if ($pular && $post_por_pagina) {
        //     $this->db->limit($post_por_pagina, $pular);
        // } else {
        //     $this->db->limit(10);
        // }

        return $this->db->get()->result();
    }

    public function listar_conexoes1()
    {
        $this->db->order_by('conexao', 'ASC');
        return $this->db->get('tbconexao')->result();
    }


	public function listar_conexao($idconexao)
    {
        $this->db->from('tbconexao');
        $this->db->where('md5(idconexao)', $idconexao);
        return $this->db->get()->result();
	}
	
    public function adicionar($conexao)
    {
        $dados['conexao'] = $conexao;
        return $this->db->insert('tbconexao', $dados);
    }

    public function excluir($idconexao)
    {
        $this->db->where('md5(idconexao)', $idconexao);
        return $this->db->delete('tbconexao');
    }

    public function alterar($conexao, $idconexao)
    {
        $dados['conexao']= $conexao;
        $this->db->where('idconexao', $idconexao);
        return $this->db->update('tbconexao', $dados);
	}
	
	public function contar()
    {
        return $this->db->count_all('tbconexao');
    }

    public function contar1($idconexao)
    {
        $this->db->where('tbconexao ='.$idconexao);
        return $this->db->count_all_results('tbconexao');
    }
}
