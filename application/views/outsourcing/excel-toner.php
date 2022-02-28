    <?php
        $this->table->set_heading("ID", "Patrimônio", "Serial", "Host", "Unidade", "Localização", "Servicedesk", "A3 Retrocópia", "Data chamado", "Qtd Toner Preto", "Qtd Toner Ciano", "Qtd Toner Magenta", "Qtd Toner Yellow", "Data Chamado", "Contador Total", "Contador P&b", "Contador Color", "Status", "Data Entrega", "NF", "Quem Recebeu", "NS Toner Black", "DT inst Toner Black", "Cap. Toner Black", "NS Toner Ciano", "DT inst Toner Ciano", "Cap. Toner Ciano", "NS Toner Magenta", "DT inst Toner Magenta", "Cap. Toner Magenta", "NS Toner Yellow", "DT inst Toner Yellow", "Cap. Toner Yellow");
        foreach ($toners as $toner) {
            $id                     = $toner->idtonerout;
            $patrimonio             = $toner->patrimonio;
            $serial                 = $toner->serial;
            $host                   = $toner->host;
            $unidade                = $toner->unidade;
            $localizacao            = $toner->localizacao;
            $servicedesk            = $toner->chamadoservicedesk;
            $retrocopia             = $toner->chamadoout;
            $datachamado            = $toner->datachamado;
            $qtdtonerpreto          = $toner->quantidadesolicitada;
            $qtdtonerciano          = $toner->quantidadesolicitadaciano;
            $qtdtonermagenta        = $toner->quantidadesolicitadamagenta;
            $qtdtoneryellow         = $toner->quantidadesolicitadaamarelo;
            $datachamadocriacao     = date('d/m/Y',strtotime($toner->criacao));
            $contadortotal          = $toner->contadortotal;
            $contadorblack          = $toner->contadorpb;
            $contadorcolor          = $toner->contadorcolor;
            $statuschamado          = $toner->statuschamadotoner;
            $datachegadatoner       = date('d/m/Y', strtotime($toner->datachegadatoner));
            $nf                     = $toner->numeronf;
            $quemrecebeu            = $toner->quemrecebeutoner;
            $numserietonerblack     = $toner->numserietoner;
            $datainsttonerblack     = date('d/m/Y',strtotime($toner->datadeinstalacaotoner));
            $capacidadetonerblack   = $toner->capacidadetoner;
            $numserietonerciano     = $toner->numserietonerciano;
            $datainsttonerciano     = date('d/m/Y', strtotime($toner->datadeinstalacaociano));
            $capacidadetonerciano   = $toner->capacidadetonerciano;
            $numserietonermagenta   = $toner->numserietonermagenta;
            $datainsttonermagenta   = date('d/m/Y', strtotime($toner->datadeinstalacaomagenta));
            $capacidadetonermagenta = $toner->capacidadetonermagenta;
            $numserietoneryellow    = $toner->numserietoneramarelo;
            $datainsttoneryellow    = date('d/m/Y', strtotime($toner->datadeinstalacaoamarelo));
            $capacidadetoneryellow  = $toner->capacidadetoneramarelo; 
            $this->table->add_row($id, $patrimonio, $serial, $host, $unidade, $localizacao, $servicedesk, $retrocopia, $datachamado, $qtdtonerpreto, $qtdtonerciano, $qtdtonermagenta, $qtdtoneryellow, $datachamadocriacao, $contadortotal, $contadorblack, $contadorcolor, $statuschamado, $datachegadatoner, $nf, $quemrecebeu, $numserietonerblack, $datainsttonerblack, $capacidadetonerblack, $numserietonerciano, $datainsttonerciano, $capacidadetonerciano, $numserietonermagenta, $datainsttonermagenta, $capacidadetonermagenta, $numserietoneryellow, $datainsttoneryellow, $capacidadetoneryellow);
        }
        $this->table->set_template(array(
            'table_open' => '<table>'
        ));
    echo $this->table->generate();
    ?>
