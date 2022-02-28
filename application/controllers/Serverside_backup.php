<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Serverside extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        
        // Load member model
        $this->load->model('serverside_model', 'modelserver');
        $this->load->model('equipamentos_model', 'modelequipamentos');
        
    }

    function index()
    {
        $this->load->library('table');

        $this->equipamentos = $this->modelserver->lista_geral1();
        $dados['equipamentos'] = $this->equipamentos;

        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Listagem Server Side Datatables';
        // Load the member list view
        $this->load->view('serverside', $dados);
    }

    function getLists()
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

}

/* End of file Serverside.php */




