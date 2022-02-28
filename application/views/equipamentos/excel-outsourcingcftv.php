    <?php
        $this->table->set_heading("Id", "Tipo", "Host", "Usuario", "IP", "Modelo", "Patrimonio", "Mac", "Outsourcing", "Fabricante", "Regional", "Status", "Localização", "Unidade", "Conexão", "OBS");
        foreach ($equipamentos as $equipamento) {
            $idequip = $equipamento->idequipamento;
            $tipoequip = $equipamento->tpequipamento;
            $host = $equipamento->host;
            $usuario = $equipamento->usuario;
            $ip = $equipamento->ip;
            $modelo = $equipamento->modelo;
            $patrimonio = $equipamento->patrimonio;
            $mac = $equipamento->mac;
            $outsourcing = $equipamento->outsourcing;
            $fabricante = $equipamento->fabricantesesc;
            $regional = $equipamento->regionalsesc;
            $status = $equipamento->statussesc;
            $localizacao = $equipamento->localizacaosesc;
            $unidade = $equipamento->unidadessesc;
            $conexao = $equipamento->conexaosesc;
            $observacao = $equipamento->obs;
            $this->table->add_row($idequip, $tipoequip, $host, $usuario, $ip, $modelo, $patrimonio, $mac, $outsourcing, $fabricante, $regional, $status, $localizacao, $unidade, $conexao, $observacao);
        }
        $this->table->set_template(array(
            'table_open' => '<table>'
        ));
    echo $this->table->generate();
    ?>
