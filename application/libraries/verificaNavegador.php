<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    /**
     * Verifica informações do navegador utilizado
     *
     * @return object informações sobre o navegador
     */
    protected function verificaNavegador()
    {
        $navegadores = $this->config->item('navegadores');

        $navegador = $this->agent->browser();
        $versao = $this->agent->version();

        //resolvendo problema temporário do Chrome no Android 8
        if ($this->agent->is_mobile('android') && $this->agent->is_browser('Opera')) {
            $re = '/Chrome\/\d{1,2}/';
            preg_match($re, $this->agent->agent_string(), $matches);

            if (!empty($matches)) {
               $versao =  preg_replace('/\D/', '', $matches[0]);
               $navegador = preg_replace('/[^a-z]/i', '', $matches[0]);
            }
        }

        $suportado = array_key_exists($navegador, $navegadores);

        $versaoMinima = $suportado ? $navegadores[$navegador] : false;
        $versaoSuportada = $suportado ? intval($versao) >= $versaoMinima: false;

        $info = new stdClass();
        $info->browser = $navegador;
        $info->versao = $versao;
        $info->suportado = $suportado;
        $info->versao_minina = $versaoMinima;
        $info->versao_suportada =  $versaoSuportada;
        $info->mobile = $this->agent->is_mobile();
        $info->platform = $this->agent->platform();
        $info->robo = $this->agent->is_robot();
        $info->agent_string = $this->agent->agent_string();


        if ($suportado) {
            
            if ($versaoSuportada) {
                return $info;
            } else {
                
                $msg = "A versão do seu browser não é suportada! Favor utilizar o <b> {$navegador} {$versaoMinima} ou superior</b>.";
            }            
        } else {
            $lista = $this->listaNavegadores();
            $msg = "Este browser não é suportado! Favor utilizar estes browsers: {$lista}";
        }

        $this->session->set_userdata("msg_erro", $msg);
        return $info;
    }

    protected function listaNavegadores() {
        $navegadores = $this->config->item('navegadores');
        $this->load->helper('texto');
        $lista = (implode(', ', array_keys($navegadores)));
        $lista = str_replace('Spartan', 'Edge', $lista);
        $lista = str_lreplace(',', ' ou', $lista);
        return $lista;
    }

}

