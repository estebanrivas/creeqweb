<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('usuarios_model', 'modelusuarios');
        // $this->usuarios = $this->modelusuarios->listar_usuarios();
        $this->load->model('nivel_model', 'modelniveis');
        $this->niveis = $this->modelniveis->listar_niveis();
        // if (!$this->session->userdata('logado')) {
        //     redirect(base_url('login'));
        // }
    }

    public function index()
    {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
		$this->load->library('table');
        $dados['niveis'] = $this->niveis;
		$dados['usuarios'] = $this->modelusuarios->listar_usuarios();
        
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = 'Creeq';
        $dados['nomesistema'] = 'Creeq';
        $dados['versao'] = 'v3.5.2';
        $dados['subtitulo'] = 'Usuários';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('usuarios');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
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
            $ativo = $this->input->post('select-ativo');
            if ($this->modelusuarios->adicionar($nome, $login, $email, $senha, $nivel, $ativo)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span>
											Usuário inserido com sucesso.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
                redirect(base_url('usuarios'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Erro!!!</span>
											Erro ao inserir o usuário.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
            }
        }
    }

    public function excluir($idusuario)
    {
        $query = $this->modelusuarios->getUsuarioId();

        //verifica se está logado para acessar a página
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
                
        //verifca se o usuário está logado antes de excluir. Impedir que ele mesmo se exclua.
        if ($this->session->userdata('logado')) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											Erro!!! Não é permitido apagar <span class="badge badge-pill badge-danger">usuário</span> logado no sistema.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
                                        </div>');
            redirect(base_url('usuarios'));
        }
        
        //executa o processo de exclusão
        if ($this->modelusuarios->excluir($idusuario)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Parabéns!!!</span>
											Usuário excluído com sucesso.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
            redirect(base_url('usuarios'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span>
											Erro ao excluir o usuário.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
        }
    }
  


    public function alterar($idusuario)
    {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
        $this->load->library('table');
        $this->load->model('usuarios_model', 'modelusuarios');
        $dados['niveis'] = $this->modelniveis->listar_niveis();
        $dados['usuarios'] = $this->modelusuarios->listar_usuario($idusuario);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = 'Mastercreeq - Painel administrativo';
        $dados['nomesistema'] = 'Creeq';
        $dados['versao'] = 'v3.5.2';
        $dados['subtitulo'] = 'Conexões';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('alterar-usuarios');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {
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
            $nome = $this->input->post('txt-nome');
            $login = $this->input->post('txt-login');
            $email = $this->input->post('txt-email');
            $nivel = $this->input->post('select-nivel');
            $ativo = $this->input->post('select-ativo');
            // Verifica se o campo senha foi digitado
            $senha = $this->input->post('txt-senha');
            if ($senha != "") {
                $this->form_validation->set_rules('txt-senha', 'Senha', 'required|min_length[3]');
                $this->form_validation->set_rules('txt-confirmasenha', 'Confirmar Senha', 'required|matches[txt-senha]');
            }
            $idusuario = $this->input->post('txt-idusuario');
            if ($this->modelusuarios->alterar($nome, $login, $email, $senha, $nivel, $ativo, $idusuario )) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span>
											Usuário alterado com sucesso.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
                redirect(base_url('usuarios'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span>
											Erro ao alterar o usuário.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
            }
        }
    }


    public function nova_foto()
    {
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
            echo $this->upload->display_errors();
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
											Foto alterada com sucesso.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
                    redirect(base_url('usuarios/alterar/' . $idusuario));
                } else {
                    $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span>
											Erro ao alterar a foto.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');

                }
            } else {
                echo $this->image_lib->display_errors();
            }
        }
    }


    public function pag_login()
    {
        // $this->load->control->navegadores();
        // $this->load->

        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = 'Creeq';
        $dados['nomesistema'] = 'Creeq';
        $dados['versao'] = 'v3.5.2';
        $dados['subtitulo'] = 'Tela de Login';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('login');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-login', 'Login', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-senha', 'Senha', 'required|min_length[3]');
        if ($this->form_validation->run() == false) {
            $this->pag_login();
        } else {
            $usuario = $this->input->post('txt-login');
            $senha = $this->input->post('txt-senha');
            $this->db->where('login', $usuario);
            $this->db->where('senha', md5($senha));
            $this->db->limit(1);
            $userlogado = $this->db->get('tbusuarios')->result();
            if (count($userlogado) == 1) {
                $dadosSessao['userlogado'] = $userlogado[0];
                $dadosSessao['logado'] = true;
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('dashboard'));
            } else {
                $dadosSessao['userlogado'] = null;
                $dadosSessao['logado'] = false;
                $this->session->set_userdata($dadosSessao);
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											Erro ao acessar o sistema, tente novamente.
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>');
                redirect(base_url('login'));
            }
        }
    }

    public function logout()
    {
        $dadosSessao['userlogado'] = null;
        $dadosSessao['logado'] = false;
        $this->session->set_userdata($dadosSessao);
        redirect(base_url('login'));
	}
}
