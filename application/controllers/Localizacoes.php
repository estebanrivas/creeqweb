<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Localizacoes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('localizacoes_model', 'modellocalizacoes');
        $this->localizacoes = $this->modellocalizacoes->listar_localizacoes();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('localizacoes');
        $dados['localizacoes'] = $this->modellocalizacoes->listar_localizacoes();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Localização';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('localizacoes/localizacoes');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-localizacao', 'Nome da Localizacao', 'required|min_length[3]|is_unique[tblocalizacao.localizacao]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $localizacao= $this->input->post('txt-localizacao');
            if ($this->modellocalizacoes->adicionar($localizacao)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Localização inserida com sucesso.</div>');
                redirect(base_url('localizacoes'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao inserir localização.</div>');
            }
        }
    }

    public function excluir($idlocalizacao)
    {

        if ($this->modellocalizacoes->excluir($idlocalizacao)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span> Localização excluída com sucesso.</div>');
            redirect(base_url('localizacoes'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao excluir localização.</div>');
        }
    }


    public function alterar($idlocalizacao)
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('localizacoes');
        $dados['localizacoes'] = $this->modellocalizacoes->listar_localizar($idlocalizacao);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Localização';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('localizacoes/alterar-localizacoes');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-localizacao', 'Nome da Localização', 'required|min_length[3]|is_unique[tblocalizacao.localizacao]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $localizacao= $this->input->post('txt-localizacao');
            $idlocalizacao= $this->input->post('txt-idlocalizacao');
            if ($this->modellocalizacoes->alterar($localizacao, $idlocalizacao)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Localização alterada com sucesso.</div>');
                redirect(base_url('localizacoes'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao alterar localização.</div>');
            }
        }
    }
}
