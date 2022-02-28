<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Patrimonio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('regional_model', 'modelregionais');
        // $this->regionais = $this->modelregionais->listar_regionais();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index(){

        $dados['chamadaJS'] = chamar_js('regional');
        $this->load->library('table');
        $dados['regionais'] = $this->modelregionais->listar_regionais();
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Controle de Patrimônio';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('patrimonio/patrimonio');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }


}
