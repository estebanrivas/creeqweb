<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Contatos extends CI_Controller {


public function __construct()
{
    parent::__construct();
        $this->load->model('regional_model', 'modelregionais');
        $this->load->model('unidade_model', 'modelunidades');
        $this->load->model('contatos_model', 'modelcontatos');

        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
}


    public function index()
    {
        $dados['chamadaJS'] = chamar_js('contatos');
        $this->load->library('table');
        $this->regionais = $this->modelregionais->listar_regionais1();
        $dados['regionais'] = $this->regionais;
        $this->unidades = $this->modelunidades->listar_unidades1();
        $dados['unidades'] = $this->unidades;
        $this->contatos = $this->modelcontatos->listaContato();
        $dados['contatos'] = $this->contatos;

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Contatos';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('contatos/contatos');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
        
    }

    public function alterar($idcontatos)
    {
        $dados['chamadaJS'] = chamar_js('contatos');
        $this->load->library('table');
        $this->regionais = $this->modelregionais->listar_regionais1();
        $dados['regionais'] = $this->regionais;
        $this->unidades = $this->modelunidades->listar_unidades1();
        $dados['unidades'] = $this->unidades;
        $dados['contatos'] = $this->modelcontatos->listaAlterarcontato($idcontatos);

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = 'Creeq';
        $dados['nomesistema'] = 'Creeq';
        $dados['versao'] = 'v3.5.2';
        $dados['subtitulo'] = 'Contatos';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('contatos/alterar_contatos');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserirContato(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-nome', 'Nome', 'required');
        $this->form_validation->set_rules('txt-email', 'E-mail', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $nome_contato       = $this->input->post('txt-nome');
            $email_contato      = $this->input->post('txt-email');
            $telefone_contato   = $this->input->post('txt-telefone');
            $idunidade_contato  = $this->input->post('select-unidade');
            $idregional_contato = $this->input->post('select-regional');

            if ($this->modelcontatos->adicionar($nome_contato, $email_contato, $telefone_contato, $idunidade_contato, $idregional_contato)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show"><span class="badge badge-pill badge-success">Parabéns!!!</span>Contato cadastrado com sucesso.</div>');

                redirect(base_url('contatos'));

            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show"><span class="badge badge-pill badge-success">Erro!!!</span>Falha ao cadastrar o contato!!!!</div>');
            }
        }
    }

    public function alterarContato($idCrip){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-nome', 'Nome', 'required');
        $this->form_validation->set_rules('txt-email', 'E-mail', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->modelcontatos->alterar_contato();
        } else {
            $nome_contato       = $this->input->post('txt-nome');
            $email_contato      = $this->input->post('txt-email');
            $telefone_contato   = $this->input->post('txt-telefone');
            $idunidade_contato  = $this->input->post('select-unidade');
            $idregional_contato = $this->input->post('select-regional');
            $idcontatos         = $this->input->post('txt-idcontato');
            

            if ($this->modelcontatos->alterar($nome_contato, $email_contato, $telefone_contato, $idunidade_contato, $idregional_contato,$idcontatos)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show"><span class="badge badge-pill badge-success">Parabéns!!!</span>Contato alterado com sucesso.</div>');

                redirect(base_url('contatos'));

            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show"><span class="badge badge-pill badge-success">Erro!!!</span>Falha ao alterar o contato!!!!</div>');
            }
        }
    }

    public function excluirContato($idcontatos)
    {
        if ($this->modelcontatos->excluir($idcontatos)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Excluído!!!</span> Contato excluído com sucesso.</div>');
            redirect(base_url('contatos'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Contato não excluído.</div>');
        }
    }
}

/* End of file Contatos.php */
