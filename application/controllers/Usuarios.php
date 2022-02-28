<?php

defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('usuarios_model', 'modelusuarios');
        $this->load->model('nivel_model', 'modelniveis');
        $this->load->model('regional_model', 'modelregionais');
        $this->niveis = $this->modelniveis->listar_niveis();
        $this->regionais = $this->modelregionais->listar_regionais1();
    }

    public function index() {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
        $this->load->library('table');
        $dados['niveis'] = $this->niveis;
        $dados['regionais'] = $this->regionais;
        $dados['usuarios'] = $this->modelusuarios->listar_usuarios();
        $dados['chamadaJS'] = chamar_js('usuarios');
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Usuários';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('usuarios/usuarios');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function profile() {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }

        $dados['niveis'] = $this->niveis;
        $dados['regionais'] = $this->regionais;
        $dados['usuarios'] = $this->modelusuarios->listar_usuarios();
        $dados['chamadaJS'] = chamar_js('usuarios');
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Profile';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('usuarios/profile');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir() {
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-nome', 'Nome do Usuário', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('txt-login', 'Login', 'required|min_length[3]|is_unique[tbusuarios.login]');
        $this->form_validation->set_rules('txt-senha', 'Senha', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-confirmasenha', 'Confirmar Senha', 'required|matches[txt-senha]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $nome = $this->input->post('txt-nome');
            $login = $this->input->post('txt-login');
            $email = $this->input->post('txt-email');
            $senha = $this->input->post('txt-senha');
            $nivel = $this->input->post('select-nivel');
            $idregionais = $this->input->post('select-regional');
            $ativo = $this->input->post('select-ativo');
            if ($this->modelusuarios->adicionar($nome, $login, $email, $senha, $nivel, $ativo, $idregionais)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Usuário inserido com sucesso.</div>');
                redirect(base_url('usuarios'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Erro!!!</span> Erro ao inserir o usuário.</div>');
            }
        }
    }

    public function excluir($idusuario) {
        //$query = $this->modelusuarios->getUsuarioId();;

        //verifica se está logado para acessar a página
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }

        //verifca se o usuário está logado antes de excluir. Impedir que ele mesmo se exclua.
        if ($this->session->userdata('logado')) {;
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											Erro!!! Não é permitido apagar <span class="badge badge-pill badge-danger">USUÁRIO</span> logado no sistema.</div>');
            redirect(base_url('usuarios'));
        }

        //executa o processo de exclusão
        if ($this->modelusuarios->excluir($idusuario)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span> Usuário excluído com sucesso.</div>');
            redirect(base_url('usuarios'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao excluir o usuário.</div>');
        }
    }

    public function alterar($idusuario) {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
        $this->load->library('table');
        $this->load->model('usuarios_model', 'modelusuarios');
        
        $dados['chamadaJS'] = chamar_js('usuarios');
        $dados['niveis'] = $this->modelniveis->listar_niveis();
        $this->regionais = $this->modelregionais->listar_regionais1();
        $dados['regionais'] = $this->regionais;  
        // var_dump($this->modelusuarios->listar_usuario($idusuario));      
        $dados['usuarios'] = $this->modelusuarios->listar_usuario($idusuario);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = 'Creeq - Painel administrativo';
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Dados do Usuário';
        $dados['foto'] = 'Imagem do Usuário';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('usuarios/alterar-usuarios');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip) {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-nome', 'Nome do Usuário', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('txt-login', 'Login', 'required|min_length[3]|is_unique[tbusuarios.login]');
        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $nome           = $this->input->post('txt-nome');
            $login          = $this->input->post('txt-login');
            $email          = $this->input->post('txt-email');
            $nivel          = $this->input->post('select-nivel');
            $idregionais    = $this->input->post('select-regional');
            $ativo          = $this->input->post('select-ativo');
            // Verifica se o campo senha foi digitado
            $senha = $this->input->post('txt-senha');
            if ($senha != "") {
                $this->form_validation->set_rules('txt-senha', 'Senha', 'required|min_length[3]');
                $this->form_validation->set_rules('txt-confirmasenha', 'Confirmar Senha', 'required|matches[txt-senha]');
            }
            $idusuario = $this->input->post('txt-idusuario');
            if ($this->modelusuarios->alterar($nome, $login, $email, $senha, $nivel, $idregionais, $ativo, $idusuario)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Usuário alterado com sucesso.</div>');
                redirect(base_url('usuarios'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao alterar o usuário.</div>');
            }
        }
    }

    public function nova_foto() {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
        $this->load->model('usuarios_model', 'modelusuarios');
        $idusuario = $this->input->post('idusuario');
        $config['upload_path'] = './assets/images/usuarios';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $idusuario . ".jpg";
        $config['overwrite'] = true;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            echo $this->upload->display_errors('<div class="alert alert-danger">', '</div>');
        } else {
            $config2['source_image'] = './assets/images/usuarios/' . $idusuario . '.jpg';
            $config2['create_thumb'] = false;
            $config2['width'] = 200;
            $config2['height'] = 200;
            $this->load->library('image_lib', $config2);
            if ($this->image_lib->resize()) {
                if ($this->modelusuarios->alterar_img($idusuario)) {
                    $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span>
											Foto alterada com sucesso. </div>');
                    redirect(base_url('usuarios/alterar/' . $idusuario));
                } else {
                    $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao alterar a foto. </div>');
                }
            } else {
                echo $this->image_lib->display_errors('<div class="alert alert-danger">', '</div>');
            }
        }
    }

    public function pag_login() {
        $dados['chamadaJS'] = chamar_js('usuarios');
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Tela de Login';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('usuarios/login');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-login', 'Login', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-senha', 'Senha', 'required|min_length[3]');
        if ($this->form_validation->run() == true) {
            $usuario = $this->input->post('txt-login');
            $senha = md5($this->input->post('txt-senha'));
            $userlogado = $this->db->get('tbusuarios')->result();
            $login = $this->modelusuarios->telalogin($usuario, $senha);
            if ($login) {

                //verificar se usuário está ativo
                if ($login->ativo == 0) {
                    $this->session->set_flashdata('erro_login', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">Erro ao acessar o sistema. <span class="badge badge-pill badge-danger">LOGIN BLOQUEADO.</span></br> Entre em contado com o <strong>ADMINISTRADOR</strong>.</div>');
                    redirect(base_url('login'));
                }
                if (count($userlogado)!=1) {
                    $dadosSessao = [
                        'userlogado' => $userlogado[0],
                        'logado' => true,
                        'nome' => $login->nome,
                        'email' => $login->email,
                        'ativo' => $login->ativo,
                        'img' => $login->img,
                        'idregionais' => $login->idregional,
                        'idusuario' => $login->idusuario
                    ];
                }

                $this->session->set_userdata($dadosSessao);

                if ($this->session->userdata('logado')) {
                    redirect(base_url('dashboard'));
                } else {
                    $dadosSessao = [
                        'userlogado' => null,
                        'logado' => false
                    ];
                    $this->session->set_userdata($dadosSessao);
                    $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											Erro ao acessar o sistema, tente novamente. </div>');
                    redirect(base_url('login'));
                }
            }
            $this->pag_login();
        } else {
            $this->pag_login();
        }
    }

    public function logout() {
        $dadosSessao['userlogado'] = null;
        $dadosSessao['logado'] = false;
        $this->session->set_userdata($dadosSessao);
        redirect(base_url('login'));
    }

    public function ativar($idusuario) {
        $this->modelusuarios->alterar_ativo($idusuario);
        $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">O usuário selecionado foi <span class="badge badge-pill badge-success">ATIVADO</SPAN></div>');
        redirect(base_url('usuarios'));
    }

    public function desativar($idusuario) {
        $this->modelusuarios->alterar_inativo($idusuario);
        $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">O usuário selecionado foi <span class="badge badge-pill badge-danger">DESATIVADO</span></div>');
        redirect(base_url('usuarios'));
    }

}
