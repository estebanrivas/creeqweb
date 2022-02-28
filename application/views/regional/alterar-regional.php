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
                                    foreach ($regionais as $regional) {
										echo form_open('regional/salvar_alteracoes/'.md5($regional->idregional));
                                        ?>
                                    <div class="form-group">
                                        <label>Regional</label>
                                        <input type="text" id="txt-regional" name="txt-regional" autofocus placeholder="Digite a regional..." class="form-control" value="<?php echo $regional->regional ?>">
                                    </div>
                                        <input type="hidden" name="txt-idregional" id="txt-idregional" value="<?php echo $regional->idregional ?>">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i> Atualizar
                                        </button>
                                        <a href="<?php echo base_url('/regional') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Cancelar</a>
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
