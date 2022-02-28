        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">


            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <h3 class="title-5 m-b-35"><?php echo 'Cadastro de '.$subtitulo ?></h3>
                            <div class="card">
                                <div class="card-header">
                                    <strong><?php echo 'Cadastro de '.$subtitulo ?></strong>
                                </div>
                                <div class="card-body card-block">
                                        <div id="mensagemUsuario"><?= $this->session->userdata('msg'); ?></div>
                                        <?php
                                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                                            echo form_open('fabricante/inserir');
                                        ?>
                                        <div class="form-group">
                                            <label id="txt-fabricante">Nome do Fabricante</label>
                                            <input type="text" id="txt-fabricante" name="txt-fabricante" placeholder="Digite o fabricante..." class="form-control" autofocus>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i></i> Cadastrar
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
                        <div class="col-md-6 col-lg-6">
                            <h3 class="title-5 m-b-35">Alterar <?php echo $subtitulo ?></h3>
                            <div class="table-responsive table--no-card">
                                    <?php
                                    $this->table->set_heading("Fabricantes", "Opções");
                                    foreach ($fabricantes as $fabricante) {
                                        $nomecon= $fabricante->fabricante;
                                        $alterar= anchor(base_url('fabricante/alterar/'.md5($fabricante->idfabricante)), '<button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button>');
                                        $excluir= '<button type="button" class="btn btn-danger btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".excluir-modal-'.$fabricante->idfabricante.'" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>';
                                        echo $modal= ' <div class="modal fade excluir-modal-'.$fabricante->idfabricante.'" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header btn-danger">
                                                    <h5 class="modal-title" id="mediummodalLabel">Exclusão de Conexão</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Deseja Excluir o Fabricante '.$fabricante->fabricante.'?</h4>
                                                    <p>Após Excluido o Fabricante <b>'.$fabricante->fabricante.'</b> não ficará mais disponível no Sistema.</p>
                                                    <p>Todos os itens relacionados ao fabricante <b>'.$fabricante->fabricante.'</b> serão afetados e não aparecerão no sistema até que sejam editados.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <a type="button" class="btn btn-danger" href="'.base_url("fabricante/excluir/".md5($fabricante->idfabricante)).'">Excluir</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                                        $this->table->add_row($nomecon, $alterar.'&nbsp&nbsp'.$excluir);
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
