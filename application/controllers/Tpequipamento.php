<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Tpequipamento extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tpequipamento_model', 'modeltpequipamentos');
        $this->tpequipamentos = $this->modeltpequipamentos->listar_tpequipamentos();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $dados['chamadaJS'] = chamar_js('tpequipamento');
        $this->load->library('table');
        $dados['tpequipamentos'] = $this->modeltpequipamentos->listar_tpequipamentos();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Tipos de Equipamentos';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('tpequipamento/tpequipamento');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-tpequipamento', 'Tipo de Equipamento', 'required|min_length[3]|is_unique[tbtpequipamento.tpequipamento]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $tpequipamento= $this->input->post('txt-tpequipamento');
            if ($this->modeltpequipamentos->adicionar($tpequipamento)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Tipo de equipamento inserido com sucesso.</div>');
                redirect(base_url('tpequipamento'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span> Erro ao inserir tipo de equipamento.</div>');
            }
        }
    }

    public function excluir($idtpequipamento)
    {

        if ($this->modeltpequipamentos->excluir($idtpequipamento)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span> Tipo de Equipamento excluído com sucesso.</div>');
            redirect(base_url('tpequipamento'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span> Erro ao excluir tipo de equipamento.</div>');
        }
    }


    public function alterar($idtpequipamento)
    {
        $dados['chamadaJS'] = chamar_js('tpequipamento');
        $this->load->library('table');
        $dados['tpequipamentos'] = $this->modeltpequipamentos->listar_tpequipamento($idtpequipamento);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Tipos de Equipamentos';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('tpequipamento/alterar-tpequipamento');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-tpequipamento', 'Tipo de Equipamento', 'required|min_length[3]|is_unique[tbtpequipamento.tpequipamento]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $tpequipamento= $this->input->post('txt-tpequipamento');
            $idtpequipamento= $this->input->post('txt-idtpequipamento');
            if ($this->modeltpequipamentos->alterar($tpequipamento, $idtpequipamento)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Tipo de equipamento alterado com sucesso.</div>');
                redirect(base_url('tpequipamento'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span> Erro ao alterar tipo de equipamento.</div>');
            }
        }
	}
}
