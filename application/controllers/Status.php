<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Status extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('status_model', 'modelstatus');
        $this->status = $this->modelstatus->listar_status();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $dados['chamadaJS'] = chamar_js('status');
        $this->load->library('table');
        $dados['status'] = $this->modelstatus->listar_status();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Status';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('status/status');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-status', 'Nome do Status', 'required|min_length[3]|is_unique[tbstatus.status]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $status= $this->input->post('txt-status');
            if ($this->modelstatus->adicionar($status)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Status inserido com sucesso.</div>');
                redirect(base_url('status'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao tentar inserir o status.</div>');
            }
        }
    }

    public function excluir($idstatus)
    {

        if ($this->modelstatus->excluir($idstatus)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span> Status excluído com sucesso.</div>');
            redirect(base_url('status'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao excluir o status.</div>');
        }
    }


    public function alterar($idstatus)
    {
        $dados['chamadaJS'] = chamar_js('status');
        $this->load->library('table');
        $dados['status'] = $this->modelstatus->listar_statu($idstatus);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'status';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('status/alterar-status');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-status', 'Nome do status', 'required|min_length[3]|is_unique[tbstatus.status]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $status= $this->input->post('txt-status');
            $idstatus= $this->input->post('txt-idstatus');
            if ($this->modelstatus->alterar($status, $idstatus)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Status alterado com sucesso.</div>');
                redirect(base_url('status'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao alterar o status.</div>');
            }
        }
	}
}
