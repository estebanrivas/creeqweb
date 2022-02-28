        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">


            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <h3 class="title-5 m-b-35"><?php echo 'Cadastro de ' . $subtitulo ?></h3>
                            <div class="card">
                                <div class="card-header">
                                    <strong><?php echo 'Cadastro de ' . $subtitulo ?></strong>
                                </div>
                                <div class="card-body card-block">
                                    <div id="mensagemUsuario"><?= $this->session->userdata('msg'); ?></div>
                                    <?php
                                    echo validation_errors('<div class="alert alert-danger">', '</div>');
                                    echo form_open('contatos/inserirContato');
                                    ?>
                                    <div class="form-group">
                                        <label id="lbl-nome">Nome do Contato</label>
                                        <input type="text" id="txt-nome" name="txt-nome" placeholder="Digite o Nome..." class="form-control" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl-email">E-mail</label>
                                        <input type="text" id="txt-email" name="txt-email" placeholder="Digite o E-mail..." class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl-telefone">Telefone</label>
                                        <input type="text" id="txt-telefone" name="txt-telefone" placeholder="Digite o telefone..." class="form-control">
                                    </div>
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
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i> Cadastrar
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Limpar
                                    </button>
                                    <?php
                                    echo form_close();
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8">
                            <h3 class="title-5 m-b-35">Alterar <?php echo $subtitulo ?></h3>
                            <div class="table-responsive table--no-card">
                                <?php
                                $this->table->set_heading("Nome", "Unidade", "Telefone", "Opções");
                                foreach ($contatos as $contato) {
                                    $nomecon = $contato->nome_contato;
                                    $nomeunidade = $contato->unidadesesc;
                                    $nometelefone = $contato->telefone_contato;
                                    $alterar = anchor(base_url('contatos/alterar/' . md5($contato->idcontatos)), '<button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button>');
                                    $detalhes = '<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $contato->idcontatos . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>';
                                    $excluir = '<button type="button" class="btn btn-danger btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".excluir-modal-' . $contato->idcontatos . '" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>';
                                    echo $modal = ' <div class="modal fade excluir-modal-' . $contato->idcontatos . '" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header btn-danger">
                                                        <h5 class="modal-title" id="mediummodalLabel">Exclusão de Contato</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja Excluir o Contato ' . $contato->nome_contato . '?</h4>
                                                        <p>Após Excluido o Contato <b>' . $contato->nome_contato . '</b> não ficara mais disponível no Sistema.</p>
                                                        <p>Todos os itens relacionados ao Contato <b>' . $contato->nome_contato . '</b> serão afetados e não aparecerão no sistema até que sejam editados.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <a type="button" class="btn btn-danger" href="' . base_url("contatos/excluirContato/" . md5($contato->idcontatos)) . '">Excluir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    echo $modal = '<div class="modal fade detalhes-modal-' . $contato->idcontatos . '" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header btn-warning">
                                                        <h5 class="modal-title" id="smallmodalLabel">Detalhes do contato</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label id="lbl-nome">Nome do Contato</label>
                                                            <input type="text" id="txt-nome" name="txt-nome" class="form-control" value="'.$contato->nome_contato. '" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label id="lbl-email">E-mail</label>
                                                            <input type="text" id="txt-email" name="txt-email" class="form-control" value="' . $contato->email_contato . '" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label id="lbl-telefone">Telefone</label>
                                                            <input type="text" id="txt-telefone" name="txt-telefone" class="form-control" value="' . $contato->telefone_contato . '" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label id="lbl-unidade"><strong>Unidade</strong></label>
                                                            <input type="text" id="txt-unidade" name="txt-unidade" class="form-control" value="' . $contato->unidadesesc . '" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label id="lbl-regional"><strong>Regional</strong></label>
                                                            <input type="text" id="txt-unidade" name="txt-unidade" class="form-control" value="' . $contato->regionalsesc . '" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    $this->table->add_row($nomecon, $nomeunidade, $nometelefone, $alterar . '&nbsp&nbsp' . $excluir . '&nbsp&nbsp'. $detalhes);
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