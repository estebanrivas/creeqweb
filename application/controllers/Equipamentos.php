<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Equipamentos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('equipamentos_model', 'modelequipamentos');
        $this->load->model('tpequipamento_model', 'modeltpequipamentos');
        $this->load->model('fabricante_model', 'modelfabricantes');
        $this->load->model('regional_model', 'modelregionais');
        $this->load->model('soperacional_model', 'modelsos');
        $this->load->model('status_model', 'modelstatus');
        $this->load->model('localizacoes_model', 'modellocalizacoes');
        $this->load->model('unidade_model', 'modelunidades');
        $this->load->model('conexoes_model', 'modelconexoes');

        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('equipamentos');
        $this->tpequipamentos = $this->modeltpequipamentos->listar_tpequipamentos1();
        $dados['tpequipamentos'] = $this->tpequipamentos;
        $this->fabricantes = $this->modelfabricantes->listar_fabricantes1();
        $dados['fabricantes'] = $this->fabricantes;
        $this->regionais = $this->modelregionais->listar_regionais1();
        $dados['regionais'] = $this->regionais;
        $this->sos = $this->modelsos->listar_sos();
        $dados['sos'] = $this->sos;
        $this->status = $this->modelstatus->listar_status1();
        $dados['status'] = $this->status;
        $this->localizacoes = $this->modellocalizacoes->listar_localizacoes1();
        $dados['localizacoes'] = $this->localizacoes;
        $this->unidades = $this->modelunidades->listar_unidades1();
        $dados['unidades'] = $this->unidades;
        $this->conexoes = $this->modelconexoes->listar_conexoes1();
        $dados['conexoes'] = $this->conexoes;

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Equipamentos';
        
        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/equipamentos_abas');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function inserir()
    {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
        $this->load->model('equipamentos_model', 'modelequipamentos');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-host', 'Nome do HOST', 'required|min_length[3]|max_length[15]');
        $this->form_validation->set_rules('txt-usuario', 'Nome do Usuário', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-patrimonio', 'Número de Patrimônio', 'is_unique[tbequipamento.patrimonio]');
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $tbtpequipamento_idtpequipamento= $this->input->post('select-tpequipamento');
            $host= $this->input->post('txt-host');
            $usuario= $this->input->post('txt-usuario');
            $ip= $this->input->post('txt-ip');
            $patrimonio= $this->input->post('txt-patrimonio');
            $modelo= $this->input->post('txt-modelo');
            $serial= $this->input->post('txt-serial');
            $processador = $this->input->post('txt-processador');
            $telamonitor = $this->input->post('txt-telamonitor');
            $hd= $this->input->post('txt-hd');
            $ram= $this->input->post('txt-ram');
            $mac= $this->input->post('txt-maclan');
            $macw= $this->input->post('txt-macwifi');
            $macb= $this->input->post('txt-macbluetooth');
            $tbfabricante_idfabricante= $this->input->post('select-fabricante');
            $tbregional_idregional= $this->input->post('select-regional');
            $tbso_idso= $this->input->post('select-sos');
            $tbstatus_idstatus= $this->input->post('select-status');
            $tblocalizacao_idlocalizacao= $this->input->post('select-localizacao');
            $tbunidades_idunidade= $this->input->post('select-unidade');
            $tbconexao_idconexao= $this->input->post('select-conexao');
            $outsourcing= $this->input->post('select-outsourcing');
            $obs= $this->input->post('txt-observacao');
            $teamviewer= $this->input->post('txt-teamviewer');
            $descricaoequipamento= $this->input->post('txt-descricaoequipamento');
            if ($this->modelequipamentos->adicionar($tbtpequipamento_idtpequipamento, $host, $usuario, $ip, $patrimonio, $modelo, $serial, $processador, $telamonitor, $hd, $ram, $mac, $macw, $macb, $tbfabricante_idfabricante, $tbregional_idregional, $tbso_idso, $tbstatus_idstatus, $tblocalizacao_idlocalizacao, $tbunidades_idunidade, $tbconexao_idconexao, $outsourcing, $obs, $teamviewer, $descricaoequipamento)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Inclusão de equipamento realizada com sucesso.</div>');
                redirect(base_url('equipamentos'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao inserir o equipamento.</div>');
                redirect(base_url('equipamentos'));
            }
        }
    }

    public function excluir($idequipamento)
    {

        if ($this->modelequipamentos->excluir($idequipamento)) {
            redirect(base_url('equipamentos/localizar'));
        } else {
            echo "Houve um erro no sistema";
        }
    }

    public function alterar($idequipamento)
    {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
        $this->load->library('table');
        $this->load->helper('funcoes');
        $dados['chamadaJS'] = chamar_js('equipamentos');
        $this->tpequipamentos = $this->modeltpequipamentos->listar_tpequipamentos1();
        $dados['tpequipamentos'] = $this->tpequipamentos;
        $this->fabricantes = $this->modelfabricantes->listar_fabricantes1();
        $dados['fabricantes'] = $this->fabricantes;
        $this->regionais = $this->modelregionais->listar_regionais1();
        $dados['regionais'] = $this->regionais;
        $this->sos = $this->modelsos->listar_sos();
        $dados['sos'] = $this->sos;
        $this->status = $this->modelstatus->listar_status1();
        $dados['status'] = $this->status;
        $this->localizacoes = $this->modellocalizacoes->listar_localizacoes1();
        $dados['localizacoes'] = $this->localizacoes;
        $this->unidades = $this->modelunidades->listar_unidades1();
        $dados['unidades'] = $this->unidades;
        $this->conexoes = $this->modelconexoes->listar_conexoes1();
        $dados['conexoes'] = $this->conexoes;
        $this->load->model('equipamentos_model', 'modelequipamentos');
        $dados['equipamentos'] = $this->modelequipamentos->listar_equipamento($idequipamento);
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Equipamentos';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/alterar-equipamentos_abas');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoes($idCrip)
    {

        $this->load->library('form_validation');
        $this->load->model('equipamentos_model', 'modelequipamentos');
        $this->form_validation->set_rules('txt-host', 'Nome do HOST', 'required|min_length[3]|max_length[15]');
        $this->form_validation->set_rules('txt-usuario', 'Nome do Usuário', 'required|min_length[3]');
        // $this->form_validation->set_rules('txt-patrimonio', 'Número de Patrimônio', 'is_unique[tbequipamento.patrimonio]');

        if ($this->form_validation->run() == false) {
            $this->alterar($idCrip);
        } else {
            $tbtpequipamento_idtpequipamento = $this->input->post('select-tpequipamento');
            $host = $this->input->post('txt-host');
            $usuario = $this->input->post('txt-usuario');
            $ip = $this->input->post('txt-ip');
            $patrimonio = $this->input->post('txt-patrimonio');
            $modelo = $this->input->post('txt-modelo');
            $serial = $this->input->post('txt-serial');
            $processador = $this->input->post('txt-processador');
            $telamonitor = $this->input->post('txt-telamonitor');
            $hd = $this->input->post('txt-hd');
            $ram = $this->input->post('txt-ram');
            $mac = $this->input->post('txt-maclan');
            $macw = $this->input->post('txt-macwifi');
            $macb = $this->input->post('txt-macbluetooth');
            $tbfabricante_idfabricante = $this->input->post('select-fabricante');
            $tbregional_idregional = $this->input->post('select-regional');
            $tbso_idso = $this->input->post('select-sos');
            $tbstatus_idstatus = $this->input->post('select-status');
            $tblocalizacao_idlocalizacao = $this->input->post('select-localizacao');
            $tbunidades_idunidade = $this->input->post('select-unidade');
            $tbconexao_idconexao = $this->input->post('select-conexao');
            $outsourcing = $this->input->post('select-outsourcing');
            $obs = $this->input->post('txt-observacao');
            $teamviewer = $this->input->post('txt-teamviewer');
            $descricaoequipamento = $this->input->post('txt-descricaoequipamento');
            $idequipamento = $this->input->post('txt-idequipamento');
            if ($this->modelequipamentos->alterar($tbtpequipamento_idtpequipamento, $host, $usuario, $ip, $patrimonio, $modelo, $serial, $processador, $telamonitor, $hd, $ram, $mac, $macw, $macb, $tbfabricante_idfabricante, $tbregional_idregional, $tbso_idso, $tbstatus_idstatus, $tblocalizacao_idlocalizacao, $tbunidades_idunidade, $tbconexao_idconexao, $outsourcing, $obs, $teamviewer, $descricaoequipamento, $idequipamento)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Equipamento alterado com sucesso.</div>');
                redirect(base_url('equipamentos/localizar'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Erro ao excluir o equipamento.</div>');
                redirect(base_url('equipamentos/localizar'));
            }
        }
    }

    public function pesquisar()
    {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
        $this->load->library('table');
        $this->load->helper('funcoes');
        $dados['chamadaJS'] = chamar_js('equipamentos');
        $this->tpequipamentos = $this->modeltpequipamentos->listar_tpequipamentos1();
        $dados['tpequipamentos'] = $this->tpequipamentos;
        $this->fabricantes = $this->modelfabricantes->listar_fabricantes1();
        $dados['fabricantes'] = $this->fabricantes;
        $this->regionais = $this->modelregionais->listar_regionais1();
        $dados['regionais'] = $this->regionais;
        $this->sos = $this->modelsos->listar_sos();
        $dados['sos'] = $this->sos;
        $this->status = $this->modelstatus->listar_status1();
        $dados['status'] = $this->status;
        $this->localizacoes = $this->modellocalizacoes->listar_localizacoes1();
        $dados['localizacoes'] = $this->localizacoes;
        $this->unidades = $this->modelunidades->listar_unidades1();
        $dados['unidades'] = $this->unidades;
        $this->conexoes = $this->modelconexoes->listar_conexoes1();
        $dados['conexoes'] = $this->conexoes;

        $this->load->model('equipamentos_model', 'modelequipamentos');
        $dados['equipamentos'] = $this->modelequipamentos->pesquisa_equipamentos();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Equipamentos';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/pesquisa-equipamento');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function outsourcing()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('equipamentos');
        $this->tpequipamentos = $this->modeltpequipamentos->listar_tpequipamentos1();
        $dados['tpequipamentos'] = $this->tpequipamentos;
        $this->fabricantes = $this->modelfabricantes->listar_fabricantes1();
        $dados['fabricantes'] = $this->fabricantes;
        $this->regionais = $this->modelregionais->listar_regionais1();
        $dados['regionais'] = $this->regionais;
        $this->sos = $this->modelsos->listar_sos();
        $dados['sos'] = $this->sos;
        $this->status = $this->modelstatus->listar_status1();
        $dados['status'] = $this->status;
        $this->localizacoes = $this->modellocalizacoes->listar_localizacoes1();
        $dados['localizacoes'] = $this->localizacoes;
        $this->unidades = $this->modelunidades->listar_unidades1();
        $dados['unidades'] = $this->unidades;
        $this->conexoes = $this->modelconexoes->listar_conexoes1();
        $dados['conexoes'] = $this->conexoes;
        $this->equipamentos = $this->modelequipamentos->lista_outsourcing();
        $dados['equipamentos'] = $this->equipamentos;
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/outsourcing');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function exportaexcel()
    {
        $this->load->library('table');

        $this->equipamentos = $this->modelequipamentos->lista_outsourcing();
        $dados['equipamentos'] = $this->equipamentos;

        $this->load->view('templates/html-header-exportaoutsourcing', $dados);
        $this->load->view('equipamentos/excel-outsourcing');
        $this->load->view('templates/html-footer-exporta');
    }

    public function createExceloutall() {
		$fileName = 'listar_todos.xlsx';  
		$employeeData = $this->modelserver->list_hardware();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Tipo');
        $sheet->setCellValue('C1', 'Outsourcing');
        $sheet->setCellValue('D1', 'Patrimônio');
        $sheet->setCellValue('E1', 'Usuário');
	    $sheet->setCellValue('F1', 'Host');
        $sheet->setCellValue('G1', 'Fabricante');       
        $sheet->setCellValue('G1', 'Status');  
        $sheet->setCellValue('I1', 'S.O.');  
        $sheet->setCellValue('J1', 'Modelo');  
        $sheet->setCellValue('K1', 'Serial');  
        $sheet->setCellValue('L1', 'Conexão');  
        $sheet->setCellValue('M1', 'Regional');  
        $sheet->setCellValue('N1', 'Unidade');  
        $sheet->setCellValue('O1', 'Localização');  
        $sheet->setCellValue('P1', 'IP');  
        $sheet->setCellValue('Q1', 'Teamviewer');  
        $sheet->setCellValue('R1', 'Processador');  
        $sheet->setCellValue('S1', 'HD');  
        $sheet->setCellValue('T1', 'RAM');
        $sheet->setCellValue('U1', 'MAC LAN');
        $sheet->setCellValue('V1', 'MAC WI-FI');
        $sheet->setCellValue('W1', 'MAC BLUETOOTH');
        $sheet->setCellValue('X1', 'Tela MONITOR');
        $sheet->setCellValue('Y1', 'Observação');  

        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['idequipamento']);
            $sheet->setCellValue('B' . $rows, $val['tipoequipamento']);
            $sheet->setCellValue('C' . $rows, $val['outsourcing']);
            $sheet->setCellValue('D' . $rows, $val['patrimonio']);
            $sheet->setCellValue('E' . $rows, $val['usuario']);
	        $sheet->setCellValue('F' . $rows, $val['host']);
            $sheet->setCellValue('G' . $rows, $val['fabricantesesc']);
            $sheet->setCellValue('H' . $rows, $val['statussesc']);
            $sheet->setCellValue('I' . $rows, $val['sosesc']);
            $sheet->setCellValue('J' . $rows, $val['modelo']);
            $sheet->setCellValue('K' . $rows, $val['serial']);
            $sheet->setCellValue('L' . $rows, $val['conexaosesc']);
            $sheet->setCellValue('M' . $rows, $val['regionalsesc']);
            $sheet->setCellValue('N' . $rows, $val['unidadessesc']);
            $sheet->setCellValue('O' . $rows, $val['localizacaosesc']);
            $sheet->setCellValue('P' . $rows, $val['ip']);
            $sheet->setCellValue('Q' . $rows, $val['teamviewer']);
            $sheet->setCellValue('R' . $rows, $val['processador']);
            $sheet->setCellValue('S' . $rows, $val['hd']);
            $sheet->setCellValue('T' . $rows, $val['ram']);
            $sheet->setCellValue('U' . $rows, $val['mac']);
            $sheet->setCellValue('V' . $rows, $val['macw']);
            $sheet->setCellValue('W' . $rows, $val['macb']);
            $sheet->setCellValue('X' . $rows, $val['telamonitor']);
            $sheet->setCellValue('Y' . $rows, $val['obs']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }

    public function localizar()
    {
        $this->load->library('table');
        $this->load->helper('funcoes');
        $dados['chamadaJS'] = chamar_js('equipamentos');
        $this->tpequipamentos = $this->modeltpequipamentos->listar_tpequipamentos1();
        $dados['tpequipamentos'] = $this->tpequipamentos;
        $this->fabricantes = $this->modelfabricantes->listar_fabricantes1();
        $dados['fabricantes'] = $this->fabricantes;
        $this->regionais = $this->modelregionais->listar_regionais1();
        $dados['regionais'] = $this->regionais;
        $this->sos = $this->modelsos->listar_sos();
        $dados['sos'] = $this->sos;
        $this->status = $this->modelstatus->listar_status1();
        $dados['status'] = $this->status;
        $this->localizacoes = $this->modellocalizacoes->listar_localizacoes1();
        $dados['localizacoes'] = $this->localizacoes;
        $this->unidades = $this->modelunidades->listar_unidades1();
        $dados['unidades'] = $this->unidades;
        $this->conexoes = $this->modelconexoes->listar_conexoes1();
        $dados['conexoes'] = $this->conexoes;
        
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Equipamentos';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/localizar');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }
}
