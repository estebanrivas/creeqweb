<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="overview-wrap">
                        <h3 class="title-5 m-b-35">Manutenção <?php echo $subtitulo ?></h3>
                        <a href="<?= base_url() ?>chamadoout"><button class="au-btn au-btn-icon au-btn--green" data-toggle="tooltip" data-placement="top" title="Cadastrar Chamados Outsourcing"><i class="fas fa-file-alt"></i> Cadastrar</button></a><a href="<?= base_url() ?>chamadoout/listaChamadooutExcel"><button class="au-btn au-btn-icon au-btn--blue" data-toggle="tooltip" data-placement="top" title="Exportar Excel"><i class="fas fa-file-excel"></i> Excel</button></a>
                    </div>
                    <div class="table-responsive table--no-card">
                        <?php
                        $this->table->set_heading("Patrimonio", "Host", "Localização", "Serial", "OS", "Data OS", "Status", "Opções");
                        foreach ($chamadosout as $chamadoout) {
                            $nomepatrimonio     = $chamadoout->patrimonio;
                            $nomeserial         = $chamadoout->serial;
                            $nomehost           = $chamadoout->host;
                            $nomelocalizacao    = $chamadoout->localizacao;
                            // $datapedido         = date('d/m/Y', strtotime($chamadoout->datachamado));
                            $datapedido         = $chamadoout->datachamado;
                            $nomepedido         = $chamadoout->chamadoout;
                            $statuschamadoout   = $chamadoout->statuschamadoout;

                            if ($chamadoout->statuschamadoout == 'ABERTO') {
                                $statuschamadoout = '<span class="role user">ABERTO</span>';
                            } elseif ($chamadoout->statuschamadoout == 'RESOLVIDO') {
                                $statuschamadoout = '<span class="role member">RESOLVIDO</span>';
                            } elseif ($chamadoout->statuschamadoout == 'DECLINADO') {
                                $statuschamadoout = '<span class="role admin">DECLINADO</span>';
                            } elseif ($chamadoout->statuschamadoout == 'PENDENTE') {
                                $statuschamadoout = '<span class="role standby">PENDENTE</span>';
                            }

                            $alterar = anchor(base_url('chamadoout/alterar_chamadoout/' . md5($chamadoout->idchamadoout)), '<button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button>');
                            $excluir = '<button type="button" class="btn btn-danger btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".excluir-modal-' . $chamadoout->idchamadoout . '" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>';
                            $detalhes = '<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $chamadoout->idchamadoout . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>';
                            echo $modal = ' <div class="modal fade detalhes-modal-' . $chamadoout->idchamadoout . '" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header btn-warning">
                                            <h5 class="modal-title" id="mediummodalLabel">Detalhes do pedido de toner</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-patrimonio">Patrimônio</label>
                                                        <input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" readonly value="' . $chamadoout->patrimonio . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-serial">Serial</label>
                                                        <input type="text" id="txt-serial" name="txt-serial" class="form-control" readonly value="' . $chamadoout->serial . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-host">Host</label>
                                                        <input type="text" id="txt-host" name="txt-host" class="form-control" readonly value="' . $chamadoout->host . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-unidade">Unidade</label>
                                                        <input type="text" id="txt-unidade" name="txt-unidade" readonly class="form-control" value="' . $chamadoout->unidade . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-localizacao">Localização</label>
                                                        <input type="text" id="txt-localizacao" name="txt-localizacao" readonly class="form-control" value="' . $chamadoout->localizacao . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-chamadoservicedesk">Chamado Service Desk</label>
                                                        <input type="text" id="txt-chamadoservicedesk" name="txt-chamadoservicedesk" readonly class="form-control" value="' . $chamadoout->chamadoservicedesk . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-chamadoout">Chamado Outsourcing</label>
                                                        <input type="text" id="txt-chamadoout" name="txt-chamadoout" readonly class="form-control" value="' . $chamadoout->chamadoout . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-datasolicitacao">Data Solicitação</label>
                                                        <input type="text" id="txt-datasolicitacao" name="txt-datasolicitacao" readonly class="form-control" value="' . date('d/m/Y', strtotime($chamadoout->datachamado)) . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-contadortotal">Contador Total</label>
                                                        <input type="text" id="txt-contadortotal" name="txt-contadortotal" readonly class="form-control" value="' . $chamadoout->contadortotal . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-contadorpb">Contador PB</label>
                                                        <input type="text" id="txt-contadorpb" name="txt-contadorpb" readonly class="form-control" value="' . $chamadoout->contadorpb . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-contadorcolor">Contador Colorido</label>
                                                        <input type="text" id="txt-contadorcolor" name="txt-contadorcolor" readonly class="form-control" value="' . $chamadoout->contadorcolor . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-statuschamadoout">Status do Chamado</label>
                                                        <input type="text" id="txt-statuschamadoout" name="txt-statuschamadoout" readonly class="form-control" value="' . $chamadoout->statuschamadoout . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label id="lbl-descricaochamadoout">Descrição do Chamado</label>
                                                        <textarea id="txt-descricaochamadoout" name="txt-descricaochamadoout" disabled class="form-control">' . $chamadoout->descricaochamadoout . '</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label id="lbl-descricaosolucaochamadoout">Solução do Chamado</label>
                                                        <textarea id="txt-descricaosolucaochamadoout" name="txt-descricaosolucaochamadoout" disabled class="form-control">' . $chamadoout->descricaosolucaochamadoout . '</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            echo $modal = '<div class="modal fade excluir-modal-' . $chamadoout->idchamadoout . '" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header btn-danger">
                                        <h5 class="modal-title" id="mediummodalLabel">Exclusão de Pedido de toner</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Deseja Excluir o CHAMADO OUTSOURCING do ' . $chamadoout->host . '?</h4>
                                        <p>Após Excluido o CHAMADO OUTSOURCING do <b>' . $chamadoout->host . '</b> não ficara mais disponível no Sistema.</p>
                                        <p>Todos os itens relacionados ao pedido de toner do serial <b>' . $chamadoout->serial . '</b> serão afetados e não aparecerão no sistema até que sejam editados.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a type="button" class="btn btn-danger" href="' . base_url("chamadoout/excluir_chamadoout/" . md5($chamadoout->idchamadoout)) . '">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                            $this->table->add_row($nomepatrimonio, $nomehost, $nomelocalizacao, $nomeserial, $nomepedido, $datapedido, $statuschamadoout, $alterar . '&nbsp&nbsp' . $excluir . '&nbsp&nbsp' . $detalhes);
                        }
                        $this->table->set_template(array(
                            'table_open' => '<table id="myTable" class="table table-borderless table-striped table-earning">'
                        ));
                        echo $this->table->generate();
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
