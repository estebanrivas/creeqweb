<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Onlineequipamentos_model extends CI_Model {

    
    public function __construct()
    {
        parent::__construct();
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
        $this->column_order = array(null, 'patrimonio', 'serial', 'ip', 'unidadessesc', 'host', 'localizacaosesc');
        // Set searchable column fields
        $this->column_search = array('patrimonio', 'serial', 'ip', 'unidadessesc', 'host', 'localizacaosesc');
        // Set default ordersão 
        $this->order = array('ip' => 'asc');

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

}

/* End of file Onlineequipamentos_model.php */
