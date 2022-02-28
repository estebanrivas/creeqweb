<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $dados['titulo'] = 'Creeq';
        $dados['nomesistema'] = 'Creeq';
        $dados['versao'] = 'v3.5';
        $dados['subtitulo'] = 'Outsourcing';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('equipamentos/outsourcing');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');
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
                $numserial = $equipamento->serial,
                $nomeip = '<a href="http://'.$equipamento->ip.'" class="btn btn-info btn-sm item" data-toggle="tooltip1" data-placement="right" title="IP" target="_blank">'.$equipamento->ip.'</a>',
                // $numserial = anchor('http://' . $equipamento->ip, $equipamento->ip, ['title' => 'IP', 'class' => 'btn btn-info btn-sm item', 'data-ttt' => 'tooltip', 'data-placement' => 'right', 'target' => '_blank']),
                // $nomeip = $equipamento->ip,
                $nomeunidade = $equipamento->unidadessesc,
                $nomehost = $equipamento->host,
                $nomelocalizacao = $equipamento->localizacaosesc,
                $opcoes = '<a href="equipamentos/alterar/'. md5( $equipamento->idequipamento). '"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip2" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-'. $equipamento->idequipamento. '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>'
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

    public function exportaexcel()
    {
        $this->load->library('table');

        $this->equipamentos = $this->modelequipamentos->lista_outsourcing();
        $dados['equipamentos'] = $this->equipamentos;

        $this->load->view('templates/html-header-exportaoutsourcing', $dados);
        $this->load->view('equipamentos/excel-outsourcing');
        $this->load->view('templates/html-footer-exporta');
    }

    public function toner(){
        
        $this->load->library('table');
        $dados['chamadaJS'] = chamar_js('toneroutsourcing');
        // $dados['equipamentos'] = $this->modelooutsourcing->lista_outsourcing();

        //Dados a serem enviados para o cabeçalho e rodapé
        $dados['titulo'] = 'Creeq';
        $dados['nomesistema'] = 'Creeq';
        $dados['versao'] = 'v3.5';
        $dados['subtitulo'] = 'Gestão de Toner';

        $this->load->view('templates/html-header', $dados);
        $this->load->view('templates/header');
        $this->load->view('outsourcing/toner');
        $this->load->view('templates/footer');
        $this->load->view('templates/html-footer');

    }

    public function autocompleteData(){
        $returnData = array();

        // Obter os dados
        $conditions['searchTerm'] = $this->input->get('serial');
        $conditions['conditions']['serial'] = '1';
        $serialData = $this->modelooutsourcing->getRows($conditions);

        //Gerar o array
        if(!empty($serialData)){
            foreach($serialData as $row){
                $data['idequipamento'] = $row['idequipamento'];
                $data['value'] = $row['serial'];
                array_push($returnData, $data);
            }

            //Retornando os resultados em formato json
            echo json_encode($returnData);die;
        }
    }
}
