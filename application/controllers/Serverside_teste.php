<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Serverside extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Load member model
        $this->load->model('serverside_model', 'modelserver');
        $this->load->model('equipamentos_model', 'modelequipamentos');
        
    }

    public function index()
    {
        $dados['chamadaJS'] = chamar_js('equipamentos');
        $this->load->library('table');
        $dados['equipamentos'] = $this->modelserver->lista_geral1();

        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Listagem Server Side Datatables';
		// Load the member list view
		
		// $this->load->view('equipamentos/serverside', $dados);


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
                $opcoes = '<a href="equipamentos/alterar/'.md5($equipamento->idequipamento). '"><button type="button" class="btn btn-success btn-sm item" data-ttt="tooltip" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp
                <button type="button" class="btn btn-danger btn-sm item" data-tttt="tooltip" data-toggle="modal" data-placement="top" data-target=".excluir-modal-'.$equipamento->idequipamento. '" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>&nbsp
                <button type="button" class="btn btn-warning btn-sm item" id="btnDetalhesEquipamento" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target="#modalDetalhesEquipamento" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
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




