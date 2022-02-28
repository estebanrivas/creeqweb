<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <h3 class="title-5 m-b-35"><?php echo 'Cadastro de ' . $subtitulo ?></h3>
                    <div class="card">
                        <div class="card-header">
                            <strong><?php echo 'Cadastro de ' . $subtitulo ?></strong>
                        </div>
                        <div class="card-body card-block">
                            <div id="mensagemUsuario"><?= $this->session->userdata('msg'); ?></div>
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            foreach ($cadeados as $cadeado) {
                                echo form_open('cadeados/salvar_alteracoes/' . md5($cadeado->idcadeados));
                                ?>
                            <div class="form-group">
                                <label id="lbl-codigo">Código do Cadeado</label>
                                <input type="text" id="txt-codigo" name="txt-codigo" value="<?= $cadeado->codigo ?>" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <label id="lbl-patrimonio">Patrimônio</label>
                                <select name="txt-patrimonio" onChange="patrimonios();" id="txt-patrimonio" class="form-control">
                                    <option value="<?= $cadeado->patrimonio ?>"><?= $cadeado->patrimonio ?></option>
                                    <?php foreach ($patrimoniosSesc as $patrimonioSesc) { ?>
                                    <option value="<?= $patrimonioSesc->patrimonio; ?>|<?= $patrimonioSesc->patrimonio; ?>|<?= $patrimonioSesc->unidadessesc; ?>|<?= $patrimonioSesc->localizacaosesc; ?>|<?= $patrimonioSesc->usuario; ?>"><?= $patrimonioSesc->patrimonio; ?></option>
                                    <?php 
                                } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label id="lbl-unidade">Unidade</label>
                                <input type="text" id="txt-unidade" name="txt-unidade" readonly class="form-control" value="<?= $cadeado->unidade ?>">
                            </div>
                            <div class="form-group">
                                <label id="lbl-localizacao">Localização</label>
                                <input type="text" id="txt-localizacao" name="txt-localizacao" readonly class="form-control" value="<?= $cadeado->localizacao ?>">
                            </div>
                            <div class="form-group">
                                <label id="lbl-usuario">Usuário</label>
                                <input type="text" id="txt-usuario" name="txt-usuario" readonly class="form-control" value="<?= $cadeado->usuario ?>">
                            </div>
                            <input type="hidden" id="txt-patrimonio1" name="txt-patrimonio1" class="form-control" value="<?= $cadeado->patrimonio ?>">
                            <input type="hidden" name="txt-idcadeados" id="txt-idcadeados" value="<?= $cadeado->idcadeados ?>">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Atualizar
                            </button>&nbsp
                            <a href="<?php echo base_url() ?>cadeados" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Voltar</a>
                            <?php

                        }
                        echo form_close();
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 