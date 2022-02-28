<!-- PAGE CONTENT-->
<div class="page-content--bgf7">


    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <h3 class="title-5 m-b-35">
                        <?php echo 'Cadastro de ' . $subtitulo ?>
                    </h3>
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <?php echo 'Cadastro de ' . $subtitulo ?> - * (campos obrigatórios)</h4>
                        </div>
                        <div class="card-body">
                            <div id="mensagemUsuario">
                                <?= $this->session->userdata('msg'); ?>
                            </div>
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('equipamentos/inserir');
                            ?>
                            <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link active" id="dadosgerais-tab" data-toggle="tab" href="#dadosgerais" role="tab" aria-controls="dadosgerais" aria-selected="true"><i class="fas fa-table"></i> Dados Gerais</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="dadosregioanis-tab" data-toggle="tab" href="#dadosregioanis" role="tab" aria-controls="dadosregioanis" aria-selected="false"><i class="fas fa-globe"></i> Dados Regionais</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="desktopnotebook-tab" data-toggle="tab" href="#desktopnotebook" role="tab" aria-controls="desktopnotebook" aria-selected="false"><i class="fas fa-laptop"></i>&nbsp;<i class="fas fa-print"></i> Desktop / Notebook / Impressora</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="monitortelas-tab" data-toggle="tab" href="#monitortelas" role="tab" aria-controls="monitortelas" aria-selected="false"><i class="fas fa-desktop"></i> Monitor / Tela Notebook</a>
                                </li>
                            </ul>
                            <div class="tab-content pl-3 p-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="dadosgerais" role="tabpanel" aria-labelledby="dadosgerais-tab">
                                    <h3 class="mt-2"><i class="fas fa-table"></i> Dados Gerais</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-tpequipamento"><strong>Tipo de equipamento</strong></label>
                                                <select id="select-tpequipamento" name="select-tpequipamento" class="form-control" autofocus>
                                                    <?php foreach ($tpequipamentos as $tpequipamento) { ?>
                                                    <option value="<?php echo $tpequipamento->idtpequipamento ?>">
                                                        <?php echo $tpequipamento->tpequipamento ?>
                                                    </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-outsourcing"><strong>Outsourcing</strong></label>
                                                <select id="select-outsourcing" name="select-outsourcing" class="form-control">
                                                    <option value="NÃO">NÃO</option>
                                                    <option value="SIM">SIM</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label id="lbl-descricaoequipamento"><strong>Descrição do equipamento</strong></label>
                                                <input type="text" id="txt-descricaoequipamento" name="txt-descricaoequipamento" placeholder="Descreva o equipamento..." class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-patrimonio"><strong>Patrimônio</strong></label>
                                                <input type="text" id="txt-patrimonio" name="txt-patrimonio" placeholder="Digite o patrimônio..." class="form-control" value="<?php echo set_value('txt-patrimonio') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-usuario"><strong>Usuário</strong> *</label>
                                                <input type="text" id="txt-usuario" name="txt-usuario" placeholder="Digite o usuário..." class="form-control" value="<?php echo set_value('txt-usuario') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-host"><strong>Host</strong> *</label>
                                                <input type="text" id="txt-host" name="txt-host" placeholder="Digite SESC-XXXXXX" class="form-control" value="<?php echo set_value('txt-host') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-fabricante"><strong>Fabricante</strong></label>
                                                <select id="select-fabricante" name="select-fabricante" class="form-control">
                                                    <?php foreach ($fabricantes as $fabricante) { ?>
                                                    <option value="<?php echo $fabricante->idfabricante ?>">
                                                        <?php echo $fabricante->fabricante ?>
                                                    </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-status"><strong>Status</strong></label>
                                                <select id="select-status" name="select-status" class="form-control">
                                                    <?php foreach ($status as $statu) { ?>
                                                    <option value="<?php echo $statu->idstatus ?>">
                                                        <?php echo $statu->status ?>
                                                    </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-sos"><strong>Sistema Opeacional</strong></label>
                                                <select id="select-sos" name="select-sos" class="form-control">
                                                    <?php foreach ($sos as $so) { ?>
                                                    <option value="<?php echo $so->idso ?>">
                                                        <?php echo $so->so ?>
                                                    </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-modelo"><strong>Modelo</strong></label>
                                                <input type="text" id="txt-modelo" name="txt-modelo" placeholder="Digite o modelo..." class="form-control" value="<?php echo set_value('txt-modelo') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-serial"><strong>Serial</strong></label>
                                                <input type="text" id="txt-serial" name="txt-serial" placeholder="Digite o serial..." class="form-control" value="<?php echo set_value('txt-serial') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-conexao"><strong>Conexão</strong></label>
                                                <select id="select-conexao" name="select-conexao" class="form-control">
                                                    <?php foreach ($conexoes as $conexao) { ?>
                                                    <option value="<?php echo $conexao->idconexao ?>">
                                                        <?php echo $conexao->conexao ?>
                                                    </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group">
                                                <label id="lbl-observacao"><strong>Observação</strong></label>
                                                <textarea id="txt-observacao" name="txt-observacao" class="form-control"><?php echo set_value('txt-observacao') ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="dadosregioanis" role="tabpanel" aria-labelledby="dadosregioanis-tab">
                                    <h3 class="mt-2"><i class="fas fa-globe"></i> Dados Regionais</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-regional"><strong>Regional</strong></label>
                                                <select id="select-regional" name="select-regional" class="form-control">
                                                    <?php foreach ($regionais as $regional) { ?>
                                                    <option value="<?php echo $regional->idregional ?>">
                                                        <?php echo $regional->regional ?>
                                                    </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-unidade"><strong>Unidade</strong></label>
                                                <select id="select-unidade" name="select-unidade" class="form-control">
                                                    <?php foreach ($unidades as $unidade) { ?>
                                                    <option value="<?php echo $unidade->idunidade ?>">
                                                        <?php echo $unidade->unidade ?>
                                                    </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-localizacao"><strong>Localização</strong></label>
                                                <select id="select-localizacao" name="select-localizacao" class="form-control">
                                                    <?php foreach ($localizacoes as $localizacao) { ?>
                                                    <option value="<?php echo $localizacao->idlocalizacao ?>">
                                                        <?php echo $localizacao->localizacao ?>
                                                    </option>
                                                    <?php
                                                    } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="desktopnotebook" role="tabpanel" aria-labelledby="desktopnotebook-tab">
                                    <h3 class="mt-2"><i class="fas fa-laptop">&nbsp;<i class="fas fa-print"></i></i> Desktop / Notebook / Impressora</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-ip"><strong>IP</strong></label>
                                                <input type="text" id="txt-ip" name="txt-ip" placeholder="Digite o ip. Ex: 10.xxx.xxx.xxx" class="form-control" value="<?php echo set_value('txt-ip') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-teamviewer"><strong>Teamviewer</strong></label>
                                                <input type="text" id="txt-teamviewer" name="txt-teamviewer" placeholder="Digite o ID do Teamviewer..." class="form-control" value="<?php echo set_value('txt-teamviewer') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-processador"><strong>Processador</strong></label>
                                                <input type="text" id="txt-processador" name="txt-processador" placeholder="Digite o processador..." class="form-control" value="<?php echo set_value('txt-processador') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-hd"><strong>HD</strong></label>
                                                <input type="text" id="txt-hd" name="txt-hd" placeholder="Digite a conexão..." class="form-control" value="<?php echo set_value('txt-hd') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-ram"><strong>RAM</strong></label>
                                                <input type="text" id="txt-ram" name="txt-ram" placeholder="Digite a ram..." class="form-control" value="<?php echo set_value('txt-ram') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-maclan"><strong>MAC LAN</strong></label>
                                                <input type="text" id="txt-maclan" name="txt-maclan" placeholder="Digite O MAC..." class="form-control" value="<?php echo set_value('txt-maclan') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-macwifi"><strong>MAC WI-FI</strong></label>
                                                <input type="text" id="txt-macwifi" name="txt-macwifi" placeholder="Digite O MAC..." class="form-control" value="<?php echo set_value('txt-macwifi') ?>">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-macbluetooth"><strong>MAC BLUETOOTH</strong></label>
                                                <input type="text" id="txt-macbluetooth" name="txt-macbluetooth" placeholder="Digite O MAC..." class="form-control" value="<?php echo set_value('txt-macbluetooth') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="monitortelas" role="tabpanel" aria-labelledby="monitortelas-tab">
                                    <h3 class="mt-2"><i class="fas fa-desktop"></i> Monitor / Tela Notebook</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label id="lbl-telamonitor"><strong>Tela do Monitor</strong></label>
                                                <input type="text" id="txt-telamonitor" name="txt-telamonitor" placeholder="Digite a tela do monitor..." class="form-control" value="<?php echo set_value('txt-telamonitor') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary btn-sm" align="center">
                                    <i class="fa fa-plus"></i> Cadastrar
                                </button>&nbsp
                                <a href="<?php echo base_url() ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Voltar</a>
                                <?php
                                echo form_close();
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>