        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">

            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <h3 class="title-5 m-b-35">Alterar <?php echo $subtitulo ?></h3>
                            <div class="card">
                                <div class="card-header">
                                    <strong>Alterar <?php echo $subtitulo ?></strong>
                                </div>
                                <div class="card-body card-block">
                                    <?php
                                    echo validation_errors('<div class="alert alert-danger">', '</div>');
                                    foreach ($tpequipamentos as $tpequipamento) {
										echo form_open('tpequipamento/salvar_alteracoes/'.md5($tpequipamento->idtpequipamento));
                                        ?>
                                    <div class="form-group">
                                        <label>Tipo de Equipamento</label>
                                        <input type="text" id="txt-tpequipamento" name="txt-tpequipamento" autofocus placeholder="Digite a tpequipamento..." class="form-control" value="<?php echo $tpequipamento->tpequipamento ?>">
                                    </div>
                                        <input type="hidden" name="txt-idtpequipamento" id="txt-idtpequipamento" value="<?php echo $tpequipamento->idtpequipamento ?>">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i> Atualizar
                                        </button>
                                        <a href="<?php echo base_url('/tpequipamento') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Cancelar</a>
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
