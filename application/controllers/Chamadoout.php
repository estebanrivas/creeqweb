<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Chamadoout extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('chamadoout_model', 'modelochamadoout');
		if (!$this->session->userdata('logado')) {
			redirect(base_url('login'));
		}
	}


	public function index()
	{
		$this->load->library('table');
		// $this->statusPedido();
		$dados['chamadaJS'] = chamar_js('chamadoout');
		$dados['chamadosout'] = $this->modelochamadoout->lista_chamadoout();

		//Dados a serem enviados para o cabeçalho e rodapé
		$dados['titulo'] = 'Creeq';
		$dados['nomesistema'] = 'Creeq';
		$dados['versao'] = 'v3.5.2';
		$dados['subtitulo'] = 'Gestão de Chamados Outsourcing';

		$this->load->view('templates/html-header', $dados);
		$this->load->view('templates/header');
		$this->load->view('outsourcing/chamadoout');
		$this->load->view('templates/footer');
		$this->load->view('templates/html-footer');
	}

	public function listagemchamadosout()
	{

		$this->load->library('table');
		$this->load->helper('date');
		$dados['chamadaJS'] = chamar_js('chamadoout');
		$dados['chamadosout'] = $this->modelochamadoout->lista_chamadoout();

		//Dados a serem enviados para o cabeçalho e rodapé
		$dados['titulo'] = 'Creeq';
		$dados['nomesistema'] = 'Creeq';
		$dados['versao'] = 'v3.5.2';
		$dados['subtitulo'] = 'Gestão Chamados Outsourcing';

		$this->load->view('templates/html-header', $dados);
		$this->load->view('templates/header');
		$this->load->view('outsourcing/listagemchamadoout');
		$this->load->view('templates/footer');
		$this->load->view('templates/html-footer');
	}

	public function listaChamadooutExcel()
	{
		$this->load->library('table');
		$this->load->helper('date');
		$this->chamadosout = $this->modelochamadoout->lista_chamadoout();
		$dados['chamadosout'] = $this->chamadosout;
		$dados['nomeexcel'] = 'listagemgeralchamadoout';

		$this->load->view('templates/html-header-exportaoutsourcing', $dados);
		$this->load->view('outsourcing/excel-chamado');
		$this->load->view('templates/html-footer-exporta');
	}

	public function autocompleteDataSerial()
	{
		$returnData = array();

		// Get skills data
		$conditions['searchTerm'] = $this->input->get('term');
		$conditions['conditions']['outsourcing'] = 'SIM';
		$conditions['conditions']['tbstatus_idstatus'] = '1';
		$seriaisData = $this->modelochamadoout->getSeriais_geral($conditions);

		// Generate array
		if (!empty($seriaisData)) {
			foreach ($seriaisData as $row) {
				$data['idequipamento']  = $row['idequipamento'];
				$data['value']          = $row['serial'];
				$data['patrimonio']     = $row['patrimonio'];
				$data['host']           = $row['host'];
				$data['unidade']        = $row['unidadessesc'];
				$data['localizacao']    = $row['localizacaosesc'];
				array_push($returnData, $data);
			}
		}
		// Return results as json encoded array
		echo json_encode($returnData);
		die;
	}

	public function autocompleteDataPatrimonio()
	{
		$returnData = array();

		// Get skills data
		$conditions['searchTerm'] = $this->input->get('term');
		$conditions['conditions']['outsourcing'] = 'SIM';
		$conditions['conditions']['tbstatus_idstatus'] = '1';
		$patrimoniosData = $this->modelochamadoout->getPatrimonios_geral($conditions);

		// Generate array
		if (!empty($patrimoniosData)) {
			foreach ($patrimoniosData as $row) {
				$data['idequipamento']  = $row['idequipamento'];
				$data['value']          = $row['patrimonio'];
				$data['serial']         = $row['serial'];
				$data['host']           = $row['host'];
				$data['unidade']        = $row['unidadessesc'];
				$data['localizacao']    = $row['localizacaosesc'];
				array_push($returnData, $data);
			}
		}
		// Return results as json encoded array
		echo json_encode($returnData);
		die;
	}

	public function inserir_chamadoout()
	{
		$this->load->model('chamadoout_model', 'modelochamadoout');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-patrimonio', 'Patrimonio', 'required|min_length[3]');
		$this->form_validation->set_rules('txt-serial', 'Serial', 'required');
		$this->form_validation->set_rules('txt-host', 'Host', 'required');
		$this->form_validation->set_rules('txt-unidade', 'Unidade', 'required');
		$this->form_validation->set_rules('txt-localizacao', 'Localização', 'required');
		$this->form_validation->set_rules('txt-chamadoservicedesk', 'Chamado Service Desk', 'required');
		$this->form_validation->set_rules('txt-chamadoout', 'Chamado Outsourcing', 'required');
		$this->form_validation->set_rules('txt-datasolicitacao', 'Data Solicitação', 'required');
		$this->form_validation->set_rules('txt-contadortotal', 'Contador Total', 'required');
		$this->form_validation->set_rules('txt-contadorpb', 'Contador PB', 'required');
		$this->form_validation->set_rules('txt-contadorcolor', 'Contador Colorido', 'required');


		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$patrimonio                     = $this->input->post('txt-patrimonio1');
			$serial                         = $this->input->post('txt-serial');
			$host                           = $this->input->post('txt-host');
			$unidade                        = $this->input->post('txt-unidade');
			$localizacao                    = $this->input->post('txt-localizacao');
			$chamadoservicedesk             = $this->input->post('txt-chamadoservicedesk');
			$chamadoout                     = $this->input->post('txt-chamadoout');
			$datachamado                    = $this->input->post('txt-datasolicitacao');
			$contadortotal                  = $this->input->post('txt-contadortotal');
			$contadorpb                     = $this->input->post('txt-contadorpb');
			$contadorcolor                  = $this->input->post('txt-contadorcolor');
			$statuschamadoout               = $this->input->post('select-statuschamadoout');
			$descricaochamadoout            = $this->input->post('txt-descricaochamadoout');
			$descricaosolucaochamadoout     = $this->input->post('txt-descricaosolucaochamadoout');

			if ($this->modelochamadoout->inserirChamadoout($patrimonio, $serial, $host, $unidade, $localizacao, $chamadoservicedesk, $chamadoout, $datachamado, $contadortotal, $contadorpb, $contadorcolor, $statuschamadoout, $descricaochamadoout, $descricaosolucaochamadoout)) {
				$this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span>Chamado registrado com sucesso.</div>');
				redirect(base_url('chamadoout'));
			} else {
				$this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Falha ao registrar o chamado.</div>');;
			}
		}
	}

	public function excluir_chamadoout($idchamadoout)
	{

		if ($this->modelochamadoout->excluirChamadoout($idchamadoout)) {
			$this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Excluído!!!</span> Chamado outsourcing excluído com sucesso.</div>');
			redirect(base_url('chamadoout/listagemchamadosout'));
		} else {
			$this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Chamado outsourcing não excluído.</div>');
		}
	}

	public function alterar_chamadoout($idchamadoout)
	{

		$this->load->library('table');
		// $this->load->autocompleteData();
		$dados['pedidosout'] = $this->modelochamadoout->lista_alteracao($idchamadoout);
		$dados['chamadaJS'] = chamar_js('chamadooutalterar');
		//Dados a serem enviados  para o cabeçalho
		$dados['titulo'] = 'Creeq';
		$dados['nomesistema'] = 'Creeq';
		$dados['versao'] = 'v3.5.2';
		$dados['subtitulo'] = 'Gestão de chamados outsourcing';

		$this->load->view('templates/html-header', $dados);
		$this->load->view('templates/header');
		$this->load->view('outsourcing/alterar-chamadoout');
		$this->load->view('templates/footer');
		$this->load->view('templates/html-footer');
	}

	public function salvar_alteracoeschamadoout($idCrip)
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('txt-patrimonio', 'Patrimônio', 'required|min_length[3]');
		$this->form_validation->set_rules('txt-serial', 'Serial', 'required');
		$this->form_validation->set_rules('txt-chamadoservicedesk', 'Chamado Service Desk', 'required');
		$this->form_validation->set_rules('txt-chamadoout', 'Chamado Outsourcing', 'required');
		$this->form_validation->set_rules('txt-datasolicitacao', 'Data Solicitação', 'required');
		$this->form_validation->set_rules('txt-contadortotal', 'Contador Total', 'required');
		$this->form_validation->set_rules('txt-contadorpb', 'Contador PB', 'required');
		$this->form_validation->set_rules('txt-contadorcolor', 'Contador Colorido', 'required');

		if ($this->form_validation->run() == false) {
			$this->modelochamadoout->alterarChamadoout($idCrip);
			// $this->alterarChamadoout($idCrip);
		} else {
			$patrimonio                     = $this->input->post('txt-patrimonio1');
			$serial                         = $this->input->post('txt-serial');
			$host                           = $this->input->post('txt-host');
			$unidade                        = $this->input->post('txt-unidade');
			$localizacao                    = $this->input->post('txt-localizacao');
			$chamadoservicedesk             = $this->input->post('txt-chamadoservicedesk');
			$chamadoout                     = $this->input->post('txt-chamadoout');
			$datachamado                    = $this->input->post('txt-datasolicitacao');
			$idchamadoout                   = $this->input->post('txt-idchamadoout');
			$contadortotal                  = $this->input->post('txt-contadortotal');
			$contadorpb                     = $this->input->post('txt-contadorpb');
			$contadorcolor                  = $this->input->post('txt-contadorcolor');
			$statuschamadoout               = $this->input->post('select-statuschamadoout');
			$descricaochamadoout            = $this->input->post('txt-descricaochamadoout');
			$descricaosolucaochamadoout     = $this->input->post('txt-descricaosolucaochamadoout');
			$idchamadoout                   = $this->input->post('txt-idchamadoout');


			if ($this->modelochamadoout->alterarChamadoout($patrimonio, $serial, $host, $unidade, $localizacao, $chamadoservicedesk, $chamadoout, $datachamado, $contadortotal, $contadorpb, $contadorcolor, $statuschamadoout, $descricaochamadoout, $descricaosolucaochamadoout, $idchamadoout)) {
				$this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Chamado outsourcing alterado com sucesso.</div>');
				redirect(base_url('/chamadoout/listagemchamadosout'));
			} else {
				$this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Chamado outsourcing não alterado.</div>');
			}
		}
	}
}

/* End of file Chamadoout.php */
