<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Cadeadossearch extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->model('cadeados_model', 'modelcadeados');

        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
    }

    public function index()
    {
        $this->load->library('table');
        $dados['cadeados'] = $this->modelcadeados->lista_cadeados();

		$dados['chamadaJS'] = chamar_js('cadeados');
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Cadeados';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('cadeados/cadeadossearch');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function getPatrimonios(){
        $searchPatrimonios = $this->input->post('searchPatrimonios');

        $response = $this->modelcadeados->getPatrimonios($searchPatrimonios);

        echo json_encode($response);
    }

    public function inserir()
    {
        $this->load->model('cadeados_model', 'modelcadeados');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-codigo', 'Código do Cadeado', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-patrimonio1', 'Patrimônio', 'required|is_unique[tbcadeados.patrimonio]');
        $this->form_validation->set_rules('txt-unidade', 'Unidade', 'required');
        $this->form_validation->set_rules('txt-localizacao', 'Localização', 'required');
        $this->form_validation->set_rules('txt-usuario', 'Usuário', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $codigo         = $this->input->post('txt-codigo');
            $patrimonio     = $this->input->post('txt-patrimonio1');
            $unidade        = $this->input->post('txt-unidade');
            $localizacao    = $this->input->post('txt-localizacao');
            $usuario        = $this->input->post('txt-usuario');

            if ($this->modelcadeados->adicionar($codigo, $patrimonio, $unidade, $localizacao, $usuario)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Cadeado inserido com sucesso.</div>');
                redirect(base_url('cadeados'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Falha ao inserir cadeados.</div>');;
            }
        }
    }

    public function excluir($idcadeados)
    {

        if ($this->modelcadeados->excluir($idcadeados)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Excluído!!!</span> Cadeado excluído com sucesso.</div>');
            redirect(base_url('cadeados'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Cadeado não excluído.</div>');
        }
    }

    public function alterar($idcadeados)
    {

        $this->load->library('table');
        $dados['cadeados'] = $this->modelcadeados->lista_alteracao($idcadeados);
        $dados['patrimoniosSesc'] = $this->modelcadeados->lista_patrimonio_usuario();
        $dados['chamadaJS'] = chamar_js('cadeados');
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = 'Creeq';
        $dados['nomesistema'] = 'Creeq';
        $dados['versao'] = 'v3.5.2';
        $dados['subtitulo'] = 'Cadeados';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('cadeados/alterar-cadeados');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-codigo', 'Código do Cadeado', 'required|min_length[3]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $codigo         = $this->input->post('txt-codigo');
            $patrimonio     = $this->input->post('txt-patrimonio1');
            $unidade        = $this->input->post('txt-unidade');
            $localizacao    = $this->input->post('txt-localizacao');
            $usuario        = $this->input->post('txt-usuario');
            $idcadeados     = $this->input->post('txt-idcadeados');
            if ($this->modelcadeados->alterar($codigo, $patrimonio, $unidade, $localizacao, $usuario, $idcadeados)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Cadeado alterada com sucesso.</div>');
                redirect(base_url('cadeados'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Cadeado não alterado.</div>');
            }
        }
    }
}
