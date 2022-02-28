<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Outsourcing extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('outsourcing_model', 'modelooutsourcing');

        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('outsourcing');
        $dados['equipamentos'] = $this->modelooutsourcing->lista_outsourcing();


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

    public function outsede(){

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('outsourcing');
        $dados['equipamentos'] = $this->modelooutsourcing->lista_outsourcing();


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Sede';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/outsourcing_sede');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function outsudeste(){

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('outsourcing');
        $dados['equipamentos'] = $this->modelooutsourcing->lista_outsourcing();


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Regional Sudeste';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/outsourcing_sudeste');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function outnordeste()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('outsourcing');
        $dados['equipamentos'] = $this->modelooutsourcing->lista_outsourcing();


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Regional Nordeste';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/outsourcing_nordeste');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function outbh()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('outsourcing');
        $dados['equipamentos'] = $this->modelooutsourcing->lista_outsourcing();


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Regional BH';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/outsourcing_bh');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function outmetropolitana()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('outsourcing');
        $dados['equipamentos'] = $this->modelooutsourcing->lista_outsourcing();


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Regional Metropolitana';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/outsourcing_metropolitana');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function outap()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('outsourcing');
        $dados['equipamentos'] = $this->modelooutsourcing->lista_outsourcing();


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Access Point - Microcity';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/outsourcing_ap');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function outcftv()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('outsourcing');
        $dados['equipamentos'] = $this->modelooutsourcing->listCftv();
        
        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'CFTV - INTELBRAS';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/outsourcing_cftv');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function pingIp($meuip){

        exec("ping -n 1 -w 1 " . $meuip, $output, $result);
        if ($result == 0) {
            return '<span class="role member" data-ttt="tooltip" data-placement="right" title="STATUS NA REDE">ON</span>';
        } else {
            return '<span class="role admin" data-ttt="tooltip" data-placement="right" title="STATUS NA REDE">OFF</span>';
        }
        
    }

    public function statusPedido($datatoner)
    {
        if ($datatoner == 0) {
            return '<span class="role admin" data-ttt="tooltip" data-placement="right" title="ENTREGUE SIM OU NÃO?">NÃO</span>';
        } else {
            return '<span class="role member" data-ttt="tooltip" data-placement="right" title="ENTREGUE SIM OU NÃO?">SIM</span>';
        }
    }

    public function getLists()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelooutsourcing->getRows($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://'.$equipamento->ip.'" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">'.$equipamento->ip.'</a>',
                // $statusip = $this->pingIp($meuip = $equipamento->ip),
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="equipamentos/alterar/'. md5($equipamento->idequipamento). '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-'. $equipamento->idequipamento. '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelooutsourcing->countAll(),
            "recordsFiltered" => $this->modelooutsourcing->countFiltered($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListsnordeste()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelooutsourcing->getRows_nordeste($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                // $statusip = $this->pingIp($meuip = $equipamento->ip),
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelooutsourcing->countAll_nordeste(),
            "recordsFiltered" => $this->modelooutsourcing->countFiltered_nordeste($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListssudeste()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelooutsourcing->getRows_sudeste($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                // $statusip = $this->pingIp($meuip = $equipamento->ip),
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelooutsourcing->countAll_sudeste(),
            "recordsFiltered" => $this->modelooutsourcing->countFiltered_sudeste($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListsbh()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelooutsourcing->getRows_bh($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                // $statusip = $this->pingIp($meuip = $equipamento->ip),
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelooutsourcing->countAll_bh(),
            "recordsFiltered" => $this->modelooutsourcing->countFiltered_bh($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListsmetropolitana()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelooutsourcing->getRows_metropolitana($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                // $statusip = $this->pingIp($meuip = $equipamento->ip),
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelooutsourcing->countAll_metropolitana(),
            "recordsFiltered" => $this->modelooutsourcing->countFiltered_metropolitana($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListsap()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelooutsourcing->getRows_ap($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                // $statusip = $this->pingIp($meuip = $equipamento->ip),
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelooutsourcing->countAll_ap(),
            "recordsFiltered" => $this->modelooutsourcing->countFiltered_ap($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListssede()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelooutsourcing->getRows_sede($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                // $statusip = $this->pingIp($meuip = $equipamento->ip),
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelooutsourcing->countAll_sede(),
            "recordsFiltered" => $this->modelooutsourcing->countFiltered_sede($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListcftv()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelooutsourcing->getRows_cftv($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                // $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nometpequipamento = $equipamento->tpequipamento,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelooutsourcing->countAll_cftv(),
            "recordsFiltered" => $this->modelooutsourcing->countFiltered_cftv($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function exportaexceloutap()
    {
        $this->load->library('table');

        $this->equipamentos = $this->modelooutsourcing->lista_outsourcing();
        $dados['equipamentos'] = $this->equipamentos;
        $dados['nomeexcel'] = 'listaoutsourcing_ap';

        $this->load->view('templates/html-header-exportaoutsourcing', $dados);
        $this->load->view('equipamentos/excel-outsourcing');
        $this->load->view('templates/html-footer-exporta');
    }


    public function exportaexcel()
    {
        $this->load->library('table');

        $this->equipamentos = $this->modelooutsourcing->lista_outsourcing();
        $dados['equipamentos'] = $this->equipamentos;

        $this->load->view('templates/html-header-exportaoutsourcing', $dados);
        $this->load->view('equipamentos/excel-outsourcing');
        $this->load->view('templates/html-footer-exporta');
    }

    public function exportaexcelcftv()
    {
        $this->load->library('table');

        $this->equipamentos = $this->modelooutsourcing->listCftv();
        $dados['equipamentos'] = $this->equipamentos;
        $dados['nomeexcel'] = 'listacftv';

        $this->load->view('templates/html-header-exportaoutsourcing', $dados);
        $this->load->view('equipamentos/excel-outsourcingcftv');
        $this->load->view('templates/html-footer-exporta');
    }

    public function toner()
    {
        
        $this->load->library('table');
        // $this->statusPedido();
        $dados['chamadaJS'] = chamar_js('toneroutsourcing');
        $dados['pedidosout'] = $this->modelooutsourcing->lista_toner();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Gestão de Toner NOVO';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('outsourcing/toner');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function listagemtoner()
    {

        $this->load->library('table');
        $this->load->helper('date');
        // $this->statusPedido();
        $dados['chamadaJS'] = chamar_js('toneroutsourcing');
        $dados['pedidosout'] = $this->modelooutsourcing->lista_toner();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Gestão de Toner NOVO';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('outsourcing/listagem');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function listaTonerExcel()
    {
        $this->load->library('table');
        $this->load->helper('date');
        $this->toners = $this->modelooutsourcing->lista_toner();
        $dados['toners'] = $this->toners;
        $dados['nomeexcel'] = 'listagemgeraldetoner';

        $this->load->view('templates/html-header-exportaoutsourcing', $dados);
        $this->load->view('outsourcing/excel-toner');
        $this->load->view('templates/html-footer-exporta');
        
    }

    public function autocompleteData()
    {
        $returnData = array();

        // Get skills data
        $conditions['searchTerm'] = $this->input->get('term');
        $conditions['conditions']['outsourcing'] = 'SIM';
        $conditions['conditions']['tbstatus_idstatus'] = '1';
        $seriaisData = $this->modelooutsourcing->getSeriais_geral($conditions);

        // Generate array
        if (!empty($seriaisData)) {
            foreach ($seriaisData as $row) {
                $data['idequipamento']  = $row['idequipamento'];
                $data['value']          = $row['serial'];
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
        $patrimoniosData = $this->modelooutsourcing->getPatrimonios_geral($conditions);

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

    public function inserir_toner()
    {
        $this->load->model('outsourcing_model', 'modelooutsourcing');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-patrimonio', 'Patrimonio', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-serial', 'Serial', 'required');
        $this->form_validation->set_rules('txt-host', 'Host', 'required');
        $this->form_validation->set_rules('txt-unidade', 'Unidade', 'required');
        $this->form_validation->set_rules('txt-localizacao', 'Localização', 'required');
        $this->form_validation->set_rules('txt-chamadoservicedesk', 'Chamado Service Desk', 'required');
        $this->form_validation->set_rules('txt-chamadoout', 'Chamado Outsourcing', 'required');
        $this->form_validation->set_rules('txt-datasolicitacao', 'Data Solicitação', 'required');
        $this->form_validation->set_rules('txt-quantidadesolicitada', 'Quantidade Toner Preto', 'required');
        $this->form_validation->set_rules('txt-quantidadesolicitadaciano', 'Quantidade Toner Ciano', 'required');
        $this->form_validation->set_rules('txt-quantidadesolicitadamagenta', 'Quantidade Toner Magenta', 'required');
        $this->form_validation->set_rules('txt-quantidadesolicitadaamarelo', 'Quantidade Toner Amarelo', 'required');
        $this->form_validation->set_rules('txt-contadortotal', 'Contador Total', 'required');
        $this->form_validation->set_rules('txt-contadorpb', 'Contador PB', 'required');
        $this->form_validation->set_rules('txt-contadorcolor', 'Contador Colorido', 'required');


        if ($this->form_validation->run() == false) {
            $this->toner();
        } else {
            $patrimonio                     = $this->input->post('txt-patrimonio1');
            $serial                         = $this->input->post('txt-serial');
            $host                           = $this->input->post('txt-host');
            $unidade                        = $this->input->post('txt-unidade');
            $localizacao                    = $this->input->post('txt-localizacao');
            $chamadoservicedesk             = $this->input->post('txt-chamadoservicedesk');
            $chamadoout                     = $this->input->post('txt-chamadoout');
            $datachamado                    = $this->input->post('txt-datasolicitacao');
            $quantidadesolicitada           = $this->input->post('txt-quantidadesolicitada');
            $quantidadesolicitadaciano      = $this->input->post('txt-quantidadesolicitadaciano');
            $quantidadesolicitadamagenta    = $this->input->post('txt-quantidadesolicitadamagenta');
            $quantidadesolicitadaamarelo    = $this->input->post('txt-quantidadesolicitadaamarelo');
            $contadortotal                  = $this->input->post('txt-contadortotal');
            $contadorpb                     = $this->input->post('txt-contadorpb');
            $contadorcolor                  = $this->input->post('txt-contadorcolor');
            $statuschamadotoner             = $this->input->post('select-statuschamadotoner');
            $datachegadatoner               = $this->input->post('txt-datadachegada');
            $numeronf                       = $this->input->post('txt-numeronf');
            $quemrecebeutoner               = $this->input->post('txt-quemrecebeu');
            $numserietoner                  = $this->input->post('txt-numeroserietoner');
            $datadeinstalacaotoner          = $this->input->post('txt-datainstalacao');
            $modelotonerblack               = $this->input->post('txt-modelotonerblack');
            $capacidadetoner                = $this->input->post('txt-capacidadetoner');
            $numserietonerciano             = $this->input->post('txt-numeroserietonerciano');
            $datadeinstalacaociano          = $this->input->post('txt-datainstalacaociano');
            $modelotonerciano               = $this->input->post('txt-modelotonerciano');
            $capacidadetonerciano           = $this->input->post('txt-capacidadetonerciano');
            $numserietonermagenta           = $this->input->post('txt-numeroserietonermagenta');
            $datadeinstalacaomagenta        = $this->input->post('txt-datainstalacaomagenta');
            $modelotonermagenta             = $this->input->post('txt-modelotonermagenta');
            $capacidadetonermagenta         = $this->input->post('txt-capacidadetonermagenta');
            $numserietoneramarelo           = $this->input->post('txt-numeroserietoneramarelo');
            $datadeinstalacaoamarelo        = $this->input->post('txt-datainstalacaoamarelo');
            $modelotoneramarelo             = $this->input->post('txt-modelotoneramarelo');
            $capacidadetoneramarelo         = $this->input->post('txt-capacidadetoneramarelo');

            if ($this->modelooutsourcing->inserirToner($patrimonio, $serial, $host, $unidade, $localizacao, $chamadoservicedesk, $chamadoout, $datachamado, $quantidadesolicitada, $quantidadesolicitadaciano, $quantidadesolicitadamagenta, $quantidadesolicitadaamarelo, $contadortotal, $contadorpb, $contadorcolor, $statuschamadotoner, $datachegadatoner, $numeronf, $quemrecebeutoner, $numserietoner, $datadeinstalacaotoner, $modelotonerblack, $capacidadetoner, $numserietonerciano, $datadeinstalacaociano, $modelotonerciano, $capacidadetonerciano, $numserietonermagenta, $datadeinstalacaomagenta, $modelotonermagenta, $capacidadetonermagenta, $numserietoneramarelo, $datadeinstalacaoamarelo, $modelotoneramarelo, $capacidadetoneramarelo)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span>Pedido de toner inserido com sucesso.</div>');
                redirect(base_url('outsourcing/toner'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Falha ao inserir Pedido de toner.</div>');
                ;
            }
        }
    }

    public function excluir_toner($idtonerout)
    {

        if ($this->modelooutsourcing->excluirToner($idtonerout)) {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Excluído!!!</span> Pedido de toner excluído com sucesso.</div>');
            redirect(base_url('outsourcing/toner'));
        } else {
            $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Pedido de toner não excluído.</div>');
        }
    }

    public function alterar_toner($idtonerout)
    {

        $this->load->library('table');
        // $this->load->autocompleteData();
        $dados['pedidosout'] = $this->modelooutsourcing->lista_alteracao($idtonerout);
        $dados['modalmodelos'] = $this->modelooutsourcing->modeloToner();
        $dados['chamadaJS'] = chamar_js('toneroutsourcingalterar');
        //Dados a serem enviados  para o cabeçalho
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Gestão de toner';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('outsourcing/alterar-toner');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function salvar_alteracoestoner($idCrip)
    {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('txt-patrimonio', 'Patrimônio', 'required|min_length[3]');
        $this->form_validation->set_rules('txt-serial', 'Serial', 'required');
        $this->form_validation->set_rules('txt-chamadoservicedesk', 'Chamado Service Desk', 'required');
        $this->form_validation->set_rules('txt-chamadoout', 'Chamado Outsourcing', 'required');
        $this->form_validation->set_rules('txt-datasolicitacao', 'Data Solicitação', 'required');
        $this->form_validation->set_rules('txt-quantidadesolicitada', 'Quantidade Toner Preto', 'required');
        $this->form_validation->set_rules('txt-quantidadesolicitadaciano', 'Quantidade Toner Ciano', 'required');
        $this->form_validation->set_rules('txt-quantidadesolicitadamagenta', 'Quantidade Toner Magenta', 'required');
        $this->form_validation->set_rules('txt-quantidadesolicitadaamarelo', 'Quantidade Toner Amarelo', 'required');
        $this->form_validation->set_rules('txt-contadortotal', 'Contador Total', 'required');
        $this->form_validation->set_rules('txt-contadorpb', 'Contador PB', 'required');
        $this->form_validation->set_rules('txt-contadorcolor', 'Contador Colorido', 'required');

        if ($this->form_validation->run() == false) {
            $this->modelooutsourcing->alterarToner($idCrip);
			// $this->alterar_toner($idCrip);
        } else {
            $patrimonio                     = $this->input->post('txt-patrimonio1');
            $serial                         = $this->input->post('txt-serial');
            $host                           = $this->input->post('txt-host');
            $unidade                        = $this->input->post('txt-unidade');
            $localizacao                    = $this->input->post('txt-localizacao');
            $chamadoservicedesk             = $this->input->post('txt-chamadoservicedesk');
            $chamadoout                     = $this->input->post('txt-chamadoout');
            $datachamado                    = $this->input->post('txt-datasolicitacao');
            $quantidadesolicitada           = $this->input->post('txt-quantidadesolicitada');
            $quantidadesolicitadaciano      = $this->input->post('txt-quantidadesolicitadaciano');
            $quantidadesolicitadamagenta    = $this->input->post('txt-quantidadesolicitadamagenta');
            $quantidadesolicitadaamarelo    = $this->input->post('txt-quantidadesolicitadaamarelo');
            $contadortotal                  = $this->input->post('txt-contadortotal');
            $contadorpb                     = $this->input->post('txt-contadorpb');
            $contadorcolor                  = $this->input->post('txt-contadorcolor');
            $statuschamadotoner             = $this->input->post('select-statuschamadotoner');
            $datachegadatoner               = $this->input->post('txt-datadachegada');
            $numeronf                       = $this->input->post('txt-numeronf');
            $quemrecebeutoner               = $this->input->post('txt-quemrecebeu');
            $numserietoner                  = $this->input->post('txt-numeroserietoner');
            $datadeinstalacaotoner          = $this->input->post('txt-datainstalacao');
            $modelotonerblack               = $this->input->post('txt-modelotonerblack');
            $capacidadetoner                = $this->input->post('txt-capacidadetoner');
            $numserietonerciano             = $this->input->post('txt-numeroserietonerciano');
            $datadeinstalacaociano          = $this->input->post('txt-datainstalacaociano');
            $modelotonerciano               = $this->input->post('txt-modelotonerciano');
            $capacidadetonerciano           = $this->input->post('txt-capacidadetonerciano');
            $numserietonermagenta           = $this->input->post('txt-numeroserietonermagenta');
            $datadeinstalacaomagenta        = $this->input->post('txt-datainstalacaomagenta');
            $modelotonermagenta             = $this->input->post('txt-modelotonermagenta');
            $capacidadetonermagenta         = $this->input->post('txt-capacidadetonermagenta');
            $numserietoneramarelo           = $this->input->post('txt-numeroserietoneramarelo');
            $datadeinstalacaoamarelo        = $this->input->post('txt-datainstalacaoamarelo');
            $modelotoneramarelo             = $this->input->post('txt-modelotoneramarelo');
            $capacidadetoneramarelo         = $this->input->post('txt-capacidadetoneramarelo');
            $idtonerout                     = $this->input->post('txt-idtonerout');
            

            if ($this->modelooutsourcing->alterarToner($patrimonio, $serial, $host, $unidade, $localizacao, $chamadoservicedesk, $chamadoout, $datachamado, $quantidadesolicitada, $quantidadesolicitadaciano, $quantidadesolicitadamagenta, $quantidadesolicitadaamarelo, $contadortotal, $contadorpb, $contadorcolor, $statuschamadotoner, $datachegadatoner, $numeronf, $quemrecebeutoner, $numserietoner, $datadeinstalacaotoner, $modelotonerblack, $capacidadetoner, $numserietonerciano, $datadeinstalacaociano, $modelotonerciano, $capacidadetonerciano, $numserietonermagenta, $datadeinstalacaomagenta, $modelotonermagenta, $capacidadetonermagenta, $numserietoneramarelo, $datadeinstalacaoamarelo, $modelotoneramarelo, $capacidadetoneramarelo, $idtonerout)) {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
											<span class="badge badge-pill badge-success">Parabéns!!!</span> Pedido de toner alterado com sucesso.</div>');
                redirect(base_url('outsourcing/listagemtoner'));
            } else {
                $this->session->set_flashdata('msg', '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Erro!!!</span> Pedido de toner não alterado.</div>');
            }
        }
    }

    public function createExcelouttriangulo() {
		$fileName = 'outsourcing_triangulo.xlsx';  
		$employeeData = $this->modelooutsourcing->outsourcingtriangulo();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Tipo');
        $sheet->setCellValue('C1', 'Host');
        $sheet->setCellValue('D1', 'Usuário');
	    $sheet->setCellValue('E1', 'IP');
        $sheet->setCellValue('F1', 'Patrimônio');       
        $sheet->setCellValue('G1', 'Modelo');  
        $sheet->setCellValue('H1', 'Serial');  
        $sheet->setCellValue('I1', 'Processador');  
        $sheet->setCellValue('J1', 'HD');  
        $sheet->setCellValue('K1', 'RAM');  
        $sheet->setCellValue('L1', 'MAC');  
        $sheet->setCellValue('M1', 'Fabricante');  
        $sheet->setCellValue('N1', 'Regional');  
        $sheet->setCellValue('O1', 'Status');  
        $sheet->setCellValue('P1', 'Localização');  
        $sheet->setCellValue('Q1', 'Unidade');  
        $sheet->setCellValue('R1', 'Conexão');  
        $sheet->setCellValue('S1', 'Outsourcing');  
        $sheet->setCellValue('T1', 'Observação');  

        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['idequipamento']);
            $sheet->setCellValue('B' . $rows, $val['tpequipamentoid']);
            $sheet->setCellValue('C' . $rows, $val['host']);
            $sheet->setCellValue('D' . $rows, $val['usuario']);
	        $sheet->setCellValue('E' . $rows, $val['ip']);
            $sheet->setCellValue('F' . $rows, $val['patrimonio']);
            $sheet->setCellValue('G' . $rows, $val['modelo']);
            $sheet->setCellValue('H' . $rows, $val['serial']);
            $sheet->setCellValue('I' . $rows, $val['processador']);
            $sheet->setCellValue('J' . $rows, $val['hd']);
            $sheet->setCellValue('K' . $rows, $val['ram']);
            $sheet->setCellValue('L' . $rows, $val['mac']);
            $sheet->setCellValue('M' . $rows, $val['fabricantesesc']);
            $sheet->setCellValue('N' . $rows, $val['regionalsesc']);
            $sheet->setCellValue('O' . $rows, $val['statussesc']);
            $sheet->setCellValue('P' . $rows, $val['localizacaosesc']);
            $sheet->setCellValue('Q' . $rows, $val['unidadessesc']);
            $sheet->setCellValue('R' . $rows, $val['conexaosesc']);
            $sheet->setCellValue('S' . $rows, $val['outsourcing']);
            $sheet->setCellValue('T' . $rows, $val['obs']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }

    public function createExceloutbh() {
		$fileName = 'outsourcing_bh.xlsx';  
		$employeeData = $this->modelooutsourcing->outsourcingbh();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Tipo');
        $sheet->setCellValue('C1', 'Host');
        $sheet->setCellValue('D1', 'Usuário');
	    $sheet->setCellValue('E1', 'IP');
        $sheet->setCellValue('F1', 'Patrimônio');       
        $sheet->setCellValue('G1', 'Modelo');  
        $sheet->setCellValue('H1', 'Serial');  
        $sheet->setCellValue('I1', 'Processador');  
        $sheet->setCellValue('J1', 'HD');  
        $sheet->setCellValue('K1', 'RAM');  
        $sheet->setCellValue('L1', 'MAC');  
        $sheet->setCellValue('M1', 'Fabricante');  
        $sheet->setCellValue('N1', 'Regional');  
        $sheet->setCellValue('O1', 'Status');  
        $sheet->setCellValue('P1', 'Localização');  
        $sheet->setCellValue('Q1', 'Unidade');  
        $sheet->setCellValue('R1', 'Conexão');  
        $sheet->setCellValue('S1', 'Outsourcing');  
        $sheet->setCellValue('T1', 'Observação');  

        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['idequipamento']);
            $sheet->setCellValue('B' . $rows, $val['tpequipamentoid']);
            $sheet->setCellValue('C' . $rows, $val['host']);
            $sheet->setCellValue('D' . $rows, $val['usuario']);
	        $sheet->setCellValue('E' . $rows, $val['ip']);
            $sheet->setCellValue('F' . $rows, $val['patrimonio']);
            $sheet->setCellValue('G' . $rows, $val['modelo']);
            $sheet->setCellValue('H' . $rows, $val['serial']);
            $sheet->setCellValue('I' . $rows, $val['processador']);
            $sheet->setCellValue('J' . $rows, $val['hd']);
            $sheet->setCellValue('K' . $rows, $val['ram']);
            $sheet->setCellValue('L' . $rows, $val['mac']);
            $sheet->setCellValue('M' . $rows, $val['fabricantesesc']);
            $sheet->setCellValue('N' . $rows, $val['regionalsesc']);
            $sheet->setCellValue('O' . $rows, $val['statussesc']);
            $sheet->setCellValue('P' . $rows, $val['localizacaosesc']);
            $sheet->setCellValue('Q' . $rows, $val['unidadessesc']);
            $sheet->setCellValue('R' . $rows, $val['conexaosesc']);
            $sheet->setCellValue('S' . $rows, $val['outsourcing']);
            $sheet->setCellValue('T' . $rows, $val['obs']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }

    public function createExceloutnordeste() {
		$fileName = 'outsourcing_nordeste.xlsx';  
		$employeeData = $this->modelooutsourcing->outsourcingnordeste();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Tipo');
        $sheet->setCellValue('C1', 'Host');
        $sheet->setCellValue('D1', 'Usuário');
	    $sheet->setCellValue('E1', 'IP');
        $sheet->setCellValue('F1', 'Patrimônio');       
        $sheet->setCellValue('G1', 'Modelo');  
        $sheet->setCellValue('H1', 'Serial');  
        $sheet->setCellValue('I1', 'Processador');  
        $sheet->setCellValue('J1', 'HD');  
        $sheet->setCellValue('K1', 'RAM');  
        $sheet->setCellValue('L1', 'MAC');  
        $sheet->setCellValue('M1', 'Fabricante');  
        $sheet->setCellValue('N1', 'Regional');  
        $sheet->setCellValue('O1', 'Status');  
        $sheet->setCellValue('P1', 'Localização');  
        $sheet->setCellValue('Q1', 'Unidade');  
        $sheet->setCellValue('R1', 'Conexão');  
        $sheet->setCellValue('S1', 'Outsourcing');  
        $sheet->setCellValue('T1', 'Observação');  

        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['idequipamento']);
            $sheet->setCellValue('B' . $rows, $val['tpequipamentoid']);
            $sheet->setCellValue('C' . $rows, $val['host']);
            $sheet->setCellValue('D' . $rows, $val['usuario']);
	        $sheet->setCellValue('E' . $rows, $val['ip']);
            $sheet->setCellValue('F' . $rows, $val['patrimonio']);
            $sheet->setCellValue('G' . $rows, $val['modelo']);
            $sheet->setCellValue('H' . $rows, $val['serial']);
            $sheet->setCellValue('I' . $rows, $val['processador']);
            $sheet->setCellValue('J' . $rows, $val['hd']);
            $sheet->setCellValue('K' . $rows, $val['ram']);
            $sheet->setCellValue('L' . $rows, $val['mac']);
            $sheet->setCellValue('M' . $rows, $val['fabricantesesc']);
            $sheet->setCellValue('N' . $rows, $val['regionalsesc']);
            $sheet->setCellValue('O' . $rows, $val['statussesc']);
            $sheet->setCellValue('P' . $rows, $val['localizacaosesc']);
            $sheet->setCellValue('Q' . $rows, $val['unidadessesc']);
            $sheet->setCellValue('R' . $rows, $val['conexaosesc']);
            $sheet->setCellValue('S' . $rows, $val['outsourcing']);
            $sheet->setCellValue('T' . $rows, $val['obs']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }

    public function createExceloutsudeste() {
		$fileName = 'outsourcing_sudeste.xlsx';  
		$employeeData = $this->modelooutsourcing->outsourcingsudeste();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Tipo');
        $sheet->setCellValue('C1', 'Host');
        $sheet->setCellValue('D1', 'Usuário');
	    $sheet->setCellValue('E1', 'IP');
        $sheet->setCellValue('F1', 'Patrimônio');       
        $sheet->setCellValue('G1', 'Modelo');  
        $sheet->setCellValue('H1', 'Serial');  
        $sheet->setCellValue('I1', 'Processador');  
        $sheet->setCellValue('J1', 'HD');  
        $sheet->setCellValue('K1', 'RAM');  
        $sheet->setCellValue('L1', 'MAC');  
        $sheet->setCellValue('M1', 'Fabricante');  
        $sheet->setCellValue('N1', 'Regional');  
        $sheet->setCellValue('O1', 'Status');  
        $sheet->setCellValue('P1', 'Localização');  
        $sheet->setCellValue('Q1', 'Unidade');  
        $sheet->setCellValue('R1', 'Conexão');  
        $sheet->setCellValue('S1', 'Outsourcing');  
        $sheet->setCellValue('T1', 'Observação');  

        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['idequipamento']);
            $sheet->setCellValue('B' . $rows, $val['tpequipamentoid']);
            $sheet->setCellValue('C' . $rows, $val['host']);
            $sheet->setCellValue('D' . $rows, $val['usuario']);
	        $sheet->setCellValue('E' . $rows, $val['ip']);
            $sheet->setCellValue('F' . $rows, $val['patrimonio']);
            $sheet->setCellValue('G' . $rows, $val['modelo']);
            $sheet->setCellValue('H' . $rows, $val['serial']);
            $sheet->setCellValue('I' . $rows, $val['processador']);
            $sheet->setCellValue('J' . $rows, $val['hd']);
            $sheet->setCellValue('K' . $rows, $val['ram']);
            $sheet->setCellValue('L' . $rows, $val['mac']);
            $sheet->setCellValue('M' . $rows, $val['fabricantesesc']);
            $sheet->setCellValue('N' . $rows, $val['regionalsesc']);
            $sheet->setCellValue('O' . $rows, $val['statussesc']);
            $sheet->setCellValue('P' . $rows, $val['localizacaosesc']);
            $sheet->setCellValue('Q' . $rows, $val['unidadessesc']);
            $sheet->setCellValue('R' . $rows, $val['conexaosesc']);
            $sheet->setCellValue('S' . $rows, $val['outsourcing']);
            $sheet->setCellValue('T' . $rows, $val['obs']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }

    public function createExceloutmetropolitana() {
		$fileName = 'outsourcing_metropolitana.xlsx';  
		$employeeData = $this->modelooutsourcing->outsourcingmetropolitana();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Tipo');
        $sheet->setCellValue('C1', 'Host');
        $sheet->setCellValue('D1', 'Usuário');
	    $sheet->setCellValue('E1', 'IP');
        $sheet->setCellValue('F1', 'Patrimônio');       
        $sheet->setCellValue('G1', 'Modelo');  
        $sheet->setCellValue('H1', 'Serial');  
        $sheet->setCellValue('I1', 'Processador');  
        $sheet->setCellValue('J1', 'HD');  
        $sheet->setCellValue('K1', 'RAM');  
        $sheet->setCellValue('L1', 'MAC');  
        $sheet->setCellValue('M1', 'Fabricante');  
        $sheet->setCellValue('N1', 'Regional');  
        $sheet->setCellValue('O1', 'Status');  
        $sheet->setCellValue('P1', 'Localização');  
        $sheet->setCellValue('Q1', 'Unidade');  
        $sheet->setCellValue('R1', 'Conexão');  
        $sheet->setCellValue('S1', 'Outsourcing');  
        $sheet->setCellValue('T1', 'Observação');  

        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['idequipamento']);
            $sheet->setCellValue('B' . $rows, $val['tpequipamentoid']);
            $sheet->setCellValue('C' . $rows, $val['host']);
            $sheet->setCellValue('D' . $rows, $val['usuario']);
	        $sheet->setCellValue('E' . $rows, $val['ip']);
            $sheet->setCellValue('F' . $rows, $val['patrimonio']);
            $sheet->setCellValue('G' . $rows, $val['modelo']);
            $sheet->setCellValue('H' . $rows, $val['serial']);
            $sheet->setCellValue('I' . $rows, $val['processador']);
            $sheet->setCellValue('J' . $rows, $val['hd']);
            $sheet->setCellValue('K' . $rows, $val['ram']);
            $sheet->setCellValue('L' . $rows, $val['mac']);
            $sheet->setCellValue('M' . $rows, $val['fabricantesesc']);
            $sheet->setCellValue('N' . $rows, $val['regionalsesc']);
            $sheet->setCellValue('O' . $rows, $val['statussesc']);
            $sheet->setCellValue('P' . $rows, $val['localizacaosesc']);
            $sheet->setCellValue('Q' . $rows, $val['unidadessesc']);
            $sheet->setCellValue('R' . $rows, $val['conexaosesc']);
            $sheet->setCellValue('S' . $rows, $val['outsourcing']);
            $sheet->setCellValue('T' . $rows, $val['obs']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }

    public function createExceloutsede() {
		$fileName = 'outsourcing_sede.xlsx';  
		$employeeData = $this->modelooutsourcing->outsourcingsede();
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
       	$sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'Tipo');
        $sheet->setCellValue('C1', 'Host');
        $sheet->setCellValue('D1', 'Usuário');
	    $sheet->setCellValue('E1', 'IP');
        $sheet->setCellValue('F1', 'Patrimônio');       
        $sheet->setCellValue('G1', 'Modelo');  
        $sheet->setCellValue('H1', 'Serial');  
        $sheet->setCellValue('I1', 'Processador');  
        $sheet->setCellValue('J1', 'HD');  
        $sheet->setCellValue('K1', 'RAM');  
        $sheet->setCellValue('L1', 'MAC');  
        $sheet->setCellValue('M1', 'Fabricante');  
        $sheet->setCellValue('N1', 'Regional');  
        $sheet->setCellValue('O1', 'Status');  
        $sheet->setCellValue('P1', 'Localização');  
        $sheet->setCellValue('Q1', 'Unidade');  
        $sheet->setCellValue('R1', 'Conexão');  
        $sheet->setCellValue('S1', 'Outsourcing');  
        $sheet->setCellValue('T1', 'Observação');  

        $rows = 2;
        foreach ($employeeData as $val){
            $sheet->setCellValue('A' . $rows, $val['idequipamento']);
            $sheet->setCellValue('B' . $rows, $val['tpequipamentoid']);
            $sheet->setCellValue('C' . $rows, $val['host']);
            $sheet->setCellValue('D' . $rows, $val['usuario']);
	        $sheet->setCellValue('E' . $rows, $val['ip']);
            $sheet->setCellValue('F' . $rows, $val['patrimonio']);
            $sheet->setCellValue('G' . $rows, $val['modelo']);
            $sheet->setCellValue('H' . $rows, $val['serial']);
            $sheet->setCellValue('I' . $rows, $val['processador']);
            $sheet->setCellValue('J' . $rows, $val['hd']);
            $sheet->setCellValue('K' . $rows, $val['ram']);
            $sheet->setCellValue('L' . $rows, $val['mac']);
            $sheet->setCellValue('M' . $rows, $val['fabricantesesc']);
            $sheet->setCellValue('N' . $rows, $val['regionalsesc']);
            $sheet->setCellValue('O' . $rows, $val['statussesc']);
            $sheet->setCellValue('P' . $rows, $val['localizacaosesc']);
            $sheet->setCellValue('Q' . $rows, $val['unidadessesc']);
            $sheet->setCellValue('R' . $rows, $val['conexaosesc']);
            $sheet->setCellValue('S' . $rows, $val['outsourcing']);
            $sheet->setCellValue('T' . $rows, $val['obs']);
            $rows++;
        } 
        $writer = new Xlsx($spreadsheet);
		$writer->save("upload/".$fileName);
		header("Content-Type: application/vnd.ms-excel");
        redirect(base_url()."/upload/".$fileName);              
    }
}
