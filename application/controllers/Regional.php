<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Regional extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('regional_model', 'modelregionais');
        $this->regionais = $this->modelregionais->listar_regionais();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    { 
        $dados['chamadaJS'] = chamar_js('regional');
        $this->load->library('table');
        $dados['regionais'] = $this->modelregionais->listar_regionais();
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Regional';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('regional/regional');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-regional', 'Nome da Regional', 'required|min_length[3]|is_unique[tbregional.regional]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $regional= $this->input->post('txt-regional');
            if ($this->modelregionais->adicionar($regional)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Regional inserida com sucesso.</div>');
                redirect(base_url('regional'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Regional não foi inserido.</div>');
            }
        }
    }

    public function excluir($idregional)
    {

        if ($this->modelregionais->excluir($idregional)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span> Regional excluída com sucesso.</div>');
            redirect(base_url('regional'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Regional não foi excluída.</div>');
        }
    }


    public function alterar($idregional)
    {
        $dados['chamadaJS'] = chamar_js('regional');
        $this->load->library('table');
        $dados['regionais'] = $this->modelregionais->listar_regional($idregional);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Regional';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('regional/alterar-regional');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-regional', 'Nome da Regional', 'required|min_length[3]|is_unique[tbregional.regional]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $regional= $this->input->post('txt-regional');
            $idregional= $this->input->post('txt-idregional');
            if ($this->modelregionais->alterar($regional, $idregional)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Regional alterada com sucesso.</div>');
                redirect(base_url('regional'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Regional não foi alterada.</div>');
            }
        }
    }
}
