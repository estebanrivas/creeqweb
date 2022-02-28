<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Simpress extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('simpress_model', 'modelosimpress');

        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('simpress');
        $dados['equipamentos'] = $this->modelosimpress->lista_outsourcing();

		//Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Listagem da SIMPRESS - TRIÂNGULO';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('simpress/simpress');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function simpressbh()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('simpress');
        $dados['equipamentos'] = $this->modelosimpress->lista_outsourcing();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Listagem da SIMPRESS - BH';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('simpress/simpressbh');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function simpressnordeste()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('simpress');
        $dados['equipamentos'] = $this->modelosimpress->lista_outsourcing();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Listagem da SIMPRESS - NORDESTE';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('simpress/simpressnordeste');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function simpresssudeste()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('simpress');
        $dados['equipamentos'] = $this->modelosimpress->lista_outsourcing();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Listagem da SIMPRESS - SUDESTE';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('simpress/simpresssudeste');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function simpressmetropolitana()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('simpress');
        $dados['equipamentos'] = $this->modelosimpress->lista_outsourcing();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Listagem da SIMPRESS - METROPOLITANA';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('simpress/simpressmetropolitana');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function getLists()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelosimpress->getRows($_POST);

        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://'.$equipamento->ip.'" class="btn btn-info btn-sm item" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">'.$equipamento->ip.'</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="equipamentos/alterar/'. md5( $equipamento->idequipamento). '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-'. $equipamento->idequipamento. '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelosimpress->countAll(),
            "recordsFiltered" => $this->modelosimpress->countFiltered($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListsbh()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelosimpress->getRowsbh($_POST);

        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="btn btn-info btn-sm item" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelosimpress->countAllbh(),
            "recordsFiltered" => $this->modelosimpress->countFilteredbh($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListsnordeste()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelosimpress->getRowsnordeste($_POST);

        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="btn btn-info btn-sm item" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelosimpress->countAllnordeste(),
            "recordsFiltered" => $this->modelosimpress->countFilterednordeste($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListssudeste()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelosimpress->getRowssudeste($_POST);

        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="btn btn-info btn-sm item" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelosimpress->countAllsudeste(),
            "recordsFiltered" => $this->modelosimpress->countFilteredsudeste($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function getListsmetropolitana()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modelosimpress->getRowsmetropolitana($_POST);

        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="btn btn-info btn-sm item" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modelosimpress->countAllmetropolitana(),
            "recordsFiltered" => $this->modelosimpress->countFilteredmetropolitana($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }


    public function exportaexcel()
    {
        $this->load->library('table');

        $this->equipamentos = $this->modelosimpress->lista_outsourcing();
        $dados['equipamentos'] = $this->equipamentos;
        $dados['nomeexcel']  = 'listasimpressgeral';

        $this->load->view('templates/html-header-simpress', $dados);
        $this->load->view('simpress/excel-simpress');
        $this->load->view('templates/html-footer-exporta');
    }

}
