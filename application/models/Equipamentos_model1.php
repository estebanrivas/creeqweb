<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Equipamentos_model extends CI_Model {

	public $idequipamento;
    public $tbtpequiamento_idtpequipamento;
    public $host;
    public $usuario;
    public $ip;
    public $patrimonio;
    public $modelo;
    public $serial;
    public $processador;
    public $telamonitor;
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

    public function listar_equipamento($idequipamento)
    {
        $this->db->select('tbequipamento.idequipamento, tbtpequipamento.idtpequipamento as tpequipamentoid, tbtpequipamento.tpequipamento as tipoequipamento, tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.host, tbequipamento.usuario, tbequipamento.ip, tbequipamento.patrimonio, tbequipamento.modelo, tbequipamento.serial, tbequipamento.processador, tbequipamento.telamonitor, tbequipamento.hd, tbequipamento.ram, tbequipamento.mac, tbequipamento.macw, tbequipamento.macb, tbequipamento.tbfabricante_idfabricante, tbequipamento.tbregional_idregional, tbequipamento.tbso_idso, tbequipamento.tbstatus_idstatus, tbequipamento.tblocalizacao_idlocalizacao, tbequipamento.tbunidades_idunidade, tbequipamento.tbconexao_idconexao, tbequipamento.outsourcing, tbequipamento.obs, tbequipamento.teamviewer, tbfabricante.idfabricante as fabricanteid, tbfabricante.fabricante as fabricantesesc, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbso.idso as soid, tbso.so as sosesc, tbstatus.idstatus as statusid, tbstatus.status as statussesc, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc, tbconexao.idconexao as conexaoid, tbconexao.conexao as conexaosesc');

        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
        $this->db->where('md5(idequipamento)', $idequipamento);

        return $this->db->get()->result();
    }

    public function listar_equipamentos($idequipamento)
    {
        // $pesquisar = $this->input->post('txt-pesquisar');
        $this->db->select('tbequipamento.idequipamento, tbtpequipamento.idtpequipamento as tpequipamentoid, tbtpequipamento.tpequipamento as tipoequipamento, tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.host, tbequipamento.usuario, tbequipamento.ip, tbequipamento.patrimonio, tbequipamento.modelo, tbequipamento.serial, tbequipamento.processador, tbequipamento.telamonitor, tbequipamento.hd, tbequipamento.ram, tbequipamento.mac, tbequipamento.macw, tbequipamento.macb, tbequipamento.tbfabricante_idfabricante, tbequipamento.tbregional_idregional, tbequipamento.tbso_idso, tbequipamento.tbstatus_idstatus, tbequipamento.tblocalizacao_idlocalizacao, tbequipamento.tbunidades_idunidade, tbequipamento.tbconexao_idconexao, tbequipamento.outsourcing, tbequipamento.obs, tbequipamento.teamviewer, tbfabricante.idfabricante as fabricanteid, tbfabricante.fabricante as fabricantesesc, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbso.idso as soid, tbso.so as sosesc, tbstatus.idstatus as statusid, tbstatus.status as statussesc, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc, tbconexao.idconexao as conexaoid, tbconexao.conexao as conexaosesc');

        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
        $this->db->where('md5(idequipamento)', $idequipamento);
        return $this->db->get()->result();
    }


	public function pesquisa_equipamentos()
	{
		$pesquisar = $this->input->post('txt-pesquisar');
		$this->db->select('tbequipamento.idequipamento, tbtpequipamento.idtpequipamento as tpequipamentoid, tbtpequipamento.tpequipamento as tipoequipamento, tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.host, tbequipamento.usuario, tbequipamento.ip, tbequipamento.patrimonio, tbequipamento.modelo, tbequipamento.serial, tbequipamento.processador, tbequipamento.telamonitor, tbequipamento.hd, tbequipamento.ram, tbequipamento.mac, tbequipamento.macw, tbequipamento.macb, tbequipamento.tbfabricante_idfabricante, tbequipamento.tbso_idso, tbequipamento.tbstatus_idstatus, tbequipamento.tblocalizacao_idlocalizacao, tbequipamento.tbunidades_idunidade, tbequipamento.tbconexao_idconexao, tbequipamento.outsourcing, tbequipamento.obs, tbequipamento.teamviewer, tbfabricante.idfabricante as fabricanteid, tbfabricante.fabricante as fabricantesesc, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbso.idso as soid, tbso.so as sosesc, tbstatus.idstatus as statusid, tbstatus.status as statussesc, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc, tbconexao.idconexao as conexaoid, tbconexao.conexao as conexaosesc');

		$this->db->from('tbequipamento');
		$this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
		$this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
		$this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
		$this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
		$this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
		$this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
		$this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
		$this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');

		$this->db->like('usuario', $pesquisar);
		$this->db->or_like('patrimonio', $pesquisar);
		$this->db->or_like('host', $pesquisar);
		$this->db->or_like('tbunidades.unidade', $pesquisar);
		return $this->db->get()->result();
	}

    public function adicionar($tbtpequiamento_idtpequipamento, $host, $usuario, $ip, $patrimonio, $modelo, $serial, $processador, $telamonitor, $hd, $ram, $mac, $macw, $macb, $tbfabricante_idfabricante, $tbregional_idregional, $tbso_idso, $tbstatus_idstatus, $tblocalizacao_idlocalizacao, $tbunidades_idunidade, $tbconexao_idconexao, $outsourcing, $obs, $teamviewer)
    {
		$dados['tbtpequipamento_idtpequipamento'] = $tbtpequiamento_idtpequipamento;
		$dados['host'] = $host;
		$dados['usuario'] = $usuario;
		$dados['ip'] = $ip;
		$dados['patrimonio'] = $patrimonio;
		$dados['modelo'] = $modelo;
        $dados['serial'] = $serial;
        $dados['processador'] = $processador;
        $dados['telamonitor'] = $telamonitor;
		$dados['hd'] = $hd;
		$dados['ram'] = $ram;
		$dados['mac'] = $mac;
		$dados['macw'] = $macw;
		$dados['macb'] = $macb;
		$dados['tbfabricante_idfabricante'] = $tbfabricante_idfabricante;
		$dados['tbregional_idregional'] = $tbregional_idregional;
		$dados['tbso_idso'] = $tbso_idso;
		$dados['tbstatus_idstatus'] = $tbstatus_idstatus;
		$dados['tblocalizacao_idlocalizacao'] = $tblocalizacao_idlocalizacao;
		$dados['tbunidades_idunidade'] = $tbunidades_idunidade;
		$dados['tbconexao_idconexao'] = $tbconexao_idconexao;
		$dados['outsourcing'] = $outsourcing;
		$dados['obs'] = $obs;
		$dados['teamviewer'] = $teamviewer;
		
        return $this->db->insert('tbequipamento', $dados);
	}
	
    public function excluir($idequipamento)
    {
        $this->db->where('md5(idequipamento)', $idequipamento);
        return $this->db->delete('tbequipamento');
    }

    // Pegar o id específico do equipamento
    public function pegarequipamentoID($idequipamento=null)
    {
        if ($idequipamento) {
            $this->db->where('idequipamento', $idequipamento);
            $this->db->limit(1);
            return $this->db->get('tbequipamento')->row();
        }
    }

    public function alterar($tbtpequiamento_idtpequipamento, $host, $usuario, $ip, $patrimonio, $modelo, $serial, $processador, $telamonitor, $hd, $ram, $mac, $macw, $macb, $tbfabricante_idfabricante, $tbregional_idregional, $tbso_idso, $tbstatus_idstatus, $tblocalizacao_idlocalizacao, $tbunidades_idunidade, $tbconexao_idconexao, $outsourcing, $obs, $teamviewer, $idequipamento)
    {
        $dados['tbtpequipamento_idtpequipamento'] = $tbtpequiamento_idtpequipamento;
        $dados['host'] = $host;
        $dados['usuario'] = $usuario;
        $dados['ip'] = $ip;
        $dados['patrimonio'] = $patrimonio;
        $dados['modelo'] = $modelo;
        $dados['serial'] = $serial;
        $dados['processador'] = $processador;
        $dados['telamonitor'] = $telamonitor;
        $dados['hd'] = $hd;
        $dados['ram'] = $ram;
        $dados['mac'] = $mac;
        $dados['macw'] = $macw;
        $dados['macb'] = $macb;
        $dados['tbfabricante_idfabricante'] = $tbfabricante_idfabricante;
        $dados['tbregional_idregional'] = $tbregional_idregional;
        $dados['tbso_idso'] = $tbso_idso;
        $dados['tbstatus_idstatus'] = $tbstatus_idstatus;
        $dados['tblocalizacao_idlocalizacao'] = $tblocalizacao_idlocalizacao;
        $dados['tbunidades_idunidade'] = $tbunidades_idunidade;
        $dados['tbconexao_idconexao'] = $tbconexao_idconexao;
        $dados['outsourcing'] = $outsourcing;
        $dados['obs'] = $obs;
        $dados['teamviewer'] = $teamviewer;
        $this->db->where('idequipamento', $idequipamento);
        return $this->db->update('tbequipamento', $dados);
    }
	
	public function contar()
    {
        return $this->db->count_all('tbequipamento');
    }

    public function contar1($idequipamento)
    {
        $this->db->where('tbequipamento ='.$idequipamento);
        return $this->db->count_all_results('tbequipamento');
    }

    public function contardesktop()
    {
        $this->db->select('tbtpequipamento_idtpequipamento');
        $this->db->where('tbtpequipamento_idtpequipamento= 1');
        $this->db->where('tbregional_idregional = 4');
        $q = $this->db->get('tbequipamento');
        $count = $q->result();
        return count($count);
    }

    public function contartablet()
    {
        $this->db->select('tbtpequipamento_idtpequipamento');
        $this->db->where('tbtpequipamento_idtpequipamento= 35');
        $this->db->where('tbregional_idregional = 4');
        $q = $this->db->get('tbequipamento');
        $count = $q->result();
        return count($count);
    }

    public function lista_outsourcing()
    {
        $this->db->select('tbequipamento.idequipamento, tbtpequipamento.idtpequipamento as tpequipamentoid, tbtpequipamento.tpequipamento as tipoequipamento, tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.host, tbequipamento.usuario, tbequipamento.ip, tbequipamento.patrimonio, tbequipamento.modelo, tbequipamento.serial, tbequipamento.processador, tbequipamento.telamonitor, tbequipamento.hd, tbequipamento.ram, tbequipamento.mac, tbequipamento.macw, tbequipamento.macb, tbequipamento.tbfabricante_idfabricante, tbequipamento.tbso_idso, tbequipamento.tbstatus_idstatus, tbequipamento.tblocalizacao_idlocalizacao, tbequipamento.tbunidades_idunidade, tbequipamento.tbconexao_idconexao, tbequipamento.outsourcing, tbequipamento.obs, tbequipamento.teamviewer, tbfabricante.idfabricante as fabricanteid, tbfabricante.fabricante as fabricantesesc, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbso.idso as soid, tbso.so as sosesc, tbstatus.idstatus as statusid, tbstatus.status as statussesc, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc, tbconexao.idconexao as conexaoid, tbconexao.conexao as conexaosesc');
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
        $this->db->where('outsourcing = "SIM"');
        $this->db->order_by('tbunidades.unidade', 'ASC');
        return $this->db->get()->result();
    }

    public function lista_troca_obrigatoria()
    {
        $this->db->select('tbequipamento.idequipamento, tbtpequipamento.idtpequipamento as tpequipamentoid, tbtpequipamento.tpequipamento as tipoequipamento, tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.host, tbequipamento.usuario, tbequipamento.ip, tbequipamento.patrimonio, tbequipamento.modelo, tbequipamento.serial, tbequipamento.processador, tbequipamento.telamonitor, tbequipamento.hd, tbequipamento.ram, tbequipamento.mac, tbequipamento.macw, tbequipamento.macb, tbequipamento.tbfabricante_idfabricante, tbequipamento.tbso_idso, tbequipamento.tbstatus_idstatus, tbequipamento.tblocalizacao_idlocalizacao, tbequipamento.tbunidades_idunidade, tbequipamento.tbconexao_idconexao, tbequipamento.outsourcing, tbequipamento.obs, tbequipamento.teamviewer, tbfabricante.idfabricante as fabricanteid, tbfabricante.fabricante as fabricantesesc, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbso.idso as soid, tbso.so as sosesc, tbstatus.idstatus as statusid, tbstatus.status as statussesc, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc, tbconexao.idconexao as conexaoid, tbconexao.conexao as conexaosesc');
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
        $this->db->where('tbtpequipamento_idtpequipamento = 1');
        $this->db->where('tbequipamento.modelo = "OPTIPLEX 780"');
        $this->db->or_where('tbequipamento.modelo = "OPTIPLEX 760"');
        $this->db->or_where('tbequipamento.modelo = "OPTIPLEX 755"');
        $this->db->having('tbregional.idregional = 4');
        $this->db->order_by('tbequipamento.modelo', 'ASC');
        return $this->db->get()->result();
    }

    public function lista_troca_sugerida()
    {
        $this->db->select('tbequipamento.idequipamento, tbtpequipamento.idtpequipamento as tpequipamentoid, tbtpequipamento.tpequipamento as tipoequipamento, tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.host, tbequipamento.usuario, tbequipamento.ip, tbequipamento.patrimonio, tbequipamento.modelo, tbequipamento.serial, tbequipamento.processador, tbequipamento.telamonitor, tbequipamento.hd, tbequipamento.ram, tbequipamento.mac, tbequipamento.macw, tbequipamento.macb, tbequipamento.tbfabricante_idfabricante, tbequipamento.tbso_idso, tbequipamento.tbstatus_idstatus, tbequipamento.tblocalizacao_idlocalizacao, tbequipamento.tbunidades_idunidade, tbequipamento.tbconexao_idconexao, tbequipamento.outsourcing, tbequipamento.obs, tbequipamento.teamviewer, tbfabricante.idfabricante as fabricanteid, tbfabricante.fabricante as fabricantesesc, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbso.idso as soid, tbso.so as sosesc, tbstatus.idstatus as statusid, tbstatus.status as statussesc, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc, tbconexao.idconexao as conexaoid, tbconexao.conexao as conexaosesc');
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
        $this->db->where('tbtpequipamento_idtpequipamento = 1');
        $this->db->where('tbequipamento.modelo = "OPTIPLEX 990"');
        $this->db->or_where('tbequipamento.modelo = "INFOWAY ST4272"');
        $this->db->or_where('tbequipamento.modelo = "INFOWAY ST4273"');
        $this->db->having('tbregional.idregional = 4');
        $this->db->order_by('tbequipamento.modelo', 'ASC');
        return $this->db->get()->result();
    }

    public function lista_outsourcing_dashboard()
    {
        $this->db->select('tbequipamento.outsourcing, tbregional_idregional');
        $this->db->where('tbstatus_idstatus = 1');
        $this->db->where('tbstatus_idstatus = 2');
        $this->db->or_where('outsourcing = "SIM"');
        $this->db->where('tbregional_idregional = 4');
        $this->db->or_where('tbstatus_idstatus = 14');
        $q=$this->db->get('tbequipamento');
        $count=$q->result();
        return count($count);
    }

    public function soma_notebook_dashboard()
    {
        $this->db->select('tbtpequipamento_idtpequipamento');
        $this->db->where('tbtpequipamento_idtpequipamento= 2');
        $this->db->where('tbregional_idregional = 4');
        $q = $this->db->get('tbequipamento');
        $count = $q->result();
        return count($count);
    }

    public function lista_geral()
    {
        $this->db->select('tbequipamento.idequipamento, tbtpequipamento.idtpequipamento as tpequipamentoid, tbtpequipamento.tpequipamento as tipoequipamento, tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.host, tbequipamento.usuario, tbequipamento.ip, tbequipamento.patrimonio, tbequipamento.modelo, tbequipamento.serial, tbequipamento.processador, tbequipamento.telamonitor, tbequipamento.hd, tbequipamento.ram, tbequipamento.mac, tbequipamento.macw, tbequipamento.macb, tbequipamento.tbfabricante_idfabricante, tbequipamento.tbso_idso, tbequipamento.tbstatus_idstatus, tbequipamento.tblocalizacao_idlocalizacao, tbequipamento.tbunidades_idunidade, tbequipamento.tbconexao_idconexao, tbequipamento.outsourcing, tbequipamento.obs, tbequipamento.teamviewer, tbfabricante.idfabricante as fabricanteid, tbfabricante.fabricante as fabricantesesc, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbso.idso as soid, tbso.so as sosesc, tbstatus.idstatus as statusid, tbstatus.status as statussesc, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc, tbconexao.idconexao as conexaoid, tbconexao.conexao as conexaosesc');
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
        $this->db->order_by('tbtpequipamento.tpequipamento', 'ASC');
        return $this->db->get()->result();
	}

	public function desktopregionaistotal()
	{
		$query = $this->db->query("SELECT tbtpequipamento.tpequipamento,tbregional.regional, COUNT(tbequipamento.tbtpequipamento_idtpequipamento ) AS TOTAL_DESKTOP FROM tbequipamento INNER JOIN tbregional ON tbregional.idregional = tbequipamento.tbregional_idregional INNER JOIN tbtpequipamento ON tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento WHERE tbequipamento.tbtpequipamento_idtpequipamento = 1  GROUP BY tbregional.regional");
		return $query->result();
    }
    
	public function outsourcingRegionaltotal()
	{
		$query = $this->db->query("SELECT tbtpequipamento.tpequipamento, tbregional.regional as Regionais, COUNT(tbequipamento.tbtpequipamento_idtpequipamento) AS TOTAL_IMPRESSORAS FROM tbequipamento	INNER JOIN tbregional ON tbregional.idregional = tbequipamento.tbregional_idregional INNER JOIN tbtpequipamento ON tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento WHERE	tbequipamento.outsourcing = 'SIM' GROUP BY tbregional.regional");
		return $query->result();
	}
}
