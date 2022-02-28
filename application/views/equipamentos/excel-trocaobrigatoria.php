    <?php
        $this->table->set_heading("Id", "Patrimôno", "Serial", ",Marca", "Modelo", "HD", "Memória", "Processador", "Unidade", "Observação");
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
            $this->table->add_row($idequip, $patrimonio, $serial, $fabricante, $modelo, $hd, $ram, $processador, $unidade, $obs);
        }
        $this->table->set_template(array(
            'table_open' => '<table>'
        ));
    echo $this->table->generate();
    ?>
