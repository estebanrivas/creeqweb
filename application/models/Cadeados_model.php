<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cadeados_model extends CI_Model
{

    public $idcadeados;
    public $codigo;
    public $patrimonio;
    public $unidade;
    public $localizacao;
    public $usuario;


    public function __construct()
    {
        parent::__construct();
        $this->dbTbl = 'cadeados_view';
    }

    public function lista_cadeados()
    {
        $this->db->select('tbcadeados.idcadeados, tbcadeados.codigo, tbcadeados.patrimonio, tbcadeados.unidade, tbcadeados.localizacao, tbcadeados.usuario');
        $this->db->order_by('tbcadeados.unidade', 'ASC');
        return $this->db->get('tbcadeados')->result();
    }

    public function lista_alteracao($idcadeados)
    {
        $this->db->select('tbcadeados.idcadeados, tbcadeados.codigo, tbcadeados.patrimonio, tbcadeados.unidade, tbcadeados.localizacao, tbcadeados.usuario');
        $this->db->order_by('tbcadeados.unidade', 'ASC');
        $this->db->where('md5(idcadeados)', $idcadeados);
        
        return $this->db->get('tbcadeados')->result();
    }

    // GETPATRIMONO DO AUTOCOMPLETE
    public function getPatrimonios1($params = array())
    {
        $this->db->select('*');
        $this->db->from($this->dbTbl);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('patrimonio', $params['searchTerm']);
        }

        $this->db->order_by('patrimonio', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function lista_patrimonio_usuario()
    {
        $this->db->select('tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.patrimonio as patrimonio, tbequipamento.usuario as usuario, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc');
        $this->db->from('tbequipamento');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->where('tbequipamento.tbtpequipamento_idtpequipamento = 1');
        $this->db->or_where('tbequipamento.tbtpequipamento_idtpequipamento = 2');
        $this->db->order_by('tbequipamento.patrimonio', 'ASC');
        return $this->db->get()->result();

    }

    public function adicionar($codigo, $patrimonio, $unidade, $localizacao, $usuario)
    {
        $dados['codigo']        = $codigo;
        $dados['patrimonio']    = $patrimonio;
        $dados['unidade']       = $unidade;
        $dados['localizacao']   = $localizacao;
        $dados['usuario']       = $usuario;

        return $this->db->insert('tbcadeados', $dados);
    }

    public function excluir($idcadeados)
    {
        $this->db->where('md5(idcadeados)', $idcadeados);
        return $this->db->delete('tbcadeados');
    }

    public function alterar($codigo, $patrimonio, $unidade, $localizacao, $usuario, $idcadeados)
    {
        $dados['codigo']        = $codigo;
        $dados['patrimonio']    = $patrimonio;
        $dados['unidade']       = $unidade;
        $dados['localizacao']   = $localizacao;
        $dados['usuario']       = $usuario;
        $this->db->where('idcadeados', $idcadeados);
        return $this->db->update('tbcadeados', $dados);
    }


    /*
    * Get seriais form the tbequipamento table
    */
    
}
