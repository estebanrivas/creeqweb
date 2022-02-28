<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Conexoes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('conexoes_model', 'modelconexoes');
        $this->conexoes = $this->modelconexoes->listar_conexoes();
        if(!$this->session->userdata('logado')){
            redirect(base_url('admin/login'));
        }
    }

    public function index()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('conexoes');
		$dados['conexoes'] = $this->modelconexoes->listar_conexoes();
        
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = 'Creeq';
        $dados['nomesistema'] = 'Creeq';
        $dados['versao'] = 'v3.5.2';
        $dados['subtitulo'] = 'Conexões';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('conexoes/conexoes');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-conexao', 'Nome da Conexão', 'required|min_length[3]|is_unique[tbconexao.conexao]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $conexao= $this->input->post('txt-conexao');
            if ($this->modelconexoes->adicionar($conexao)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Conexão inserida com sucesso.</div>');
                redirect(base_url('conexoes'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Falha ao inserir conexão.</div>');;
            }
        }
    }

    public function excluir($idconexao)
    {

        if ($this->modelconexoes->excluir($idconexao)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Excluído!!!</span> Equipamento excluído com sucesso.</div>');
            redirect(base_url('conexoes'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Equipamento não excluído.</div>');
        }
    }

    public function alterar($idconexao)
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('conexao');
        $dados['conexoes'] = $this->modelconexoes->listar_conexao($idconexao);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = 'Creeq';
        $dados['nomesistema'] = 'Creeq';
        $dados['versao'] = 'v3.5.2';
        $dados['subtitulo'] = 'Conexões';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('conexoes/alterar-conexoes');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-conexao', 'Nome da Conexão', 'required|min_length[3]|is_unique[tbconexao.conexao]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $conexao= $this->input->post('txt-conexao');
            $idconexao= $this->input->post('txt-idconexao');
            if ($this->modelconexoes->alterar($conexao, $idconexao)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Conexão alterada com sucesso.</div>');
                redirect(base_url('conexoes'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Conexão não alterada.</div>');
            }
        }
    }
}
