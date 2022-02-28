<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Fabricante extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('fabricante_model', 'modelfabricantes');
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('fabricante');
		$dados['fabricantes'] = $this->modelfabricantes->listar_fabricantes();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Fabricante';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('fabricante/fabricante');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-fabricante', 'Nome do Fabricante', 'required|min_length[3]|is_unique[tbfabricante.fabricante]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $fabricante= $this->input->post('txt-fabricante');
            if ($this->modelfabricantes->adicionar($fabricante)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Fabricante inserido com sucesso.</div>');
                redirect(base_url('fabricante'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Conexão não foi inserida.</div>');
            }
        }
    }

    public function excluir($idfabricante)
    {

        if ($this->modelfabricantes->excluir($idfabricante)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Excluído!!!</span> Fabricante excluído com sucesso.</div>');
            redirect(base_url('fabricante'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao excluir o fabricante.</div>');
            redirect(base_url('fabricante'));
        }
    }


    public function alterar($idfabricante)
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('fabricante');
        $dados['fabricantes'] = $this->modelfabricantes->listar_fabricante($idfabricante);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Conexões';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('fabricante/alterar-fabricante');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-fabricante', 'Nome do Fabricante', 'required|min_length[3]|is_unique[tbfabricante.fabricante]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $fabricante= $this->input->post('txt-fabricante');
            $idfabricante= $this->input->post('txt-idfabricante');
            if ($this->modelfabricantes->alterar($fabricante, $idfabricante)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Fabricante alterado com sucesso.</div>');
                redirect(base_url('fabricante'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Fabricante não algerado.</div>');
            }
        }
    }
}
