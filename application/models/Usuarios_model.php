<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public $idusuario;
    public $nome;
    public $login;
    public $email;
    public $senha;
    public $nivel;
    public $img;
    public $ativo;
    public $idregionais;



	public function __construct(){
		parent::__construct();
	}

    //Listar usuários por ordem de nome ascendente
    public function listar_usuarios(){
		$this->db->order_by('nome','ASC');
		return $this->db->get('tbusuarios')->result();
	}

    //função para lstar usuários com id específico
    public function listar_usuario($idusuario)
    {
        $this->db->select('idusuario,nome,login,email,nivel,img,ativo,idregional');
        $this->db->from('tbusuarios');
        $this->db->where('md5(idusuario)', $idusuario);
        return $this->db->get()->result();
	}
    
    //função para adicionar usuário
    public function adicionar($nome, $login, $email, $senha, $nivel, $ativo, $idregionais)
    {
        $dados['nome'] = $nome;
        $dados['login'] = $login;
        $dados['email'] = $email;
        $dados['senha'] = md5($senha);
        $dados['nivel'] = $nivel;
        $dados['ativo'] = $ativo;
        $dados['idregional'] = $idregionais;
        return $this->db->insert('tbusuarios', $dados);
    }

    //Função para exluir usuário
    public function excluir($idusuario)
    {
        $this->db->where('md5(idusuario)', $idusuario);
        return $this->db->delete('tbusuarios');
    }

    //função para alterar usuário
    public function alterar($nome, $login, $email, $senha, $nivel, $idregionais, $ativo, $idusuario)
    {
        $dados['nome'] = $nome;
        $dados['login'] = $login;
        $dados['email'] = $email;
        $dados['nivel'] = $nivel;
        $dados['ativo'] = $ativo;
        $dados['idregional'] = $idregionais;
        // Verifica se o campo senha foi digitado
        if ($senha != "") {
            $dados['senha'] = md5($senha);
        }
        $this->db->where('idusuario', $idusuario);
        return $this->db->update('tbusuarios', $dados);
    }

    //função para alterar a imagem do usuário
    public function alterar_img($idusuario)
    {
        $dados['img'] = 1;
        $this->db->where('md5(idusuario)', $idusuario);
        return $this->db->update('tbusuarios', $dados);
    }

    public function alterar_ativo($idusuario)
    {
        $dados['ativo'] = 1;
        $this->db->where('md5(idusuario)', $idusuario);
        return $this->db->update('tbusuarios', $dados);
    }

    public function alterar_inativo($idusuario)
    {
        $dados['ativo'] = 0;
        $this->db->where('md5(idusuario)', $idusuario);
        return $this->db->update('tbusuarios', $dados);
    }


	public function contar()
    {
        return $this->db->count_all('tbusuarios');
    }

    public function contar1($idusuario)
    {
        $this->db->where('tbusuarios ='.$idusuario);
        return $this->db->count_all_results('tbusuarios');
    }

      //função para pegar um usuário pela sua ID
    public function getUsuarioId($idusuario=null)
    {
        if ($idusuario) {
            $this->db->where('idusuario', $idusuario);
            $this->db->limit(1);
            return $this->db->get('tbusuarios')->row();
        }
    }

    public function telalogin($usuario=null, $senha=null)
    {
        if ($usuario && $senha) {
            $this->db->where(['login' => $usuario, 'senha' => $senha]);
            $this->db->limit(1);
            $query = $this->db->get('tbusuarios');

            if ($query->num_rows() == 1) {
                return $query->row();
            } else {
                $this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert"><span class="badge badge-pill badge-danger">LOGIN</span> não existem no sistema.</div>');
                return false;
            }
        } else {
            $this->session->set_flashdata('erro_login', '<div class="alert alert-danger" role="alert">Erro ao logar no sistema</div>');
            return false;
        }
    }
}
