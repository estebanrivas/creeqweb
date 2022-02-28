<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <h3 class="title-5 m-b-35"><?php echo 'Cadastro de ' . $subtitulo ?></h3>
                    <div class="alert alert-warning" role="alert">
                        <span class="badge badge-pill badge-warning">IMPORTANTE!!!</span>
                        <strong>
                            <p>Antes de cadastrar, é necessário ter o equipamento cadastrado!!!</p>
                        </strong>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <strong><?php echo 'Cadastro de ' . $subtitulo ?></strong><br>
                        </div>
                        <div class="card-body card-block">
                            <div id="mensagemUsuario"><?= $this->session->userdata('msg'); ?></div>
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            echo form_open('cadeados/inserir');
                            ?>
                            <div class="form-group">
                                <label id="lbl-codigo">Código do Cadeado</label>
                                <input type="text" id="txt-codigo" name="txt-codigo" placeholder="Digite o código. ex: 001" class="form-control" autofocus>
                            </div>
                            <div class="form-group">
                                <label id="lbl-patrimonio">Patrimônio</label>
                                <input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control">
                                <!-- <select name="txt-patrimonio" id="txt-patrimonio" class="form-control"></select> -->
                                <!-- <select class="itemName form-control" style="width:500px" name="itemName"></select> -->
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="txt-patrimonio1" name="txt-patrimonio1" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label id="lbl-unidade">Unidade</label>
                                <input type="text" id="txt-unidade" name="txt-unidade" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <label id="lbl-localizacao">Localização</label>
                                <input type="text" id="txt-localizacao" name="txt-localizacao" readonly class="form-control">
                            </div>
                            <div class="form-group">
                                <label id="lbl-usuario">Usuário</label>
                                <input type="text" id="txt-usuario" name="txt-usuario" readonly class="form-control">
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
                <div class="col-md-6 col-lg-6">
                    <h3 class="title-5 m-b-35">Alterar <?php echo $subtitulo ?></h3>
                    <div class="table-responsive table--no-card">
                        <?php
                        $this->table->set_heading("Código", "Patrimônio", "Unidade", "Opções");
                        foreach ($cadeados as $cadeado) {

                            $nomecod            = $cadeado->codigo;
                            $nomepatrimonio     = $cadeado->patrimonio;
                            $nomeunidade        = $cadeado->unidade;

                            $alterar = anchor(base_url('cadeados/alterar/' . md5($cadeado->idcadeados)), '<button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button>');
                            $excluir = '<button type="button" class="btn btn-danger btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".excluir-modal-' . $cadeado->idcadeados . '" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>';
                            $detalhes = '<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $cadeado->idcadeados . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>';
                            echo $modal = ' <div class="modal fade detalhes-modal-' . $cadeado->idcadeados . '" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header btn-warning">
                                            <h5 class="modal-title" id="mediummodalLabel">Exclusão de Conexão</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label id="lbl-codigo">Código do Cadeado</label>
                                                <input type="text" id="txt-codigo" name="txt-codigo" class="form-control" readonly value="' . $cadeado->codigo . '">
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-patrimonio">Patrimônio</label>
                                                <input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" readonly value="' . $cadeado->patrimonio . '">
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-unidade">Unidade</label>
                                                <input type="text" id="txt-unidade" name="txt-unidade" readonly class="form-control" value="' . $cadeado->unidade . '">
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-localizacao">Localização</label>
                                                <input type="text" id="txt-localizacao" name="txt-localizacao" readonly class="form-control" value="' . $cadeado->localizacao . '">
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-usuario">Usuário</label>
                                                <input type="text" id="txt-usuario" name="txt-usuario" readonly class="form-control" value="' . $cadeado->usuario . '">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            echo $modal = '<div class="modal fade excluir-modal-' . $cadeado->idcadeados . '" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header btn-danger">
                                        <h5 class="modal-title" id="mediummodalLabel">Exclusão de Conexão</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Deseja Excluir o Cadeado ' . $cadeado->codigo . '?</h4>
                                        <p>Após Excluido o Cadeado <b>' . $cadeado->codigo . '</b> não ficara mais disponível no Sistema.</p>
                                        <p>Todos os itens relacionados ao cadeado <b>' . $cadeado->codigo . '</b> serão afetados e não aparecerão no sistema até que sejam editados.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a type="button" class="btn btn-danger" href="' . base_url("cadeados/excluir/" . md5($cadeado->idcadeados)) . '">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
                            $this->table->add_row($nomecod, $nomepatrimonio, $nomeunidade, $alterar . '&nbsp&nbsp' . $excluir . '&nbsp&nbsp' . $detalhes);
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