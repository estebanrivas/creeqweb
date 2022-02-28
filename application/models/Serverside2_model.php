<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Serverside2_model extends CI_Model {

    public function get_equipamentos($start, $length, $order, $dir)
    {
        if ($order != null) {
            $this->db->order_by($order, $dir);
        }
        return $this->db
            ->limit($length, $start)
            ->get("geral_view");
    }

    public function get_total_equipamentos()
    {
        $query = $this->db->select("COUNT(*) as num")->get("geral_view");
        $result = $query->row();
        if (isset($result)) return $result->num;
        return 0;
    }
    
    
    public function lista_geral1()
    {
        $this->db->select('tbequipamento.idequipamento, tbtpequipamento.idtpequipamento as tpequipamentoid, tbtpequipamento.tpequipamento as tipoequipamento, tbequipamento.tbtpequipamento_idtpequipamento, tbequipamento.host, tbequipamento.usuario, tbequipamento.ip, tbequipamento.patrimonio, tbequipamento.modelo, tbequipamento.serial, tbequipamento.hd, tbequipamento.ram, tbequipamento.mac, tbequipamento.macw, tbequipamento.macb, tbequipamento.tbfabricante_idfabricante, tbequipamento.tbso_idso, tbequipamento.tbstatus_idstatus, tbequipamento.tblocalizacao_idlocalizacao, tbequipamento.tbunidades_idunidade, tbequipamento.tbconexao_idconexao, tbequipamento.outsourcing, tbequipamento.obs, tbequipamento.teamviewer, tbfabricante.idfabricante as fabricanteid, tbfabricante.fabricante as fabricantesesc, tbregional.idregional as regionalid, tbregional.regional as regionalsesc, tbso.idso as soid, tbso.so as sosesc, tbstatus.idstatus as statusid, tbstatus.status as statussesc, tblocalizacao.idlocalizacao as localizacaoid, tblocalizacao.localizacao as localizacaosesc, tbunidades.idunidade as unidadesid, tbunidades.unidade as unidadessesc, tbconexao.idconexao as conexaoid, tbconexao.conexao as conexaosesc');
        $this->db->from('tbequipamento');
        $this->db->join('tbtpequipamento', 'tbtpequipamento.idtpequipamento = tbequipamento.tbtpequipamento_idtpequipamento');
        $this->db->join('tbfabricante', 'tbfabricante.idfabricante = tbequipamento.tbfabricante_idfabricante');
        $this->db->join('tbregional', 'tbregional.idregional = tbequipamento.tbregional_idregional');
        $this->db->join('tbso', 'tbso.idso = tbequipamento.tbso_idso');
        $this->db->join('tbstatus', 'tbstatus.idstatus = tbequipamento.tbstatus_idstatus');
        $this->db->join('tblocalizacao', 'tblocalizacao.idlocalizacao = tbequipamento.tblocalizacao_idlocalizacao');
        $this->db->join('tbunidades', 'tbunidades.idunidade = tbequipamento.tbunidades_idunidade');
        $this->db->join('tbconexao', 'tbconexao.idconexao = tbequipamento.tbconexao_idconexao');
        $this->db->order_by('tbtpequipamento.tpequipamento', 'ASC');
        return $this->db->get()->result();
    }


}

/* End of file Serverside2_model.php */
