<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="alert alert-info" role="alert">
                        <span class="badge badge-pill badge-danger">IMPORTANTE!!!</span>
                        <strong>
                            <p>Antes de preencher os dados, é necessário ter o equipamento cadastrado!!!</p>
                        </strong>
                    </div>
                    <div class="card">
                        <div class="card-header center">
                            <strong><?php echo $subtitulo ?></strong><br>
                        </div>
                        <div class="card-body card-block">
                            <div id="mensagemUsuario"><?= $this->session->userdata('msg'); ?></div>
                            <?php
                            echo validation_errors('<div class="alert alert-danger">', '</div>');
                            // echo form_open('transferencia/inserir_transferencia/');
                            echo form_open_multipart('transferencia/inserir_transferencia/', 'class="form-horizontal"');
                            ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-unidade-origem">Unidade de Origem</label>
                                        <input type="text" id="txt-unidade-origem" name="txt-unidade-origem" class="form-control" placeholder="Digite a unidade de origem..." autofocus onkeyup="maiusculo(this);">
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl-setor-origem">Setor de Origem</label>
                                        <input type="text" id="txt-setor-origem" name="txt-setor-origem" class="form-control" placeholder="Digite o setor de origem..." onkeyup="maiusculo(this);">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-unidade-destino">Unidade de Destino</label>
                                        <input type="text" id="txt-unidade-destino" name="txt-unidade-destino" class="form-control" placeholder="Digite a unidade de origem..." onkeyup="maiusculo(this);">
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl-setor-destino">Setor de Destino</label>
                                        <input type="text" id="txt-setor-destino" name="txt-setor-destino" class="form-control" placeholder="Digite o setor de destino..." onkeyup="maiusculo(this);">
                                    </div>
                                </div>
                            </div>

                            <fieldset>
                                <legend>Listagem de Equipamentos</legend>
                                <div class="row" id="patrimonio">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label id="lbl-patrimonio" class="form-control-label">Patrimônio</label>
                                            <input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" placeholder="Patrimônio...">
                                        </div>
                                    </div>

                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label id="lbl-descricao-patrimonio" class="form-control-label">Descrição Patrimônio</label>
                                            <input type="text" id="txt-descricao-patrimonio" name="txt-descricao-patrimonio" class="form-control" placeholder="Descrição....">
                                        </div>
                                    </div>

                                    <div class="col-sm-1">
                                        <label id="lbl-btn" class="form-control-label">Opção</label>
                                        <button type="button" id="add-campo" class="btn btn-success" data-tt="tooltip" title="Incluir Campos">+</button>
                                    </div>
                                </div>
                                <div id="patrimonio1">

                                </div>
                            </fieldset>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label id="lbl-motivo-transferencia">Motivo da Transferência</label>
                                        <input type="text" id="txt-motivo-transferencia" name="txt-motivo-transferencia" class="form-control" onkeyup="maiusculo(this);">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-nome-cedente-origem">Nome Cedente Origem</label>
                                        <input type="text" id="txt-nome-cedente-origem" name="txt-nome-cedente-origem" class="form-control" onkeyup="maiusculo(this);">
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl-datasolicitacao">Data Solicitação</label>
                                        <input type="text" id="txt-datasolicitacao" name="txt-datasolicitacao" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label id="lbl-nome-cedente-destino">Nome Cedente Destino</label>
                                        <input type="text" id="txt-nome-cedente-destino" name="txt-nome-cedente-destino" class="form-control" onkeyup="maiusculo(this);">
                                    </div>
                                    <div class="form-group">
                                        <label id="lbl-data-recebimento">Data Recebimento</label>
                                        <input type="text" id="txt-data-recebimento" name="txt-data-recebimento" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-plus"></i> Cadastrar
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Limpar
                            </button>
                        </div>
                        <?php
                        echo form_close();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>