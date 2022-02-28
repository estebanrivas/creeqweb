    <?php
        $this->table->set_heading("Id", "Tipo", "Host", "Usuário", "IP", "Patrimôno", "Modelo", "Serial", "Processador", "Tamanho do Monitor", "HD", "RAM", "Mac LAN", "Mac WI-FI", "Mac Bluetooth", "Fabricante", "Regional", "SO", "Status", "Localização", "Unidade", "Conexão", "Outsourcing", "Observação", "Teamviewer");
        foreach ($equipamentos as $equipamento) {
            $idequip = $equipamento->idequipamento;
            $tipoequip = $equipamento->tipoequipamento;
            $host = $equipamento->host;
            $usuario = $equipamento->usuario;
            $ip = $equipamento->ip;
            $patrimonio = $equipamento->patrimonio;
            $modelo = $equipamento->modelo;
            $serial = $equipamento->serial;
            $processador = $equipamento->processador;
            $telamonitor = $equipamento->telamonitor;
            $hd = $equipamento->hd;
            $ram = $equipamento->ram;
            $mac = $equipamento->mac;
            $macw = $equipamento->macw;
            $macb = $equipamento->macb;
            $fabricante = $equipamento->fabricantesesc;
            $regional = $equipamento->regionalsesc;
            $so = $equipamento->sosesc;
            $status = $equipamento->statussesc;
            $localizacao = $equipamento->localizacaosesc;
            $unidade = $equipamento->unidadessesc;
            $conexao = $equipamento->conexaosesc;
            $outsourcing = $equipamento->outsourcing;
            $obs = $equipamento->obs;
            $teamviewer = $equipamento->teamviewer;
            $this->table->add_row($idequip, $tipoequip, $host, $usuario, $ip, $patrimonio, $modelo, $serial, $processador, $telamonitor, $hd, $ram, $mac, $macw, $macb, $fabricante, $regional, $so, $status, $localizacao, $unidade, $conexao, $outsourcing, $obs, $teamviewer);
        }
        $this->table->set_template(array(
            'table_open' => '<table>'
        ));
    echo $this->table->generate();
    ?>
