<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Localizar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tpequipamento_model', 'modeltpequipamentos');
        $this->load->model('fabricante_model', 'modelfabricantes');
        $this->load->model('regional_model', 'modelregionais');
        $this->load->model('soperacional_model', 'modelsos');
        $this->load->model('status_model', 'modelstatus');
        $this->load->model('localizacoes_model', 'modellocalizacoes');
        $this->load->model('unidade_model', 'modelunidades');
        $this->load->model('conexoes_model', 'modelconexoes');
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->library('table');
        $this->tpequipamentos = $this->modeltpequipamentos->listar_tpequipamentos1();
        $dados['tpequipamentos'] = $this->tpequipamentos;
        $this->fabricantes = $this->modelfabricantes->listar_fabricantes1();
        $dados['fabricantes'] = $this->fabricantes;
        $this->regionais = $this->modelregionais->listar_regionais1();
        $dados['regionais'] = $this->regionais;
        $this->sos = $this->modelsos->listar_sos();
        $dados['sos'] = $this->sos;
        $this->status = $this->modelstatus->listar_status1();
        $dados['status'] = $this->status;
        $this->localizacoes = $this->modellocalizacoes->listar_localizacoes1();
        $dados['localizacoes'] = $this->localizacoes;
        $this->unidades = $this->modelunidades->listar_unidades1();
        $dados['unidades'] = $this->unidades;
        $this->conexoes = $this->modelconexoes->listar_conexoes1();
        $dados['conexoes'] = $this->conexoes;
        
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Equipamentos';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/localizar1');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }
}
