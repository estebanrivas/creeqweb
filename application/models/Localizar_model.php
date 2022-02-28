<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conexoes_model extends CI_Model {

    public $idequipamento;
    public $tbtpequiamento_idtpequipamento;
    public $host;
    public $usuario;
    public $ip;
    public $patrimonio;
    public $modelo;
    public $serial;
    public $hd;
    public $ram;
    public $mac;
    public $macw;
    public $macb;
    public $tbfabricante_idfabricante;
    public $tbregional_idregional;
    public $tbso_idso;
    public $tbstatus_idstatus;
    public $tblocalizacao_idlocalizacao;
    public $tbunidades_idunidade;
    public $tbconexao_idconexao;
    public $outsourcing;
    public $obs;
    public $teamviewer;


	public function __construct(){
		parent::__construct();

	}

	// public function listar_conexoes($pular = null, $post_por_pagina = null){
	// 	$this->db->order_by('conexao','ASC');
		
    //     if ($pular && $post_por_pagina) {
    //         $this->db->limit($post_por_pagina, $pular);
    //     } else {
    //         $this->db->limit(10);
    //     }

	// 	return $this->db->get('tbconexao')->result();
    // }

    public function pesquisa_equipamento($pular = null, $post_por_pagina = null)
    {

        $pesquisar = $this->input->post('txt-pesquisar');
        $this->db->select('*');
        $this->db->from('tbequipamento');
        // $this->db->order_by('conexao', 'ASC');
        $this->db->like('patrimonio', $pesquisar);
        $this->db->or_like('usuario', $pesquisar);
        $this->db->or_like('tbunidades_idunidade', $pesquisar);
		$this->db->or_like('tbtpequiamento_idtpequipamento', $pesquisar);

        if ($pular && $post_por_pagina) {
            $this->db->limit($post_por_pagina, $pular);
        } else {
            $this->db->limit(10);
        }

        return $this->db->get()->result();
    }

    // public function listar_conexoes1()
    // {
    //     $this->db->order_by('conexao', 'ASC');
    //     return $this->db->get('tbconexao')->result();
    // }


	// public function listar_conexao($idconexao)
    // {
    //     $this->db->from('tbconexao');
    //     $this->db->where('md5(idconexao)', $idconexao);
    //     return $this->db->get()->result();
	// }
	
    // public function adicionar($conexao)
    // {
    //     $dados['conexao'] = $conexao;
    //     return $this->db->insert('tbconexao', $dados);
    // }

    // public function excluir($idconexao)
    // {
    //     $this->db->where('md5(idconexao)', $idconexao);
    //     return $this->db->delete('tbconexao');
    // }

    // public function alterar($conexao, $idconexao)
    // {
    //     $dados['conexao']= $conexao;
    //     $this->db->where('idconexao', $idconexao);
    //     return $this->db->update('tbconexao', $dados);
	// }
	
	// public function contar()
    // {
    //     return $this->db->count_all('tbconexao');
    // }

    // public function contar1($idconexao)
    // {
    //     $this->db->where('tbconexao ='.$idconexao);
    //     return $this->db->count_all_results('tbconexao');
    // }
}
