<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Onlineequipamentos extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('onlineequipamentos_model', 'modeloonline');

        if (!$this->session->userdata('logado')) {
            redirect(base_url('login'));
        }
    }
    
    public function index()
    {
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('online');


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('online/outsourcing');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function pingIp($meuip)
    {

        exec("ping -n 1 -l 1 " . $meuip, $output, $result);
        // exec("ping -n 1 -w 1 " . $meuip, $output, $result);
        if ($result == 0) {
            return '<span class="role member" data-ttt="tooltip" data-placement="right" title="STATUS NA REDE">ON</span>';
        } else {
            return '<span class="role admin" data-ttt="tooltip" data-placement="right" title="STATUS NA REDE">OFF</span>';
        }
    }

    public function getLists()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modeloonline->getRows($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $statusip = $this->pingIp($meuip = $equipamento->ip)
                // $opcoes = '<a href="equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modeloonline->countAll(),
            "recordsFiltered" => $this->modeloonline->countFiltered($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function outnordeste()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('online');


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Regional Nordeste';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('online/outsourcing_nordeste');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function getListsnordeste()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modeloonline->getRows_nordeste($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $statusip = $this->pingIp($meuip = $equipamento->ip)
                // $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modeloonline->countAll_nordeste(),
            "recordsFiltered" => $this->modeloonline->countFiltered_nordeste($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function outsudeste()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('online');


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Regional Sudeste';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('online/outsourcing_sudeste');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function getListssudeste()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modeloonline->getRows_sudeste($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $statusip = $this->pingIp($meuip = $equipamento->ip)
                // $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modeloonline->countAll_sudeste(),
            "recordsFiltered" => $this->modeloonline->countFiltered_sudeste($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function outbh()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('online');


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Regional BH';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('online/outsourcing_bh');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function getListsbh()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modeloonline->getRows_bh($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $statusip = $this->pingIp($meuip = $equipamento->ip)
                // $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modeloonline->countAll_bh(),
            "recordsFiltered" => $this->modeloonline->countFiltered_bh($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function outmetropolitana()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('online');


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Regional Metropolitana';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('online/outsourcing_metropolitana');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function getListsmetropolitana()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modeloonline->getRows_metropolitana($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $statusip = $this->pingIp($meuip = $equipamento->ip)
                // $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modeloonline->countAll_metropolitana(),
            "recordsFiltered" => $this->modeloonline->countFiltered_metropolitana($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function outap()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('online');

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Access Point - Microcity';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('online/outsourcing_ap');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function getListsap()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modeloonline->getRows_ap($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $statusip = $this->pingIp($meuip = $equipamento->ip)
                // $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modeloonline->countAll_ap(),
            "recordsFiltered" => $this->modeloonline->countFiltered_ap($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

    public function outsede()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('online');


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - Sede';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('online/outsourcing_sede');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function getListssede()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modeloonline->getRows_sede($_POST);


        $i = $_POST['start'];
        foreach ($equipamentos as $equipamento) {
            $i++;
            $data[] = array(
                $i,
                // $numidequipamento = $equipamento->idequipamento,
                $numpatrimonio = $equipamento->patrimonio,
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://' . $equipamento->ip . '" class="role user" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">' . $equipamento->ip . '</a>',
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $statusip = $this->pingIp($meuip = $equipamento->ip)
                // $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modeloonline->countAll_sede(),
            "recordsFiltered" => $this->modeloonline->countFiltered_sede($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }

     public function outcftv()
    {

        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('online');


        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Outsourcing - CFTV';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('online/outsourcing_cftv');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
    }

    public function getListcftv()
    {
        $data = $row = array();

        // Fetch member's records
        $equipamentos = $this->modeloonline->getRows_cftv($_POST);


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
                // $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $statusip = $this->pingIp($meuip = $equipamento->ip)
                // $opcoes = '<a href="../equipamentos/alterar/' . md5($equipamento->idequipamento) . '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $equipamento->idequipamento . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
            );
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->modeloonline->countAll_sede(),
            "recordsFiltered" => $this->modeloonline->countFiltered_sede($_POST),
            "data" => $data,
        );

        // Output to JSON format
        echo json_encode($output);
    }
}

/* End of file Onlineequipamentos.php */
