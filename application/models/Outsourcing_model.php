<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Outsourcing_model extends CI_Model {
    public $idtonerout;
    public $patrimonio;
    public $serial;
    public $host;
    public $unidade;
    public $localizacao;
    public $chamadoservicedesk;
    public $chamadoout;
    public $datachamado;
    public $quantidadesolicitada;
    public $contadortotal;
    public $contadorpb;
    public $contadorcolor;
    public $datachegadatorner;
    public $numeronf;
    public $quemrecebeutoner;
    public $numserietoner;
    public $datadeinstalacaotoner;
    public $modelotonerblack;
    public $capacidadetoner;
    public $numserietonerciano;
    public $datadeinstalacaociano;
    public $modelotonerciano;
    public $capacidadetonerciano;
    public $numserietonermagenta;
    public $datadeinstalacaomagenta;
    public $modelotonermagenta;
    public $capacidadetonermagenta;
    public $numserietoneramarelo;
    public $datadeinstalacaoamarelo;
    public $modelotoneramarelo;
    public $capacidadetoneramarelo;



    public function __construct()
    {
        // Set table name
        $this->table = 'outsourcing_view';
        $this->table1 = 'outsourcingsudeste_view';
        $this->table2 = 'outsourcingnordeste_view';
        $this->table3 = 'outsourcingbh_view';
        $this->table4 = 'outsourcingmetropolitana_view';
        $this->table5 = 'outsourcingap_view';
        $this->table6 = 'outsourcingsede_view';
        $this->table7 = 'camerascftv_view';
        // Set orderable column fields
        $this->column_order = array(null, 'patrimonio', 'serial', 'ip', 'unidadessesc', 'host', 'tpequipamento', 'localizacaosesc');
        // Set searchable column fields
        $this->column_search = array('patrimonio', 'serial', 'ip', 'unidadessesc', 'host', 'tpequipamento', 'localizacaosesc');
        // Set default ordersão 
        $this->order = array('ip' => 'asc');
        $this->dbTbl = 'tbequipamento';
        $this->dbTbl = 'outsourcing_view';
        $this->dbTbl1 = 'outsourcingsudeste_view';
        $this->dbTbl2 = 'outsourcingnordeste_view';
        $this->dbTbl3 = 'outsourcingbh_view';
        $this->dbTbl4 = 'outsourcingmetropolitana_view';
        $this->dbTbl5 = 'outsourcinggeral_view';
        $this->dbTbl6 = 'outsourcingsede_view';
    }
    
    /*
     * Fetch members data from the database
     * @param $_POST filter data based on the posted parameters
     */
    public function getRows($postData)
    {
        $this->_get_datatables_query($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRows_sudeste($postData)
    {
        $this->_get_datatables_query_sudeste($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRows_nordeste($postData)
    {
        $this->_get_datatables_query_nordeste($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRows_bh($postData)
    {
        $this->_get_datatables_query_bh($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRows_metropolitana($postData)
    {
        $this->_get_datatables_query_metropolitana($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRows_ap($postData)
    {
        $this->_get_datatables_query_ap($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRows_sede($postData)
    {
        $this->_get_datatables_query_sede($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRows_cftv($postData)
    {
        $this->_get_datatables_query_cftv($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    
    /*
     * Count all records
     */
    public function countAll()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function countAll_sudeste()
    {
        $this->db->from($this->table1);
        return $this->db->count_all_results();
    }

    public function countAll_nordeste()
    {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }

    public function countAll_bh()
    {
        $this->db->from($this->table3);
        return $this->db->count_all_results();
    }

    public function countAll_metropolitana()
    {
        $this->db->from($this->table4);
        return $this->db->count_all_results();
    }

    public function countAll_ap()
    {
        $this->db->from($this->table5);
        return $this->db->count_all_results();
    }

    public function countAll_sede()
    {
        $this->db->from($this->table6);
        return $this->db->count_all_results();
    }
    
    public function countAll_cftv()
    {
        $this->db->from($this->table7);
        return $this->db->count_all_results();
    }
    /*
     * Count records based on the filter params
     * @param $_POST filter data based on the posted parameters
     */
    public function countFiltered($postData)
    {
        $this->_get_datatables_query($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFiltered_sudeste($postData)
    {
        $this->_get_datatables_query_sudeste($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFiltered_bh($postData)
    {
        $this->_get_datatables_query_bh($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFiltered_nordeste($postData)
    {
        $this->_get_datatables_query_nordeste($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFiltered_metropolitana($postData)
    {
        $this->_get_datatables_query_metropolitana($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFiltered_ap($postData)
    {
        $this->_get_datatables_query_ap($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFiltered_sede($postData)
    {
        $this->_get_datatables_query_sede($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFiltered_cftv($postData)
    {
        $this->_get_datatables_query_cftv($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    /*
     * Perform the SQL queries needed for an server-side processing requested
     * @param $_POST filter data based on the posted parameters
     */
    private function _get_datatables_query($postData)
    {

        $this->db->from($this->table);

        $i = 0;
        // loop searchable columns 
        foreach ($this->column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if (count($this->column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query_sudeste($postData)
    {

        $this->db->from($this->table1);

        $i = 0;
        // loop searchable columns 
        foreach ($this->column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }

                // last loop
                if (count($this->column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query_bh($postData)
    {

        $this->db->from($this->table3);

        $i = 0;
        // loop searchable columns 
        foreach ($this->column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }

                // last loop
                if (count($this->column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query_nordeste($postData)
    {

        $this->db->from($this->table2);

        $i = 0;
        // loop searchable columns 
        foreach ($this->column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }

                // last loop
                if (count($this->column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query_metropolitana($postData)
    {

        $this->db->from($this->table4);

        $i = 0;
        // loop searchable columns 
        foreach ($this->column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }

                // last loop
                if (count($this->column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query_ap($postData)
    {

        $this->db->from($this->table5);

        $i = 0;
        // loop searchable columns 
        foreach ($this->column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }

                // last loop
                if (count($this->column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query_sede($postData)
    {

        $this->db->from($this->table6);

        $i = 0;
        // loop searchable columns 
        foreach ($this->column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }

                // last loop
                if (count($this->column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    private function _get_datatables_query_cftv($postData)
    {

        $this->db->from($this->table7);

        $i = 0;
        // loop searchable columns 
        foreach ($this->column_search as $item) {
            // if datatable send POST for search
            if ($postData['search']['value']) {
                // first loop
                if ($i === 0) {
                    // open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }

                // last loop
                if (count($this->column_search) - 1 == $i) {
                    // close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($postData['order'])) {
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function lista_outsourcing()
    {
        $this->db->select('tbequipamento.idequipamento, tbtpequipamento.idtpequipamento as tpequipamentoid, tbtpequipamento.tpequipamento as tipoequipamento, tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.host, tbequipamento.usuario, tbequipamento.ip, tbequipamento.patrimonio, tbequipamento.modelo, tbequipamento.serial, tbequipamento.processador, tbequipamento.telamonitor, tbequipamento.hd, tbequipamento.ram, tbequipamento.mac, tbequipamento.macw, tbequipamento.macb, tbequipamento.tbfabricante_idfabricante, tbequipamento.tbso_idso, tbequipamento.tbstatus_idstatus, tbequipamento.tblocalizacao_idlocalizacao, tbequipamento.tbunidades_idunidade, tbequipamento.tbconexao_idconexao, tbequipamento.outsourcing, tbequipamento.obs, tbequipamento.teamviewer, tbequipamento.descricaoequipamento, tbfabricante.idfabricante as fabricanteid, tbfabricante.fabricante as fabricantesesc, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbso.idso as soid, tbso.so as sosesc, tbstatus.idstatus as statusid, tbstatus.status as statussesc, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc, tbconexao.idconexao as conexaoid, tbconexao.conexao as conexaosesc');
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
        $this->db->where('outsourcing = "SIM"');
        $this->db->order_by('tbunidades.unidade', 'ASC');
        return $this->db->get()->result();
    }

    public function listCftv(){
        $this->db->select('tbequipamento.idequipamento as idequipamento,tbequipamento.host as host, tbequipamento.usuario as usuario, tbequipamento.ip as ip, tbequipamento.patrimonio as patrimonio, tbequipamento.modelo as modelo, tbequipamento.mac as mac, tbequipamento.outsourcing as outsourcing, tbequipamento.obs as obs, tbunidades.unidade as unidadessesc, tbstatus.status as statussesc, tbregional.regional as regionalsesc, tbtpequipamento.tpequipamento as tpequipamento, tbfabricante.fabricante as fabricantesesc, tblocalizacao.localizacao as localizacaosesc, tbconexao.conexao as conexaosesc');
        $this->db->from('tbequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tbtpequipamento','tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
        // $this->db->where('tbstatus.status = 1');
        // $this->db->where('outsourcing = "NAO"');
        // $this->db->where('tbregional.regional = "4"');
        $this->db->where('tbequipamento.tbtpequipamento_idtpequipamento = 53');
        $this->db->or_where('tbequipamento.tbtpequipamento_idtpequipamento = 54');
        $this->db->order_by('ip', 'ASC');
        return $this->db->get()->result();
    }

    public function lista_toner(){
        $this->db->select('*');
        $this->db->from('tbtonerout');
        $this->db->order_by('datachamado', 'ASC');
        return $this->db->get()->result();
    }

    public function modeloToner(){
        $this->db->select('*');
        $this->db->from('tbmodtoner');
        $this->db->order_by('modimpressora_modtoner', 'ASC');
        return $this->db->get()->result();
    }


    // Função de incluir toner solicitado pelo outsourcing
    public function inserirToner($patrimonio, $serial, $host, $unidade, $localizacao, $chamadoservicedesk, $chamadoout, $datachamado, $quantidadesolicitada, $quantidadesolicitadaciano, $quantidadesolicitadamagenta, $quantidadesolicitadaamarelo, $contadortotal, $contadorpb, $contadorcolor, $statuschamadotoner, $datachegadatoner, $numeronf, $quemrecebeutoner, $numserietoner, $datadeinstalacaotoner, $modelotonerblack, $capacidadetoner, $numserietonerciano, $datadeinstalacaociano, $modelotonerciano, $capacidadetonerciano, $numserietonermagenta, $datadeinstalacaomagenta, $modelotonermagenta, $capacidadetonermagenta, $numserietoneramarelo, $datadeinstalacaoamarelo, $modelotoneramarelo, $capacidadetoneramarelo){

        $dados['patrimonio']                    = $patrimonio;
        $dados['serial']                        = $serial;
        $dados['host']                          = $host;
        $dados['unidade']                       = $unidade;
        $dados['localizacao']                   = $localizacao;
        $dados['chamadoservicedesk']            = $chamadoservicedesk;
        $dados['chamadoout']                    = $chamadoout;
        $dados['datachamado']                   = $datachamado;
        $dados['quantidadesolicitada']          = $quantidadesolicitada;
        $dados['quantidadesolicitadaciano']     = $quantidadesolicitadaciano;
        $dados['quantidadesolicitadamagenta']   = $quantidadesolicitadamagenta;
        $dados['quantidadesolicitadaamarelo']   = $quantidadesolicitadaamarelo;
        $dados['contadortotal']                 = $contadortotal;
        $dados['contadorpb']                    = $contadorpb;
        $dados['contadorcolor']                 = $contadorcolor;
        $dados['statuschamadotoner']            = $statuschamadotoner;
        $dados['datachegadatoner']              = $datachegadatoner;
        $dados['numeronf']                      = $numeronf;
        $dados['quemrecebeutoner']              = $quemrecebeutoner;
        $dados['numserietoner']                 = $numserietoner;
        $dados['datadeinstalacaotoner']         = $datadeinstalacaotoner;
        $dados['modelotonerblack']              = $modelotonerblack;
        $dados['capacidadetoner']               = $capacidadetoner;
        $dados['numserietonerciano']            = $numserietonerciano;
        $dados['datadeinstalacaociano']         = $datadeinstalacaociano;
        $dados['modelotonerciano']              = $modelotonerciano;
        $dados['capacidadetonerciano']          = $capacidadetonerciano;
        $dados['numserietonermagenta']          = $numserietonermagenta;
        $dados['datadeinstalacaomagenta']       = $datadeinstalacaomagenta;
        $dados['modelotonermagenta']            = $modelotonermagenta;
        $dados['capacidadetonermagenta']        = $capacidadetonermagenta;
        $dados['numserietoneramarelo']          = $numserietoneramarelo;
        $dados['datadeinstalacaoamarelo']       = $datadeinstalacaoamarelo;
        $dados['modelotoneramarelo']            = $modelotoneramarelo;
        $dados['capacidadetoneramarelo']        = $capacidadetoneramarelo;


        return $this->db->insert('tbtonerout', $dados);
    }

    // Função de excluir toner solicitado pelo outsourcing
    public function excluirToner($idtonerout){

        $this->db->where('md5(idtonerout)', $idtonerout);
        return $this->db->delete('tbtonerout');
    }

    // Função de alterar toner solicitado pelo outsourcing
    public function alterarToner($patrimonio, $serial, $host, $unidade, $localizacao, $chamadoservicedesk, $chamadoout, $datachamado, $quantidadesolicitada, $quantidadesolicitadaciano, $quantidadesolicitadamagenta, $quantidadesolicitadaamarelo, $contadortotal, $contadorpb, $contadorcolor, $statuschamadotoner, $datachegadatoner, $numeronf, $quemrecebeutoner, $numserietoner, $datadeinstalacaotoner, $modelotonerblack, $capacidadetoner, $numserietonerciano, $datadeinstalacaociano, $modelotonerciano, $capacidadetonerciano, $numserietonermagenta, $datadeinstalacaomagenta, $modelotonermagenta, $capacidadetonermagenta, $numserietoneramarelo, $datadeinstalacaoamarelo, $modelotoneramarelo, $capacidadetoneramarelo, $idtonerout)
    {
        $dados['patrimonio']                    = $patrimonio;
        $dados['serial']                        = $serial;
        $dados['host']                          = $host;
        $dados['unidade']                       = $unidade;
        $dados['localizacao']                   = $localizacao;
        $dados['chamadoservicedesk']            = $chamadoservicedesk;
        $dados['chamadoout']                    = $chamadoout;
        $dados['datachamado']                   = $datachamado;
        $dados['quantidadesolicitada']          = $quantidadesolicitada;
        $dados['quantidadesolicitadaciano']     = $quantidadesolicitadaciano;
        $dados['quantidadesolicitadamagenta']   = $quantidadesolicitadamagenta;
        $dados['quantidadesolicitadaamarelo']   = $quantidadesolicitadaamarelo;
        $dados['contadortotal']                 = $contadortotal;
        $dados['contadorpb']                    = $contadorpb;
        $dados['contadorcolor']                 = $contadorcolor;
        $dados['statuschamadotoner']            = $statuschamadotoner;
        $dados['datachegadatoner']              = $datachegadatoner;
        $dados['numeronf']                      = $numeronf;
        $dados['quemrecebeutoner']              = $quemrecebeutoner;
        $dados['numserietoner']                 = $numserietoner;
        $dados['datadeinstalacaotoner']         = $datadeinstalacaotoner;
        $dados['modelotonerblack']              = $modelotonerblack;
        $dados['capacidadetoner']               = $capacidadetoner;
        $dados['numserietonerciano']            = $numserietonerciano;
        $dados['datadeinstalacaociano']         = $datadeinstalacaociano;
        $dados['modelotonerciano']              = $modelotonerciano;
        $dados['capacidadetonerciano']          = $capacidadetonerciano;
        $dados['numserietonermagenta']          = $numserietonermagenta;
        $dados['datadeinstalacaomagenta']       = $datadeinstalacaomagenta;
        $dados['modelotonermagenta']            = $modelotonermagenta;
        $dados['capacidadetonermagenta']        = $capacidadetonermagenta;
        $dados['numserietoneramarelo']          = $numserietoneramarelo;
        $dados['datadeinstalacaoamarelo']       = $datadeinstalacaoamarelo;
        $dados['modelotoneramarelo']            = $modelotoneramarelo;
        $dados['capacidadetoneramarelo']        = $capacidadetoneramarelo;

        $this->db->where('idtonerout', $idtonerout);
        return $this->db->update('tbtonerout', $dados);
    }

    public function lista_alteracao($idtonerout)
    {
        $this->db->select('*');
        $this->db->order_by('serial', 'ASC');
        $this->db->where('md5(idtonerout)', $idtonerout);

        return $this->db->get('tbtonerout')->result();
    }

    /*
    * Get seriais form the outsourcing_view table
    */
    public function getSeriais($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('serial', $params['searchTerm']);
        }

        $this->db->order_by('serial', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getSeriais_bh($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl3);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('serial', $params['searchTerm']);
        }

        $this->db->order_by('serial', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getSeriais_nordeste($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl2);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('serial', $params['searchTerm']);
        }

        $this->db->order_by('serial', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getSeriais_sudeste($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl1);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('serial', $params['searchTerm']);
        }

        $this->db->order_by('serial', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getSeriais_metropolitana($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl4);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('serial', $params['searchTerm']);
        }

        $this->db->order_by('serial', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getSeriais_geral($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl5);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('serial', $params['searchTerm']);
        }

        $this->db->order_by('serial', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getPatrimonios($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('patrimonio', $params['searchTerm']);
        }

        $this->db->order_by('patrimonio', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getPatrimonios_bh($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl3);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('patrimonio', $params['searchTerm']);
        }

        $this->db->order_by('patrimonio', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getPatrimonios_metropolitana($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl4);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('patrimonio', $params['searchTerm']);
        }

        $this->db->order_by('patrimonio', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getPatrimonios_nordeste($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl2);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('patrimonio', $params['searchTerm']);
        }

        $this->db->order_by('patrimonio', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getPatrimonios_sudeste($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl1);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('patrimonio', $params['searchTerm']);
        }

        $this->db->order_by('patrimonio', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function getPatrimonios_geral($params = array())
    {
        $this->db->select("*");
        $this->db->from($this->dbTbl5);

        //fetch data by conditions
        if (array_key_exists("conditions", $params)) {
            foreach ($params['conditions'] as $key => $value) {
                $this->db->where($key, $value);
            }
        }

        //search by terms
        if (!empty($params['searchTerm'])) {
            $this->db->like('patrimonio', $params['searchTerm']);
        }

        $this->db->order_by('patrimonio', 'asc');

        if (array_key_exists("idequipamento", $params)) {
            $this->db->where('idequipamento', $params['idequipamento']);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $query = $this->db->get();
            $result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }

        //return fetched data
        return $result;
    }

    public function outsourcingtriangulo(){

		// $this->db->select('*');
        $this->db->select(array('tbequipamento.idequipamento', 'tbtpequipamento.idtpequipamento as tpequipamentoid', 'tbtpequipamento.tpequipamento as tipoequipamento', 'tbequipamento.tbtpequipamento_idtpequipamento', 'tbequipamento.host', 'tbequipamento.usuario', 'tbequipamento.ip', 'tbequipamento.patrimonio', 'tbequipamento.modelo', 'tbequipamento.serial', 'tbequipamento.processador', 'tbequipamento.telamonitor', 'tbequipamento.hd', 'tbequipamento.ram', 'tbequipamento.mac', 'tbequipamento.macw', 'tbequipamento.macb', 'tbequipamento.tbfabricante_idfabricante', 'tbequipamento.tbso_idso', 'tbequipamento.tbstatus_idstatus', 'tbequipamento.tblocalizacao_idlocalizacao', 'tbequipamento.tbunidades_idunidade', 'tbequipamento.tbconexao_idconexao', 'tbequipamento.outsourcing', 'tbequipamento.obs', 'tbequipamento.teamviewer', 'tbequipamento.descricaoequipamento', 'tbfabricante.idfabricante as fabricanteid', 'tbfabricante.fabricante as fabricantesesc', 'tbregional.idregional as regionalid', 'tbregional.regional as regionalsesc', 'tbso.idso as soid', 'tbso.so as sosesc', 'tbstatus.idstatus as statusid', 'tbstatus.status as statussesc', 'tblocalizacao.idlocalizacao as localizacaoid', 'tblocalizacao.localizacao as localizacaosesc', 'tbunidades.idunidade as unidadesid', 'tbunidades.unidade as unidadessesc', 'tbconexao.idconexao as conexaoid', 'tbconexao.conexao as conexaosesc'));
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
		$this->db->where('tbequipamento.tbstatus_idstatus = 1');
		$this->db->where('outsourcing = "SIM"');
		$this->db->where('tbequipamento.tbregional_idregional = 4');
		$this->db->having('tbequipamento.tbtpequipamento_idtpequipamento = 9');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 10');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 49');
		$this->db->order_by('tbunidades.unidade', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
        // return $this->db->get()->result();

    }
    
    public function outsourcingbh(){

		// $this->db->select('*');
        $this->db->select(array('tbequipamento.idequipamento', 'tbtpequipamento.idtpequipamento as tpequipamentoid', 'tbtpequipamento.tpequipamento as tipoequipamento', 'tbequipamento.tbtpequipamento_idtpequipamento', 'tbequipamento.host', 'tbequipamento.usuario', 'tbequipamento.ip', 'tbequipamento.patrimonio', 'tbequipamento.modelo', 'tbequipamento.serial', 'tbequipamento.processador', 'tbequipamento.telamonitor', 'tbequipamento.hd', 'tbequipamento.ram', 'tbequipamento.mac', 'tbequipamento.macw', 'tbequipamento.macb', 'tbequipamento.tbfabricante_idfabricante', 'tbequipamento.tbso_idso', 'tbequipamento.tbstatus_idstatus', 'tbequipamento.tblocalizacao_idlocalizacao', 'tbequipamento.tbunidades_idunidade', 'tbequipamento.tbconexao_idconexao', 'tbequipamento.outsourcing', 'tbequipamento.obs', 'tbequipamento.teamviewer', 'tbequipamento.descricaoequipamento', 'tbfabricante.idfabricante as fabricanteid', 'tbfabricante.fabricante as fabricantesesc', 'tbregional.idregional as regionalid', 'tbregional.regional as regionalsesc', 'tbso.idso as soid', 'tbso.so as sosesc', 'tbstatus.idstatus as statusid', 'tbstatus.status as statussesc', 'tblocalizacao.idlocalizacao as localizacaoid', 'tblocalizacao.localizacao as localizacaosesc', 'tbunidades.idunidade as unidadesid', 'tbunidades.unidade as unidadessesc', 'tbconexao.idconexao as conexaoid', 'tbconexao.conexao as conexaosesc'));
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
		$this->db->where('tbequipamento.tbstatus_idstatus = 1');
		$this->db->where('outsourcing = "SIM"');
		$this->db->where('tbequipamento.tbregional_idregional = 8');
		$this->db->having('tbequipamento.tbtpequipamento_idtpequipamento = 9');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 10');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 49');
		$this->db->order_by('tbunidades.unidade', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
        // return $this->db->get()->result();

    }
    
    public function outsourcingnordeste(){

		// $this->db->select('*');
        $this->db->select(array('tbequipamento.idequipamento', 'tbtpequipamento.idtpequipamento as tpequipamentoid', 'tbtpequipamento.tpequipamento as tipoequipamento', 'tbequipamento.tbtpequipamento_idtpequipamento', 'tbequipamento.host', 'tbequipamento.usuario', 'tbequipamento.ip', 'tbequipamento.patrimonio', 'tbequipamento.modelo', 'tbequipamento.serial', 'tbequipamento.processador', 'tbequipamento.telamonitor', 'tbequipamento.hd', 'tbequipamento.ram', 'tbequipamento.mac', 'tbequipamento.macw', 'tbequipamento.macb', 'tbequipamento.tbfabricante_idfabricante', 'tbequipamento.tbso_idso', 'tbequipamento.tbstatus_idstatus', 'tbequipamento.tblocalizacao_idlocalizacao', 'tbequipamento.tbunidades_idunidade', 'tbequipamento.tbconexao_idconexao', 'tbequipamento.outsourcing', 'tbequipamento.obs', 'tbequipamento.teamviewer', 'tbequipamento.descricaoequipamento', 'tbfabricante.idfabricante as fabricanteid', 'tbfabricante.fabricante as fabricantesesc', 'tbregional.idregional as regionalid', 'tbregional.regional as regionalsesc', 'tbso.idso as soid', 'tbso.so as sosesc', 'tbstatus.idstatus as statusid', 'tbstatus.status as statussesc', 'tblocalizacao.idlocalizacao as localizacaoid', 'tblocalizacao.localizacao as localizacaosesc', 'tbunidades.idunidade as unidadesid', 'tbunidades.unidade as unidadessesc', 'tbconexao.idconexao as conexaoid', 'tbconexao.conexao as conexaosesc'));
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
		$this->db->where('tbequipamento.tbstatus_idstatus = 1');
		$this->db->where('outsourcing = "SIM"');
		$this->db->where('tbequipamento.tbregional_idregional = 6');
		$this->db->having('tbequipamento.tbtpequipamento_idtpequipamento = 9');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 10');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 49');
		$this->db->order_by('tbunidades.unidade', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
        // return $this->db->get()->result();

    }
    
    public function outsourcingsudeste(){

		// $this->db->select('*');
        $this->db->select(array('tbequipamento.idequipamento', 'tbtpequipamento.idtpequipamento as tpequipamentoid', 'tbtpequipamento.tpequipamento as tipoequipamento', 'tbequipamento.tbtpequipamento_idtpequipamento', 'tbequipamento.host', 'tbequipamento.usuario', 'tbequipamento.ip', 'tbequipamento.patrimonio', 'tbequipamento.modelo', 'tbequipamento.serial', 'tbequipamento.processador', 'tbequipamento.telamonitor', 'tbequipamento.hd', 'tbequipamento.ram', 'tbequipamento.mac', 'tbequipamento.macw', 'tbequipamento.macb', 'tbequipamento.tbfabricante_idfabricante', 'tbequipamento.tbso_idso', 'tbequipamento.tbstatus_idstatus', 'tbequipamento.tblocalizacao_idlocalizacao', 'tbequipamento.tbunidades_idunidade', 'tbequipamento.tbconexao_idconexao', 'tbequipamento.outsourcing', 'tbequipamento.obs', 'tbequipamento.teamviewer', 'tbequipamento.descricaoequipamento', 'tbfabricante.idfabricante as fabricanteid', 'tbfabricante.fabricante as fabricantesesc', 'tbregional.idregional as regionalid', 'tbregional.regional as regionalsesc', 'tbso.idso as soid', 'tbso.so as sosesc', 'tbstatus.idstatus as statusid', 'tbstatus.status as statussesc', 'tblocalizacao.idlocalizacao as localizacaoid', 'tblocalizacao.localizacao as localizacaosesc', 'tbunidades.idunidade as unidadesid', 'tbunidades.unidade as unidadessesc', 'tbconexao.idconexao as conexaoid', 'tbconexao.conexao as conexaosesc'));
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
		$this->db->where('tbequipamento.tbstatus_idstatus = 1');
		$this->db->where('outsourcing = "SIM"');
		$this->db->where('tbequipamento.tbregional_idregional = 2');
		$this->db->having('tbequipamento.tbtpequipamento_idtpequipamento = 9');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 10');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 49');
		$this->db->order_by('tbunidades.unidade', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
        // return $this->db->get()->result();

    }
    
    public function outsourcingmetropolitana(){

		// $this->db->select('*');
        $this->db->select(array('tbequipamento.idequipamento', 'tbtpequipamento.idtpequipamento as tpequipamentoid', 'tbtpequipamento.tpequipamento as tipoequipamento', 'tbequipamento.tbtpequipamento_idtpequipamento', 'tbequipamento.host', 'tbequipamento.usuario', 'tbequipamento.ip', 'tbequipamento.patrimonio', 'tbequipamento.modelo', 'tbequipamento.serial', 'tbequipamento.processador', 'tbequipamento.telamonitor', 'tbequipamento.hd', 'tbequipamento.ram', 'tbequipamento.mac', 'tbequipamento.macw', 'tbequipamento.macb', 'tbequipamento.tbfabricante_idfabricante', 'tbequipamento.tbso_idso', 'tbequipamento.tbstatus_idstatus', 'tbequipamento.tblocalizacao_idlocalizacao', 'tbequipamento.tbunidades_idunidade', 'tbequipamento.tbconexao_idconexao', 'tbequipamento.outsourcing', 'tbequipamento.obs', 'tbequipamento.teamviewer', 'tbequipamento.descricaoequipamento', 'tbfabricante.idfabricante as fabricanteid', 'tbfabricante.fabricante as fabricantesesc', 'tbregional.idregional as regionalid', 'tbregional.regional as regionalsesc', 'tbso.idso as soid', 'tbso.so as sosesc', 'tbstatus.idstatus as statusid', 'tbstatus.status as statussesc', 'tblocalizacao.idlocalizacao as localizacaoid', 'tblocalizacao.localizacao as localizacaosesc', 'tbunidades.idunidade as unidadesid', 'tbunidades.unidade as unidadessesc', 'tbconexao.idconexao as conexaoid', 'tbconexao.conexao as conexaosesc'));
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
		$this->db->where('tbequipamento.tbstatus_idstatus = 1');
		$this->db->where('outsourcing = "SIM"');
		$this->db->where('tbequipamento.tbregional_idregional = 7');
		$this->db->having('tbequipamento.tbtpequipamento_idtpequipamento = 9');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 10');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 49');
		$this->db->order_by('tbunidades.unidade', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
        // return $this->db->get()->result();

    }
    
    public function outsourcingsede(){

		// $this->db->select('*');
        $this->db->select(array('tbequipamento.idequipamento', 'tbtpequipamento.idtpequipamento as tpequipamentoid', 'tbtpequipamento.tpequipamento as tipoequipamento', 'tbequipamento.tbtpequipamento_idtpequipamento', 'tbequipamento.host', 'tbequipamento.usuario', 'tbequipamento.ip', 'tbequipamento.patrimonio', 'tbequipamento.modelo', 'tbequipamento.serial', 'tbequipamento.processador', 'tbequipamento.telamonitor', 'tbequipamento.hd', 'tbequipamento.ram', 'tbequipamento.mac', 'tbequipamento.macw', 'tbequipamento.macb', 'tbequipamento.tbfabricante_idfabricante', 'tbequipamento.tbso_idso', 'tbequipamento.tbstatus_idstatus', 'tbequipamento.tblocalizacao_idlocalizacao', 'tbequipamento.tbunidades_idunidade', 'tbequipamento.tbconexao_idconexao', 'tbequipamento.outsourcing', 'tbequipamento.obs', 'tbequipamento.teamviewer', 'tbequipamento.descricaoequipamento', 'tbfabricante.idfabricante as fabricanteid', 'tbfabricante.fabricante as fabricantesesc', 'tbregional.idregional as regionalid', 'tbregional.regional as regionalsesc', 'tbso.idso as soid', 'tbso.so as sosesc', 'tbstatus.idstatus as statusid', 'tbstatus.status as statussesc', 'tblocalizacao.idlocalizacao as localizacaoid', 'tblocalizacao.localizacao as localizacaosesc', 'tbunidades.idunidade as unidadesid', 'tbunidades.unidade as unidadessesc', 'tbconexao.idconexao as conexaoid', 'tbconexao.conexao as conexaosesc'));
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
		$this->db->where('tbequipamento.tbstatus_idstatus = 1');
		$this->db->where('outsourcing = "SIM"');
		$this->db->where('tbequipamento.tbregional_idregional = 9');
		$this->db->having('tbequipamento.tbtpequipamento_idtpequipamento = 9');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 10');
		$this->db->or_having('tbequipamento.tbtpequipamento_idtpequipamento = 49');
		$this->db->order_by('tbunidades.unidade', 'ASC');
		$query = $this->db->get();
		return $query->result_array();
        // return $this->db->get()->result();

	}
}
