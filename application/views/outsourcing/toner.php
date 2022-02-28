<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="overview-wrap">
                        <h3 class="title-5 m-b-35"><?php echo $subtitulo ?></h3>
                        <a href="<?= base_url() ?>outsourcing/listagemtoner"><button class="au-btn au-btn-icon au-btn--green" data-toggle="tooltip" data-placement="top" title="Listagem de Pedidos de Toner"><i class="fas fa-file-alt"></i> Listagem</button></a>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        <span class="badge badge-pill badge-danger">IMPORTANTE!!!</span>
                        <strong>
                            <p>Antes de cadastrar, é necessário ter o equipamento cadastrado!!!</p>
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
                            echo form_open('outsourcing/inserir_toner/');
                            ?>
                            <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
                                <li class="nav-item active">
                                    <a class="nav-link active" id="solicitacaotoner-tab" data-toggle="tab" href="#solicitacaotoner" role="tab" aria-controls="solicitacaotoner" aria-selected="true"><i class="fas fa-table"></i> Solicitação de Toner</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="entregatoner-tab" data-toggle="tab" href="#entregatoner" role="tab" aria-controls="entregatoner" aria-selected="false"><i class="fas fa-globe"></i> Entrega do Toner</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="detalhestoner-tab" data-toggle="tab" href="#detalhestoner" role="tab" aria-controls="detalhestoner" aria-selected="false"><i class="fas fa-print"></i> Detalhes do Toner - INSTALADO</a>
                                </li>
                            </ul>
                            <div class="tab-content pl-3 p-1" id="myTabContent">
                                <div class="tab-pane fade show active" id="solicitacaotoner" role="tabpanel" aria-labelledby="solicitacaotoner-tab">
                                    <h3 class="mt-2"><i class="fas fa-table"></i> Solicitação de Toner</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-patrimonio">* Patrimonio</label>
                                                <input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" placeholder="Digite o patrimônio" autofocus>
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" id="txt-patrimonio1" name="txt-patrimonio1" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-serial">* Serial</label>
                                                <input type="text" id="txt-serial" name="txt-serial" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-host">* Host</label>
                                                <input type="text" id="txt-host" name="txt-host" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-unidade">* Unidade</label>
                                                <input type="text" id="txt-unidade" name="txt-unidade" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-localizacao">* Localização</label>
                                                <input type="text" id="txt-localizacao" name="txt-localizacao" class="form-control" readonly>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-chamadoservicedesk">* Chamado Service Desk</label>
                                                <input type="text" id="txt-chamadoservicedesk" name="txt-chamadoservicedesk" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-chamadoout">* Chamado Outsourcing</label>
                                                <input type="text" id="txt-chamadoout" name="txt-chamadoout" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-datasolicitacao">* Data Solicitação</label>
                                                <input type="text" id="txt-datasolicitacao" name="txt-datasolicitacao" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-quantidaesolicitada">* Quantidade TONER PRETO</label>
                                                <input type="text" id="txt-quantidadesolicitada" name="txt-quantidadesolicitada" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-contadortotal">* Contador Total</label>
                                                <input type="text" id="txt-contadortotal" name="txt-contadortotal" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-contadorpb">* Contador PB</label>
                                                <input type="text" id="txt-contadorpb" name="txt-contadorpb" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-contadorcolor">* Contador Colorido</label>
                                                <input type="text" id="txt-contadorcolor" name="txt-contadorcolor" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4" id="ciano">
                                            <div class="form-group">
                                                <label id="lbl-quantidadesolicitadaciano">* Quantidade TONER CIANO</label>
                                                <input type="text" id="txt-quantidadesolicitadaciano" name="txt-quantidadesolicitadaciano" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-4" id="magenta">
                                            <div class="form-group">
                                                <label id="lbl-quantidadesolicitadamagenta">* Quantidade TONER MAGENTA</label>
                                                <input type="text" id="txt-quantidadesolicitadamagenta" name="txt-quantidadesolicitadamagenta" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-4" id="amarelo">
                                            <div class="form-group">
                                                <label id="lbl-quantidadesolicitadaamarelo">* Quantidade TONER AMARELO</label>
                                                <input type="text" id="txt-quantidadesolicitadaamarelo" name="txt-quantidadesolicitadaamarelo" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="entregatoner" role="tabpanel" aria-labelledby="entregatoner-tab">
                                    <h3 class="mt-2"><i class="fas fa-globe"></i> Entrega do Toner</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-datadachegada">Data da Chegada</label>
                                                <input type="text" id="txt-datadachegada" name="txt-datadachegada" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-numeronf">Número da NF</label>
                                                <input type="text" id="txt-numeronf" name="txt-numeronf" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-quemrecebeu">Quem Recebeu?</label>
                                                <input type="text" id="txt-quemrecebeu" name="txt-quemrecebeu" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-statuschamadotoner">Status do Chamado</label>
                                                <select id="select-statuschamadotoner" name="select-statuschamadotoner" class="form-control">
                                                    <option value="ABERTO">ABERTO</option>
                                                    <option value="ENTREGUE">ENTREGUE</option>
                                                    <option value="DECLINADO">DECLINADO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="detalhestoner" role="tabpanel" aria-labelledby="detalhestoner-tab">
                                    <h3 class="mt-2"><i class="fas fa-print"></i> Detalhes do Toner - INSTALADO</h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-numeroserietoner">Número de Série do Toner PRETO</label>
                                                <input type="text" id="txt-numeroserietoner" name="txt-numeroserietoner" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-datainstalacao">Data da Instalação PRETO</label>
                                                <input type="text" id="txt-datainstalacao" name="txt-datainstalacao" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-modelotonerblack">Modelo de toner PRETO</label>
                                                <input type="text" id="txt-modelotonerblack" name="txt-modelotonerblack" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-capacidadetoner">Capacidade do Toner PRETO</label>
                                                <input type="text" id="txt-capacidadetoner" name="txt-capacidadetoner" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-numeroserietonerciano">Número de Série do Toner CIANO</label>
                                                <input type="text" id="txt-numeroserietonerciano" name="txt-numeroserietonerciano" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-datainstalacaociano">Data da Instalação CIANO</label>
                                                <input type="text" id="txt-datainstalacaociano" name="txt-datainstalacaociano" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-modelotonerciano">Modelo de toner CIANO</label>
                                                <input type="text" id="txt-modelotonerciano" name="txt-modelotonerciano" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-capacidadetonerciano">Capacidade do Toner CIANO</label>
                                                <input type="text" id="txt-capacidadetonerciano" name="txt-capacidadetonerciano" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-numeroserietonermagenta">Número de Série do Toner MAGENTA</label>
                                                <input type="text" id="txt-numeroserietonermagenta" name="txt-numeroserietonermagenta" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-datainstalacaomagenta">Data da Instalação MAGENTA</label>
                                                <input type="text" id="txt-datainstalacaomagenta" name="txt-datainstalacaomagenta" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-modelotonermagenta">Modelo de toner MAGENTA</label>
                                                <input type="text" id="txt-modelotonermagenta" name="txt-modelotonermagenta" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-capacidadetonermagenta">Capacidade do Toner MAGENTA</label>
                                                <input type="text" id="txt-capacidadetonermagenta" name="txt-capacidadetonermagenta" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-numeroserietoneramarelo">Número de Série do Toner AMARELO</label>
                                                <input type="text" id="txt-numeroserietoneramarelo" name="txt-numeroserietoneramarelo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-datainstalacaoamarelo">Data da Instalação AMARELO</label>
                                                <input type="text" id="txt-datainstalacaoamarelo" name="txt-datainstalacaoamarelo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-modelotoneramarelo">Modelo de toner AMARELO</label>
                                                <input type="text" id="txt-modelotoneramarelo" name="txt-modelotoneramarelo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label id="lbl-capacidadetoneramarelo">Capacidade do Toner AMARELO</label>
                                                <input type="text" id="txt-capacidadetoneramarelo" name="txt-capacidadetoneramarelo" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
            </div>
        </div>
    </section>