    <?php
        $this->table->set_heading("Id", "Tipo", "Modelo", "Serial", "Host", "IP", "Mac LAN", "Regional", "Unidade", "Conexão", "Localização", "Status", "Fabricante", "OBS");
        foreach ($equipamentos as $equipamento) {
            $idequip = $equipamento->idequipamento;
            $tipoequip = $equipamento->tipoequipamento;
            $host = $equipamento->host;
            $ip = $equipamento->ip;
            $modelo = $equipamento->modelo;
            $serial = $equipamento->serial;
            $mac = $equipamento->mac;
            $fabricante = $equipamento->fabricantesesc;
            $regional = $equipamento->regionalsesc;
            $status = $equipamento->statussesc;
            $localizacao = $equipamento->localizacaosesc;
            $unidade = $equipamento->unidadessesc;
            $conexao = $equipamento->conexaosesc;
            $observacao = $equipamento->obs;
            $this->table->add_row($idequip, $tipoequip, $modelo, $serial, $host, $ip, $mac, $regional, $unidade, $conexao, $localizacao, $status, $fabricante, $observacao);
        }
        $this->table->set_template(array(
            'table_open' => '<table>'
        ));
    echo $this->table->generate();
    ?>
