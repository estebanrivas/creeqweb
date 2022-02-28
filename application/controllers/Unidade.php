<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Unidade extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('unidade_model', 'modelunidades');
        $this->unidades = $this->modelunidades->listar_unidades();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $dados['chamadaJS'] = chamar_js('unidade');
        $this->load->library('table');
        $this->load->library('pagination');
        $dados['unidades'] = $this->modelunidades->listar_unidades();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Unidades';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('unidade/unidade');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-unidade', 'Nome da Unidade', 'required|min_length[3]|is_unique[tbunidades.unidade]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $unidade= $this->input->post('txt-unidade');
            if ($this->modelunidades->adicionar($unidade)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Unidade inserida com sucesso.</div>');
                redirect(base_url('unidade'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Unidade não foi inserida.</div>');
            }
        }
    }

    public function excluir($idunidade)
    {

        if ($this->modelunidades->excluir($idunidade)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span> Unidade excluída com sucesso.</div>');
            redirect(base_url('unidade'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Unidade não foi excluída.</div>');
        }
    }


    public function alterar($idunidade)
    {
        $dados['chamadaJS'] = chamar_js('unidade');
        $this->load->library('table');
        $dados['unidades'] = $this->modelunidades->listar_unidade($idunidade);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Unidade';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('unidade/alterar-unidade');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-unidade', 'Nome da unidade', 'required|min_length[3]|is_unique[tbunidades.unidade]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $unidade= $this->input->post('txt-unidade');
            $idunidade= $this->input->post('txt-idunidade');
            if ($this->modelunidades->alterar($unidade, $idunidade)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Unidade alterada com sucesso.</div>');
                redirect(base_url('unidade'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">erro!!!</span>Unidade não alterada.</div>');
            }
        }
	}
}
