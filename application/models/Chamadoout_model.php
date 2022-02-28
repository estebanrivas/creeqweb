<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chamadoout_model extends CI_model
{
	public $idchamadoout;
	public $patrimonio;
	public $serial;
	public $host;
	public $unidade;
	public $localizacao;
	public $chamadoservicedesk;
	public $chamadoout;
	public $datachamado;
	public $contadortotal;
	public $contadorpb;
	public $contadorcolor;
	public $statuschamadoout;
	public $descricaochamadoout;
	public $descricaosolucaochamadoout;


	public function __construct()
	{
		parent::__construct();

		// Set table name
		$this->table = 'outsourcing_view';

		// Set orderable column fields
		$this->column_order = array(null, 'patrimonio', 'serial', 'ip', 'unidadessesc', 'host', 'localizacaosesc');
		// Set searchable column fields
		$this->column_search = array('patrimonio', 'serial', 'ip', 'unidadessesc', 'host', 'localizacaosesc');
		// Set default ordersão 
		$this->order = array('ip' => 'asc');
		// $this->dbTbl = 'tbequipamento';

		$this->dbTbl = 'outsourcinggeral_view';
	}

	// Função de incluir chamados outsourcing
	public function inserirChamadoout($patrimonio, $serial, $host, $unidade, $localizacao, $chamadoservicedesk, $chamadoout, $datachamado, $contadortotal, $contadorpb, $contadorcolor, $statuschamadoout, $descricaochamadoout, $descricaosolucaochamadoout)
	{

		$dados['patrimonio']                    = $patrimonio;
		$dados['serial']                        = $serial;
		$dados['host']                          = $host;
		$dados['unidade']                       = $unidade;
		$dados['localizacao']                   = $localizacao;
		$dados['chamadoservicedesk']            = $chamadoservicedesk;
		$dados['chamadoout']                    = $chamadoout;
		$dados['datachamado']                   = $datachamado;
		$dados['contadortotal']                 = $contadortotal;
		$dados['contadorpb']                    = $contadorpb;
		$dados['contadorcolor']                 = $contadorcolor;
		$dados['statuschamadoout']              = $statuschamadoout;
		$dados['descricaochamadoout']           = $descricaochamadoout;
		$dados['descricaosolucaochamadoout']    = $descricaosolucaochamadoout;


		return $this->db->insert('tbchamadoout', $dados);
	}

	// Função de excluir chamado outsourcing
	public function excluirChamadoout($idchamadoout)
	{
		$this->db->where('md5(idchamadoout)', $idchamadoout);
		return $this->db->delete('tbchamadoout');
	}

	// Função de alterar chamado outsourcing
	public function alterarChamadoout($patrimonio, $serial, $host, $unidade, $localizacao, $chamadoservicedesk, $chamadoout, $datachamado, $contadortotal, $contadorpb, $contadorcolor, $statuschamadoout, $descricaochamadoout, $descricaosolucaochamadoout, $idchamadoout)
	{
		$dados['patrimonio']                    = $patrimonio;
		$dados['serial']                        = $serial;
		$dados['host']                          = $host;
		$dados['unidade']                       = $unidade;
		$dados['localizacao']                   = $localizacao;
		$dados['chamadoservicedesk']            = $chamadoservicedesk;
		$dados['chamadoout']                    = $chamadoout;
		$dados['datachamado']                   = $datachamado;
		$dados['contadortotal']                 = $contadortotal;
		$dados['contadorpb']                    = $contadorpb;
		$dados['contadorcolor']                 = $contadorcolor;
		$dados['statuschamadoout']              = $statuschamadoout;
		$dados['descricaochamadoout']           = $descricaochamadoout;
		$dados['descricaosolucaochamadoout']    = $descricaosolucaochamadoout;

		$this->db->where('idchamadoout', $idchamadoout);
		return $this->db->update('tbchamadoout', $dados);
	}

	public function lista_alteracao($idchamadoout)
	{
		$this->db->select('*');
		$this->db->order_by('serial', 'ASC');
		$this->db->where('md5(idchamadoout)', $idchamadoout);

		return $this->db->get('tbchamadoout')->result();
	}

	public function lista_chamadoout()
	{
		$this->db->select('*');
		$this->db->from('tbchamadoout');
		$this->db->order_by('datachamado', 'ASC');
		return $this->db->get()->result();
	}

	public function getSeriais_geral($params = array())
	{
		$this->db->select("*");
		$this->db->from($this->dbTbl);

		//fetch data by conditions
		if (array_key_exists("conditions", $params)) {
			foreach ($params['conditions'] as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		//search by terms
		if (!empty($params['searchTerm'])) {
			$this->db->like('serial', $params['searchTerm']);
		}

		$this->db->order_by('serial', 'asc');

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


	public function getPatrimonios_geral($params = array())
	{
		$this->db->select("*");
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
}

/* End of file Chamadoout_model.php */
