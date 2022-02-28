<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Serverside extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Load member model
        $this->load->model('serverside_model', 'modelserver');
        $this->load->model('equipamentos_model', 'modelequipamentos');
        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('equipamentos');
        $dados['equipamentos'] = $this->modelserver->lista_geral1();
        // $dados['equipamentos'] = $this->modelserver->list_hardware();
        // var_dump($this->modelserver->list_hardware());

        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Equipamentos - Serverside';

		$this->load->view('templates/html-header', $dados);
		$this->load->view('templates/header');
		$this->load->view('equipamentos/serverside');
		$this->load->view('templates/footer');
		$this->load->view('templates/html-footer');
    }

    public function getLists()
    {
        $data = $row = array();
        
        // Fetch member's records
        $equipamentos = $this->modelserver->getRows($_POST);

        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $nomeunidade = $equipamento->unidadessesc,
                $nomeusuario = $equipamento->usuario,
                $nometpequipamento = $equipamento->tipoequipamento,
                $nometeamviewer = $equipamento->teamviewer,
				$opcoes = '<a href="equipamentos/alterar/'. md5($equipamento->idequipamento). '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip1" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a><!-- &nbsp<button id="btnExcluirUsuario" type="button" class="btn btn-danger btn-sm item" data-tttt="tooltip" data-toggle="modal" data-placement="top" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>&nbsp<button type="button" id="btnExibirDetalhes" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target="#detalhes-modal" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button> -->'
                // $opcoes = '<a href="equipamentos/alterar/'. md5($equipamento->idequipamento). '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip1" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-danger btn-sm item" data-tttt="tooltip" data-toggle="modal" data-placement="top" data-target=".excluir-modal-'. $equipamento->idequipamento. '" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>&nbsp<button type="button" id="btnExibirDetalhes" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target="#detalhes-modal" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelserver->countAll(),
            "recordsFiltered" => $this->modelserver->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    public function createExceloutall() {
		// ini_set('memory_limit', '2048M');
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
        $sheet->setCellValue('H1', 'Status');
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

}

/* End of file Serverside.php */




