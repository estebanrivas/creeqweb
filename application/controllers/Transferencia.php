<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Transferencia extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }
    
    public function index()
    {
        $dados['chamadaJS'] = chamar_js('transferencia');
        $this->load->library('table');
        // $this->load->library('pagination');
        // $dados['unidades'] = $this->modelunidades->listar_unidades();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Transferência';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('patrimonio/transferencia');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }
    
        

}

/* End of file Transferencia.php */
