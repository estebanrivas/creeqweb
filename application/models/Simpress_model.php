<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Simpress_model extends CI_Model {
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


    public function __construct()
    {
        // Set table name
        $this->table = 'outsourcingfim_view';
        $this->table1 = 'outsourcingfimsudeste_view';
        $this->table2 = 'outsourcingfimnordeste_view';
        $this->table3 = 'outsourcingfimbh_view';
        $this->table4 = 'outsourcingfimmetropolitana_view';
        // Set orderable column fields
        $this->column_order = array(null, 'patrimonio', 'serial', 'ip', 'unidadessesc', 'host', 'localizacaosesc');
        // Set searchable column fields
        $this->column_search = array('patrimonio', 'serial', 'ip', 'unidadessesc', 'host', 'localizacaosesc');
        // Set default order
        $this->order = array('ip' => 'asc');
        $this->dbTbl = 'outsourcingfim_view';
        $this->dbTbl1 = 'outsourcingfimsudeste_view';
        $this->dbTbl2 = 'outsourcingfimnordeste_view';
        $this->dbTbl3 = 'outsourcingfimbh_view';
        $this->dbTbl4 = 'outsourcingfimmetropolitana_view';
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

    public function getRowsbh($postData)
    {
        $this->_get_datatables_querybh($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRowsnordeste($postData)
    {
        $this->_get_datatables_querynordeste($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRowssudeste($postData)
    {
        $this->_get_datatables_querysudeste($postData);
        if ($postData['length'] != -1) {
            $this->db->limit($postData['length'], $postData['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getRowsmetropolitana($postData)
    {
        $this->_get_datatables_querymetropolitana($postData);
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

    public function countAllbh()
    {
        $this->db->from($this->table3);
        return $this->db->count_all_results();
    }

    public function countAllnordeste()
    {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }

    public function countAllsudeste()
    {
        $this->db->from($this->table1);
        return $this->db->count_all_results();
    }

    public function countAllmetropolitana()
    {
        $this->db->from($this->table4);
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

    public function countFilteredbh($postData)
    {
        $this->_get_datatables_querybh($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFilterednordeste($postData)
    {
        $this->_get_datatables_querynordeste($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFilteredsudeste($postData)
    {
        $this->_get_datatables_querysudeste($postData);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function countFilteredmetropolitana($postData)
    {
        $this->_get_datatables_querymetropolitana($postData);
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

    private function _get_datatables_querybh($postData)
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

    private function _get_datatables_querynordeste($postData)
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

    private function _get_datatables_querysudeste($postData)
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

    private function _get_datatables_querymetropolitana($postData)
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
        $this->db->where('tbstatus_idstatus = "14"');
        $this->db->order_by('tbunidades.unidade', 'ASC');
        return $this->db->get()->result();
    }
}
