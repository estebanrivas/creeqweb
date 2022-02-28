        <div class="page-content--bgf7">
            <section class="p-t-20 m-b-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h3 class="title-5 m-b-35"><?= $subtitulo ?></h3>
                            <div class="row m-b-15">
                                <a href="geral/exportaexcel"><button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Exportação para Excel"><i class="zmdi zmdi-download"></i> Exportação para Excel</button></a>
                            </div>
                            <div class="table-responsive table--no-card m-t-20">
                                <table id="memListTable" class="display table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>ID</th>
                                            <th>Patrimônio</th>
                                            <th>Unidade</th>
                                            <th>Usuário</th>
                                            <th>Tipo</th>
                                            <th>Teamviewer</th>
                                            <th>OPÇÕES</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        </div>
        <?php foreach ($equipamentos as $equipamento) {
            ?>
        <div class="modal fade excluir-modal-<?= $equipamento->idequipamento ?>" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header btn-danger">
                        <h5 class="modal-title" id="mediummodalLabel">Exclusão de Equipamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Deseja Excluir o Equipamento <?= $equipamento->tipoequipamento ?> ?</h4>
                        <p>Após Excluido o Equipamento de patrimônio <b><?= $equipamento->tipoequipamento ?></b>, o mesmo não ficara mais disponível no Sistema.</p>
                        <p>Todos os itens relacionados ao equipamento <b><?= $equipamento->tipoequipamento ?></b>, serão afetados e não aparecerão no sistema até que sejam editados.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <a type="button" class="btn btn-danger" href="<?= base_url("equipamentos/excluir/" . md5($equipamento->idequipamento)) ?>">Excluir</a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
    } ?>
        <div class="modal fade" id="modalDetalhesEquipamento" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header btn-warning">
                        <h5 class="modal-title" id="largeModalLabel">Consulta de detalhes do Equipamento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formDetalhesEquipamento">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-tpequipamento"><strong>Tipo de equipamento</strong></label>
                                        <select id="select-tpequipamento" name="select-tpequipamento" disabled class="form-control" autofocus>
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-teamviewer"><strong>Teamviewer</strong></label>
                                        <input type="text" id="txt-teamviewer" name="txt-teamviewer" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-host"><strong>Host</strong></label>
                                        <input type="text" id="txt-host" name="txt-host" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-usuario"><strong>Usuário</strong></strong></label>
                                        <input type="text" id="txt-usuario" name="txt-usuario" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-ip"><strong>IP</strong></label>
                                        <input type="text" id="txt-ip" name="txt-ip" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-patrimonio"><strong>Patrimônio</strong></label>
                                        <input type="text" id="txt-patrimonio" name="txt-patrimonio" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-modelo"><strong>Modelo</strong></label>
                                        <input type="text" id="txt-modelo" name="txt-modelo" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-serial"><strong>Serial</strong></label>
                                        <input type="text" id="txt-serial" name="txt-serial" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-processador"><strong>Processador</strong></label>
                                        <input type="text" id="txt-processador" name="txt-processador" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-telamonitor"><strong>Tela do Monitor</strong></label>
                                        <input type="text" id="txt-telamonitor" name="txt-telamonitor" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-hd"><strong>HD</strong></label>
                                        <input type="text" id="txt-hd" name="txt-hd" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-ram"><strong>RAM</strong></label>
                                        <input type="text" id="txt-ram" name="txt-ram" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-maclan"><strong>MAC LAN</strong></label>
                                        <input type="text" id="txt-maclan" name="txt-maclan" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-macwifi"><strong>MAC WI-FI</strong></label>
                                        <input type="text" id="txt-macwifi" name="txt-macwifi" disabled class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-macbluetooth"><strong>MAC BLUETOOTH</strong></label>
                                        <input type="text" id="txt-macbluetooth" name="txt-macbluetooth" disabled class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-fabricante"><strong>Fabricante</strong></label>
                                        <select id="select-fabricante" name="select-fabricante" disabled class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-regional"><strong>Regional</strong></label>
                                        <select id="select-regional" name="select-regional" disabled class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-sos"><strong>Sistema Opeacional</strong></label>
                                        <select id="select-sos" name="select-sos" disabled class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-status"><strong>Status</strong></label>
                                        <select id="select-status" name="select-status" disabled class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-localizacao"><strong>Localização</strong></label>
                                        <select id="select-localizacao" name="select-localizacao" disabled class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-unidade"><strong>Unidade</strong></label>
                                        <select id="select-unidade" name="select-unidade" disabled class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-conexao"><strong>Conexão</strong></label>
                                        <select id="select-conexao" name="select-conexao" disabled class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-outsourcing"><strong>Outsourcing</strong></label>
                                        <select id="select-outsourcing" name="select-outsourcing" disabled class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-observacao"><strong>Observação</strong></label>
                                        <textarea id="txt-observacao" name="txt-observacao" disabled class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div> 