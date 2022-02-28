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
                        <div class="card-body card-block">
                            <div id="mensagemUsuario"><?= $this->session->userdata('msg'); ?></div>
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            foreach ($pedidosout as $chamadoout) {
                                echo form_open('chamadoout/salvar_alteracoeschamadoout/' . md5($chamadoout->idchamadoout));
                            ?>
                                <span class="role admin">Patrimônio: <?php echo $chamadoout->patrimonio ?></span> &nbsp; <span class="role user">Host: <?php echo $chamadoout->host ?></span> &nbsp; <span class="role member">Chamado: <?php echo $chamadoout->chamadoout ?></span><br>
                                <hr>
                                <h3 class="mt-2"><i class="fas fa-table"></i> Chamados Outsourcing</h3>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-patrimonio">Patrimonio</label>
                                            <input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" placeholder="Digite o patrimônio" value="<?= $chamadoout->patrimonio ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-serial">Serial</label>
                                            <input type="text" id="txt-serial" name="txt-serial" class="form-control" value="<?= $chamadoout->serial ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label id="lbl-host">Host</label>
                                            <input type="text" id="txt-host" name="txt-host" class="form-control" value="<?= $chamadoout->host ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label id="lbl-unidade">Unidade</label>
                                            <input type="text" id="txt-unidade" name="txt-unidade" class="form-control" value="<?= $chamadoout->unidade ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-localizacao">Localização</label>
                                            <input type="text" id="txt-localizacao" name="txt-localizacao" class="form-control" value="<?= $chamadoout->localizacao ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-chamadoservicedesk">Chamado Service Desk</label>
                                            <input type="text" id="txt-chamadoservicedesk" name="txt-chamadoservicedesk" class="form-control" value="<?= $chamadoout->chamadoservicedesk ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-chamadoout">Chamado Outsourcing</label>
                                            <input type="text" id="txt-chamadoout" name="txt-chamadoout" class="form-control" value="<?= $chamadoout->chamadoout ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-datasolicitacao">Data Solicitação</label>
                                            <input type="text" id="txt-datasolicitacao" name="txt-datasolicitacao" class="form-control" value="<?= $chamadoout->datachamado ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-contadortotal">Contador Total</label>
                                            <input type="text" id="txt-contadortotal" name="txt-contadortotal" class="form-control" value="<?= $chamadoout->contadortotal ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-contadorpb">Contador PB</label>
                                            <input type="text" id="txt-contadorpb" name="txt-contadorpb" class="form-control" value="<?= $chamadoout->contadorpb ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-contadorcolor">Contador Colorido</label>
                                            <input type="text" id="txt-contadorcolor" name="txt-contadorcolor" class="form-control" value="<?= $chamadoout->contadorcolor ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label id="lbl-statuschamadoout">Status do Chamado</label>
                                            <select id="select-statuschamadoout" name="select-statuschamadoout" class="form-control">
                                                <option value="ABERTO" <?php if ($chamadoout->statuschamadoout == 'ABERTO') {
                                                                            echo "selected";
                                                                        } ?>>ABERTO</option>
                                                <option value="RESOLVIDO" <?php if ($chamadoout->statuschamadoout == 'RESOLVIDO') {
                                                                                echo "selected";
                                                                            } ?>>RESOLVIDO</option>
                                                <option value="DECLINADO" <?php if ($chamadoout->statuschamadoout == 'DECLINADO') {
                                                                                echo "selected";
                                                                            } ?>>DECLINADO</option>
                                                <option value="PENDENTE" <?php if ($chamadoout->statuschamadoout == 'PENDENTE') {
                                                                                echo "selected";
                                                                            } ?>>PENDENTE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label id="lbl-descricaochamadoout">Descrição do Chamado</label>
                                            <textarea id="txt-descricaochamadoout" name="txt-descricaochamadoout" class="form-control"><?php echo $chamadoout->descricaochamadoout ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label id="lbl-descricaosolucaochamadoout">Solução do Chamado</label>
                                            <textarea id="txt-descricaosolucaochamadoout" name="txt-descricaosolucaochamadoout" class="form-control"><?php echo $chamadoout->descricaosolucaochamadoout ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" id="txt-patrimonio1" name="txt-patrimonio1" value="<?= $chamadoout->patrimonio ?>">
                                <input type="hidden" name="txt-idchamadoout" id="txt-idchamadoout" value="<?= $chamadoout->idchamadoout ?>">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-plus"></i> Atualizar
                                </button>&nbsp
                                <a href="<?php echo base_url('/chamadoout/listagemchamadosout') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Voltar</a>
                            <?php
                            }
                            echo form_close();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>