<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos_model extends CI_Model {

    public $idcontatos;
    public $nome_contato;
    public $email_contato;
    public $telefone_contato;
    public $idunidade_contato;
    public $idregional_contato;
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function adicionar($nome_contato, $email_contato, $telefone_contato, $idunidade_contato, $idregional_contato){

        $dados['nome_contato']          = $nome_contato;
        $dados['email_contato']         = $email_contato;
        $dados['telefone_contato']      = $telefone_contato;
        $dados['idunidade_contato']     = $idunidade_contato;
        $dados['idregional_contato']    = $idregional_contato;

        return $this->db->insert('tbcontatos', $dados);
    }

    public function excluir($idcontatos){

        $this->db->where('md5(idcontatos)', $idcontatos);
        return $this->db->delete('tbcontatos');

    }

    public function alterar($nome_contato, $email_contato, $telefone_contato, $idunidade_contato, $idregional_contato, $idcontatos){

        $dados['nome_contato']          = $nome_contato;
        $dados['email_contato']         = $email_contato;
        $dados['telefone_contato']      = $telefone_contato;
        $dados['idunidade_contato']     = $idunidade_contato;
        $dados['idregional_contato']    = $idregional_contato;
        $this->db->where('idcontatos', $idcontatos);
        return $this->db->update('tbcontatos', $dados);

    }

    public function listaAlterarcontato($idcontatos)
    {
        $this->db->select('*');
        $this->db->order_by('nome_contato', 'ASC');
        $this->db->where('md5(idcontatos)', $idcontatos);

        return $this->db->get('tbcontatos')->result();
    }

    public function listaContato()
    {
        $this->db->select('tbcontatos.idcontatos, tbcontatos.nome_contato, tbcontatos.email_contato, tbcontatos.telefone_contato, tbcontatos.idunidade_contato, tbcontatos.idregional_contato, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbunidades.idunidade as unidadeid, tbunidades.unidade as unidadesesc');
        $this->db->from('tbcontatos');
        $this->db->join('tbregional', 'tbregional.idregional = tbcontatos.idregional_contato');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbcontatos.idunidade_contato');
        $this->db->order_by('tbcontatos.nome_contato', 'ASC');
        return $this->db->get()->result();
    }



}

/* End of file Contatos_model.php */
