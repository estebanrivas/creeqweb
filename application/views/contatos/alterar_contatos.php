        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">


            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <h3 class="title-5 m-b-35"><?php echo 'Alteração de ' . $subtitulo ?></h3>
                            <div class="card">
                                <div class="card-header">
                                    <strong><?php echo 'Alteração de ' . $subtitulo ?></strong>
                                </div>
                                <div class="card-body card-block">
                                    <div id="mensagemUsuario"><?= $this->session->userdata('msg'); ?></div>
                                    <?php
                                    echo validation_errors('<div class="alert alert-danger">', '</div>');
                                    foreach ($contatos as $contato) {
                                        echo form_open('contatos/alterarContato/' . md5($contato->idcontatos)); ?>
                                        <div class="form-group">
                                            <label id="lbl-nome">Nome do Contato</label>
                                            <input type="text" id="txt-nome" name="txt-nome" placeholder="Digite o Nome..." class="form-control" autofocus value="<?= $contato->nome_contato ?>">
                                        </div>
                                        <div class="form-group">
                                            <label id="lbl-email">E-mail</label>
                                            <input type="text" id="txt-email" name="txt-email" placeholder="Digite o E-mail..." class="form-control" value="<?= $contato->email_contato ?>">
                                        </div>
                                        <div class="form-group">
                                            <label id="lbl-telefone">Telefone</label>
                                            <input type="text" id="txt-telefone" name="txt-telefone" placeholder="Digite o telefone..." class="form-control" value="<?= $contato->telefone_contato ?>">
                                        </div>
                                        <div class="form-group">
                                            <label id="lbl-unidade"><strong>Unidade</strong></label>
                                            <select id="select-unidade" name="select-unidade" class="form-control">
                                                <?php foreach ($unidades as $unidade) { ?>
                                                    <option value="<?php echo $unidade->idunidade ?>" <?php if ($unidade->idunidade == $contato->idunidade_contato) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                        <?php echo $unidade->unidade ?>
                                                    </option>
                                                <?php
                                                    } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label id="lbl-regional"><strong>Regional</strong></label>
                                            <select id="select-regional" name="select-regional" class="form-control">
                                                <?php foreach ($regionais as $regional) { ?>
                                                    <option value="<?php echo $regional->idregional ?>" <?php if ($regional->idregional == $contato->idregional_contato) {
                                                                                                                    echo "selected";
                                                                                                                } ?>>
                                                        <?php echo $regional->regional ?>
                                                    </option>
                                                <?php
                                                    } ?>
                                            </select>
                                        </div>
                                        <input type="hidden" id="txt-idcontato" name="txt-idcontato" value="<?= $contato->idcontatos ?>">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i> Alterar
                                        </button>

                                        <a href="<?php echo base_url('/contatos') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Cancelar</a>
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