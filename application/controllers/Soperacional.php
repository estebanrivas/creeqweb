<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Soperacional extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('soperacional_model', 'modelsos');
        $this->sos = $this->modelsos->listar_sos();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $dados['chamadaJS'] = chamar_js('soperacional');
        $this->load->library('table');
        $dados['sos'] = $this->modelsos->listar_sos();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Sistemas Operacionais';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('soperacional/soperacional');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-so', 'Sistema Operacional', 'required|min_length[3]|is_unique[tbso.so]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $so= $this->input->post('txt-so');
            if ($this->modelsos->adicionar($so)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span>
											Sistema Operacional inserido com sucesso.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
                redirect(base_url('soperacional'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span>
											Erro ao inserir o sistema operacional.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
            }
        }
    }

    public function excluir($idso)
    {

        if ($this->modelsos->excluir($idso)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span>
											Sistema Operacional excluído com sucesso.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
            redirect(base_url('soperacional'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span>
											Erro ao excluir o Sistema Operacional.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
        }
    }


    public function alterar($idso)
    {
        $dados['chamadaJS'] = chamar_js('soperacional');
        $this->load->library('table');
        $dados['sos'] = $this->modelsos->listar_so($idso);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Sistemas Operacionais';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('soperacional/alterar-soperacional');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-so', 'Sistema Operacional', 'required|min_length[3]|is_unique[tbso.so]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $so= $this->input->post('txt-so');
            $idso= $this->input->post('txt-idso');
            if ($this->modelsos->alterar($so, $idso)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span>
											Sistema Operacional alterado com sucesso.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
                redirect(base_url('soperacional'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span>
											Erro ao alterar o Sistema Operacional.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
            }
        }
	}
}
