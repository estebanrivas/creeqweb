<?php
defined('BASEPATH') or exit('No direct script access allowed');

require __DIR__ . "/../helpers/config.php";
require __DIR__ . "/../helpers/funcoes_helper.php";

class Serverside2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        // Load member model
        $this->load->model('serverside2_model', 'modelserver');
        // $this->load->model('equipamentos_model', 'modelequipamentos');
        
    }

    public function index()
    {
        $this->load->library('table');

        $this->equipamentos = $this->modelserver->lista_geral1();
        $dados['equipamentos'] = $this->equipamentos;

        $dados['titulo'] = CONF_SYS_NAME_SYSTEM;
        $dados['nomesistema'] = CONF_SYS_NAME_SYSTEM;
        $dados['versao'] = CONF_SYS_VERSION_SYSTEM;
        $dados['subtitulo'] = 'Listagem Server Side Datatables 2';
        // Load the member list view
        $this->load->view('serverside2', $dados, array());
    }

    public function getlist()
    {
        // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $order = $this->input->get("order");

        $col = 0;
        $dir = "";
        if (!empty($order)) {
            foreach ($order as $o) {
                $col = $o['column'];
                $dir = $o['dir'];
            }
        }

        if ($dir != "asc" && $dir != "desc") {
            $dir = "asc";
        }

        $columns_valid = array(
            "geral_view.idequipamento",
            "geral_view.patrimonio",
            "geral_view.unidadessesc",
            "geral_view.usuario",
            "geral_view.tipoequipamento",
            "geral_view.teamviewer"
        );

        if (!isset($columns_valid[$col])) {
            $order = null;
        } else {
            $order = $columns_valid[$col];
        }

        $equipamentos = $this->modelserver->get_equipamentos($start, $length, $order, $dir);

        $data = array();

        foreach ($equipamentos->result() as $r) {

            $data[] = array(
                $r->idequipamento,
                $r->patrimonio,
                $r->unidadessesc,
                $r->usuario,
                $r->tipoequipamento,
                $r->teamviewer
            );
        }

        $total_equipamentos = $this->modelserver->get_total_equipamentos();
        $output = array(
            "draw" => $draw,
            "recordsTotal" => $total_equipamentos,
            "recordsFiltered" => $total_equipamentos,
            "data" => $data
        );
        echo json_encode($output);
        exit();

        
    }

}

/* End of file Serverside2.php */
