<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <h3 class="title-5 m-b-35"><?php echo $subtitulo ?></h3>
                    <div class="card">
                        <div class="card-header center">
                            <strong><?php echo $subtitulo ?></strong><br>
                        </div>
                        <div class="card-body">
                            <div id="mensagemUsuario"><?= $this->session->userdata('msg'); ?></div>
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            foreach ($pedidosout as $pedidoout) {
                                echo form_open('outsourcing/salvar_alteracoestoner/' . md5($pedidoout->idtonerout));
                            ?>
                                <span class="role admin">Patrimônio: <?php echo $pedidoout->patrimonio ?></span> &nbsp; <span class="role user">Host: <?php echo $pedidoout->host ?></span> &nbsp; <span class="role member">Pedido: <?php echo $pedidoout->chamadoout ?></span> &nbsp; <button type="button" class="role standby" data-tt="tooltip" title="Detalhes Modelos de Toner" data-toggle="modal" data-target="#mediumModal">
                                    Consulta modelos de toner
                                </button><br>
                                <hr>
                                <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
                                    <li class="nav-item active">
                                        <a class="nav-link" id="solicitacaotoner-tab" data-toggle="tab" href="#solicitacaotoner" role="tab" aria-controls="solicitacaotoner" aria-selected="false"><i class="fas fa-table"></i> Solicitação de Toner</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="entregatoner-tab" data-toggle="tab" href="#entregatoner" role="tab" aria-controls="entregatoner" aria-selected="true"><i class="fas fa-globe"></i> Entrega do Toner</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="detalhestoner-tab" data-toggle="tab" href="#detalhestoner" role="tab" aria-controls="detalhestoner" aria-selected="false"><i class="fas fa-print"></i> Detalhes do Toner - INSTALADO</a>
                                    </li>
                                </ul>
                                <div class="tab-content pl-3 p-1" id="myTabContent">
                                    <div class="tab-pane fade" id="solicitacaotoner" role="tabpanel" aria-labelledby="solicitacaotoner-tab">
                                        <h3 class="mt-2"><i class="fas fa-table"></i> Solicitação de Toner</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-patrimonio">Patrimonio</label>
                                                    <input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" placeholder="Digite o patrimônio" value="<?= $pedidoout->patrimonio ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-serial">Serial</label>
                                                    <input type="text" id="txt-serial" name="txt-serial" class="form-control" value="<?= $pedidoout->serial ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label id="lbl-host">Host</label>
                                                    <input type="text" id="txt-host" name="txt-host" class="form-control" value="<?= $pedidoout->host ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label id="lbl-unidade">Unidade</label>
                                                    <input type="text" id="txt-unidade" name="txt-unidade" class="form-control" value="<?= $pedidoout->unidade ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-localizacao">Localização</label>
                                                    <input type="text" id="txt-localizacao" name="txt-localizacao" class="form-control" value="<?= $pedidoout->localizacao ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-chamadoservicedesk">Chamado Service Desk</label>
                                                    <input type="text" id="txt-chamadoservicedesk" name="txt-chamadoservicedesk" class="form-control" value="<?= $pedidoout->chamadoservicedesk ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-chamadoout">Chamado Outsourcing</label>
                                                    <input type="text" id="txt-chamadoout" name="txt-chamadoout" class="form-control" value="<?= $pedidoout->chamadoout ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-datasolicitacao">Data Solicitação</label>
                                                    <input type="text" id="txt-datasolicitacao" name="txt-datasolicitacao" class="form-control" value="<?= $pedidoout->datachamado ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-quantidaesolicitada">Quantidade TONER PRETO</label>
                                                    <input type="text" id="txt-quantidadesolicitada" name="txt-quantidadesolicitada" class="form-control" value="<?= $pedidoout->quantidadesolicitada ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-contadortotal">Contador Total</label>
                                                    <input type="text" id="txt-contadortotal" name="txt-contadortotal" class="form-control" value="<?= $pedidoout->contadortotal ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-contadorpb">Contador PB</label>
                                                    <input type="text" id="txt-contadorpb" name="txt-contadorpb" class="form-control" value="<?= $pedidoout->contadorpb ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-contadorcolor">Contador Colorido</label>
                                                    <input type="text" id="txt-contadorcolor" name="txt-contadorcolor" class="form-control" value="<?= $pedidoout->contadorcolor ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-quantidadesolicitadaciano">Quantidade TONER CIANO</label>
                                                    <input type="text" id="txt-quantidadesolicitadaciano" name="txt-quantidadesolicitadaciano" class="form-control" value="<?= $pedidoout->quantidadesolicitadaciano ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-quantidadesolicitadamagenta">Quantidade TONER MAGENTA</label>
                                                    <input type="text" id="txt-quantidadesolicitadamagenta" name="txt-quantidadesolicitadamagenta" class="form-control" value="<?= $pedidoout->quantidadesolicitadamagenta ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-quantidadesolicitadaamarelo">Quantidade TONER AMARELO</label>
                                                    <input type="text" id="txt-quantidadesolicitadaamarelo" name="txt-quantidadesolicitadaamarelo" class="form-control" value="<?= $pedidoout->quantidadesolicitadaamarelo ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade show active" id="entregatoner" role="tabpanel" aria-labelledby="entregatoner-tab">
                                        <h3 class="mt-2"><i class="fas fa-globe"></i> Entrega do Toner</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-datadachegada">Data da Chegada</label>
                                                    <input type="text" id="txt-datadachegada" name="txt-datadachegada" class="form-control" value="<?= $pedidoout->datachegadatoner ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-numeronf">Número da NF</label>
                                                    <input type="text" id="txt-numeronf" name="txt-numeronf" class="form-control" value="<?= $pedidoout->numeronf ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-quemrecebeu">Quem Recebeu?</label>
                                                    <input type="text" id="txt-quemrecebeu" name="txt-quemrecebeu" class="form-control" value="<?= $pedidoout->quemrecebeutoner ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-statuschamadotoner">Status do Chamado</label>
                                                    <select id="select-statuschamadotoner" name="select-statuschamadotoner" class="form-control">
                                                        <option value="ABERTO" <?php if ($pedidoout->statuschamadotoner == 'ABERTO') {
                                                                                    echo "selected";
                                                                                } ?>>ABERTO</option>
                                                        <option value="ENTREGUE" <?php if ($pedidoout->statuschamadotoner == 'ENTREGUE') {
                                                                                        echo "selected";
                                                                                    } ?>>ENTREGUE</option>
                                                        <option value="DECLINADO" <?php if ($pedidoout->statuschamadotoner == 'DECLINADO') {
                                                                                        echo "selected";
                                                                                    } ?>>DECLINADO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="detalhestoner" role="tabpanel" aria-labelledby="detalhestoner-tab">
                                        <h3 class="mt-2"><i class="fas fa-print"></i> Detalhes do Toner - INSTALADO</h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-numeroserietoner">Número de Série do Toner PRETO</label>
                                                    <input type="text" id="txt-numeroserietoner" name="txt-numeroserietoner" class="form-control" value="<?= $pedidoout->numserietoner ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-datainstalacao">Data da Instalação PRETO</label>
                                                    <input type="text" id="txt-datainstalacao" name="txt-datainstalacao" class="form-control" value="<?= $pedidoout->datadeinstalacaotoner ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-modelotonerblack">Modelo de toner PRETO</label>
                                                    <input type="text" id="txt-modelotonerblack" name="txt-modelotonerblack" class="form-control" value="<?= $pedidoout->modelotonerblack ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-capacidadetoner">Capacidade do Toner PRETO</label>
                                                    <input type="text" id="txt-capacidadetoner" name="txt-capacidadetoner" class="form-control" value="<?= $pedidoout->capacidadetoner ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-numeroserietonerciano">Número de Série do Toner CIANO</label>
                                                    <input type="text" id="txt-numeroserietonerciano" name="txt-numeroserietonerciano" class="form-control" value="<?= $pedidoout->numserietonerciano ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-datainstalacaociano">Data da Instalação CIANO</label>
                                                    <input type="text" id="txt-datainstalacaociano" name="txt-datainstalacaociano" class="form-control" value="<?= $pedidoout->datadeinstalacaociano ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-modelotonerciano">Modelo de toner CIANO</label>
                                                    <input type="text" id="txt-modelotonerciano" name="txt-modelotonerciano" class="form-control" value="<?= $pedidoout->modelotonerciano ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-capacidadetonerciano">Capacidade do Toner CIANO</label>
                                                    <input type="text" id="txt-capacidadetonerciano" name="txt-capacidadetonerciano" class="form-control" value="<?= $pedidoout->capacidadetonerciano ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-numeroserietonermagenta">Número de Série do Toner MAGENTA</label>
                                                    <input type="text" id="txt-numeroserietonermagenta" name="txt-numeroserietonermagenta" class="form-control" value="<?= $pedidoout->numserietonermagenta ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-datainstalacaomagenta">Data da Instalação MAGENTA</label>
                                                    <input type="text" id="txt-datainstalacaomagenta" name="txt-datainstalacaomagenta" class="form-control" value="<?= $pedidoout->datadeinstalacaomagenta ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-modelotonermagenta">Modelo de toner MAGENTA</label>
                                                    <input type="text" id="txt-modelotonermagenta" name="txt-modelotonermagenta" class="form-control" value="<?= $pedidoout->modelotonermagenta ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-capacidadetonermagenta">Capacidade do Toner MAGENTA</label>
                                                    <input type="text" id="txt-capacidadetonermagenta" name="txt-capacidadetonermagenta" class="form-control" value="<?= $pedidoout->capacidadetonermagenta ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-numeroserietoneramarelo">Número de Série do Toner AMARELO</label>
                                                    <input type="text" id="txt-numeroserietoneramarelo" name="txt-numeroserietoneramarelo" class="form-control" value="<?= $pedidoout->numserietoneramarelo ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-datainstalacaoamarelo">Data da Instalação AMARELO</label>
                                                    <input type="text" id="txt-datainstalacaoamarelo" name="txt-datainstalacaoamarelo" class="form-control" value="<?= $pedidoout->datadeinstalacaoamarelo ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-modelotoneramarelo">Modelo de toner AMARELO</label>
                                                    <input type="text" id="txt-modelotoneramarelo" name="txt-modelotoneramarelo" class="form-control" value="<?= $pedidoout->modelotoneramarelo ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label id="lbl-capacidadetoneramarelo">Capacidade do Toner AMARELO</label>
                                                    <input type="text" id="txt-capacidadetoneramarelo" name="txt-capacidadetoneramarelo" class="form-control" value="<?= $pedidoout->capacidadetoneramarelo ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="txt-patrimonio1" name="txt-patrimonio1" value="<?= $pedidoout->patrimonio ?>">
                                <input type="hidden" name="txt-idtonerout" id="txt-idtonerout" value="<?= $pedidoout->idtonerout ?>">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Atualizar
                                </button>&nbsp
                                <a href="<?php echo base_url('/outsourcing/listagemtoner') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Voltar</a>
                            <?php
                            }
                            echo form_close();
                            ?>
                            <!-- modal medium -->
                            <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header btn-warning">
                                            <h5 class="modal-title" id="mediumModalLabel">Consulta modelos de Toner</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <?php

                                            $this->table->set_heading("Fabricante", "Mod. Imp.", "Cor", "Código", "Cap. Impressão");
                                            foreach ($modalmodelos as $modalmodelo) {
                                                $nomeFabricante = $modalmodelo->fabricante_modtoner;
                                                $nomeModelo     = $modalmodelo->modimpressora_modtoner;
                                                $nomeCor        = $modalmodelo->cortoner_modtoner;
                                                $nomeCodigo     = $modalmodelo->codtoner_modtoner;
                                                $nomeRendimento = $modalmodelo->rendimento_modtoner;

                                                $this->table->add_row($nomeFabricante, $nomeModelo, $nomeCor, $nomeCodigo, $nomeRendimento);
                                            }
                                            $this->table->set_template(array(
                                                'table_open' => '<table id="myTable" class="table table-borderless table-striped table-earning">'
                                            ));
                                            echo $this->table->generate();
                                            ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end modal medium -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>