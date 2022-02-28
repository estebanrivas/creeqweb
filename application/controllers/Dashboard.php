<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPUnit\Util\Json;

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('equipamentos_model', 'modelequipamentos');
		// $this->load->model('conexoes_model','modelconexoes');
		// $this->tbconexoes = $this->modelconexoes->listar_conexoes();
		if(!$this->session->userdata('logado')){
			redirect(base_url('login'));
		}

	}

	public function index()
	{
		//Dados a serem enviados para o cabeçalho e rodapé
		$dados['chamadaJS'] = chamar_js('dashboard');

		$this->load->model('equipamentos_model', 'modelequipamentos');

		$dados['titulo'] = CONF_SYS_NAME_SYSTEM;
		$dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
		$dados['versao'] = CONF_SYS_VERSION_SYSTEM;
	
		$this->load->view('templates/html-header', $dados);
		$this->load->view('templates/header');
		$this->load->view('dashboard/dashboard');
		$this->load->view('templates/footer');
		$this->load->view('templates/html-footer');
	}

	public function desktopregionaistotal()
	{
		$result = $this->modelequipamentos->desktopregionaistotal();
		echo json_encode($result);
	}
	public function outsourcingregionaltotal()
	{
		$result = $this->modelequipamentos->outsourcingregionaltotal();
		echo json_encode($result);
	}
	public function contartablet()
	{
		$result = $this->modelequipamentos->contartablet();
		echo json_encode($result);
	}

	public function tonera3(){
		$result = $this->modelequipamentos->pedidostonertotal();
		echo json_encode($result);
	}

	public function chamadosa3(){
		$result = $this->modelequipamentos->chamadosa3total();
		echo json_encode($result);
	}
}
