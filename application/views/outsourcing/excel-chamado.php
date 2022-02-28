    <?php
        $this->table->set_heading("ID", "Patrimônio", "Serial", "Host", "Unidade", "Localização", "Servicedesk", "A3 Retrocópia", "Data chamado", "Data Chamado", "Contador Total", "Contador P&b", "Contador Color", "Status", "Descrição");
        foreach ($chamadosout as $chamadoout) {
            $id                     = $chamadoout->idchamadoout;
            $patrimonio             = $chamadoout->patrimonio;
            $serial                 = $chamadoout->serial;
            $host                   = $chamadoout->host;
            $unidade                = $chamadoout->unidade;
            $localizacao            = $chamadoout->localizacao;
            $servicedesk            = $chamadoout->chamadoservicedesk;
            $retrocopia             = $chamadoout->chamadoout;
            $datachamado            = $chamadoout->datachamado;
            $datachamadocriacao     = date('d/m/Y',strtotime($chamadoout->criacao));
            $contadortotal          = $chamadoout->contadortotal;
            $contadorblack          = $chamadoout->contadorpb;
            $contadorcolor          = $chamadoout->contadorcolor;
            $statuschamado          = $chamadoout->statuschamadoout;
            $descricaochamado       = $chamadoout->descricaochamadoout;
            $this->table->add_row($id, $patrimonio, $serial, $host, $unidade, $localizacao, $servicedesk, $retrocopia, $datachamado, $datachamadocriacao, $contadortotal, $contadorblack, $contadorcolor, $statuschamado, $descricaochamado);
        }
        $this->table->set_template(array(
            'table_open' => '<table>'
        ));
    echo $this->table->generate();
    ?>
