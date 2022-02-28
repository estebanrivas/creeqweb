<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

	<section class="p-t-20">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-12">
					<div class="overview-wrap">
						<h3 class="title-5 m-b-35">Manutenção <?php echo $subtitulo ?></h3>
						<a href="<?= base_url() ?>outsourcing/toner"><button class="au-btn au-btn-icon au-btn--green" data-toggle="tooltip" data-placement="top" title="Cadastrar pedido de Toner"><i class="fas fa-file-alt"></i> Cadastrar</button></a><a href="<?= base_url() ?>outsourcing/listaTonerExcel"><button class="au-btn au-btn-icon au-btn--blue" data-toggle="tooltip" data-placement="top" title="Exportar Excel"><i class="fas fa-file-excel"></i> Excel</button></a>
					</div>
					<div class="table-responsive table--no-card">
						<?php
						$this->table->set_heading("Patrimonio", "Host", "Localização", "Serial", "Pedido", "Data Pedido", "Status", "Opções");
						foreach ($pedidosout as $pedidoout) {
							$nomepatrimonio 	= $pedidoout->patrimonio;
							$nomeserial     	= $pedidoout->serial;
							$nomehost       	= $pedidoout->host;
							$nomelocalizacao 	= $pedidoout->localizacao;
							// $datapedido     	= date('d/m/Y', strtotime($pedidoout->datachamado));
							$datapedido     	= $pedidoout->datachamado;
							$nomepedido     	= $pedidoout->chamadoout;
							$statustoner    	= $pedidoout->statuschamadotoner;

							if ($pedidoout->statuschamadotoner == 'ABERTO') {
								$statustoner = '<span class="role user">ABERTO</span>';
							} elseif ($pedidoout->statuschamadotoner == 'ENTREGUE') {
								$statustoner = '<span class="role member">ENTREGUE</span>';
							} elseif ($pedidoout->statuschamadotoner == 'DECLINADO') {
								$statustoner = '<span class="role admin">DECLINADO</span>';
							}

							// $statuspedido   = $this->statusPedido($datatoner = $pedidoout->datachegadatoner);

							$alterar = anchor(base_url('outsourcing/alterar_toner/' . md5($pedidoout->idtonerout)), '<button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button>');
							$excluir = '<button type="button" class="btn btn-danger btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".excluir-modal-' . $pedidoout->idtonerout . '" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>';
							$detalhes = '<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-' . $pedidoout->idtonerout . '" title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>';
							echo $modal = ' <div class="modal fade detalhes-modal-' . $pedidoout->idtonerout . '" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header btn-warning">
                                            <h5 class="modal-title" id="mediummodalLabel">Detalhes do pedido de toner</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                            <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-patrimonio">Patrimônio</label>
                                                        <input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" readonly value="' . $pedidoout->patrimonio . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-serial">Serial</label>
                                                        <input type="text" id="txt-serial" name="txt-serial" class="form-control" readonly value="' . $pedidoout->serial . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-host">Host</label>
                                                        <input type="text" id="txt-host" name="txt-host" class="form-control" readonly value="' . $pedidoout->host . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-unidade">Unidade</label>
                                                        <input type="text" id="txt-unidade" name="txt-unidade" readonly class="form-control" value="' . $pedidoout->unidade . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-localizacao">Localização</label>
                                                        <input type="text" id="txt-localizacao" name="txt-localizacao" readonly class="form-control" value="' . $pedidoout->localizacao . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-chamadoservicedesk">Chamado Service Desk</label>
                                                        <input type="text" id="txt-chamadoservicedesk" name="txt-chamadoservicedesk" readonly class="form-control" value="' . $pedidoout->chamadoservicedesk . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-chamadoout">Chamado Outsourcing</label>
                                                        <input type="text" id="txt-chamadoout" name="txt-chamadoout" readonly class="form-control" value="' . $pedidoout->chamadoout . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-datasolicitacao">Data Solicitação</label>
                                                        <input type="text" id="txt-datasolicitacao" name="txt-datasolicitacao" readonly class="form-control" value="' . date('d/m/Y', strtotime($pedidoout->datachamado)) . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-quantidadesolicitada">Quantidade</label>
                                                        <input type="text" id="txt-quantidadesolicitada" name="txt-quantidadesolicitada" readonly class="form-control" value="' . $pedidoout->quantidadesolicitada . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-contadortotal">Contador Total</label>
                                                        <input type="text" id="txt-contadortotal" name="txt-contadortotal" readonly class="form-control" value="' . $pedidoout->contadortotal . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-contadorpb">Contador PB</label>
                                                        <input type="text" id="txt-contadorpb" name="txt-contadorpb" readonly class="form-control" value="' . $pedidoout->contadorpb . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-contadorcolor">Contador Colorido</label>
                                                        <input type="text" id="txt-contadorcolor" name="txt-contadorcolor" readonly class="form-control" value="' . $pedidoout->contadorcolor . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label id="lbl-quantidadesolicitadaciano">Qtd. TONER CIANO</label>
                                                        <input type="text" id="txt-quantidadesolicitadaciano" name="txt-quantidadesolicitadaciano" readonly class="form-control" value="' . $pedidoout->quantidadesolicitadaciano . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label id="lbl-quantidadesolicitadamagenta">Qtd. TONER MAGENTA</label>
                                                        <input type="text" id="txt-quantidadesolicitadamagenta" name="txt-quantidadesolicitadamagenta" readonly class="form-control" value="' . $pedidoout->quantidadesolicitadamagenta . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label id="lbl-quantidadesolicitadaamarelo">Qtd. TONER AMARELO</label>
                                                        <input type="text" id="txt-quantidadesolicitadaamarelo" name="txt-quantidadesolicitadaamarelo" readonly class="form-control" value="' . $pedidoout->quantidadesolicitadaamarelo . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h5 class="modal-title" id="mediummodalLabel">Entrega do Toner</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-datadachegada">Data da Chegada</label>
                                                        <input type="text" id="txt-datadachegada" name="txt-datadachegada" readonly class="form-control" value="' . date('d/m/Y', strtotime($pedidoout->datachegadatoner)) . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-numeronf">Número da NF</label>
                                                        <input type="text" id="txt-numeronf" name="txt-numeronf" readonly class="form-control" value="' . $pedidoout->numeronf . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-quemrecebeu">Quem Recebeu?</label>
                                                        <input type="text" id="txt-quemrecebeu" name="txt-quemrecebeu" readonly class="form-control" value="' . $pedidoout->quemrecebeutoner . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-statuschamadotoner">Status do Chamado</label>
                                                        <input type="text" id="txt-statuschamadotoner" name="txt-statuschamadotoner" readonly class="form-control" value="' . $pedidoout->statuschamadotoner . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h5 class="modal-title" id="mediummodalLabel">Detalhes do Toner - INSTALADO</h5>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-numeroserietoner">Num. Série PRETO</label>
                                                        <input type="text" id="txt-numeroserietoner" name="txt-numeroserietoner" readonly class="form-control"  value="' . $pedidoout->numserietoner . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-datainstalacao">Data Inst. PRETO</label>
                                                        <input type="text" id="txt-datainstalacao" name="txt-datainstalacao" readonly class="form-control" value="' . date('d/m/Y', strtotime($pedidoout->datadeinstalacaotoner)) . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-modelotonerblack">Modelo PRETO</label>
                                                        <input type="text" id="txt-modelotonerblack" name="txt-modelotonerblack" readonly class="form-control" value="' . $pedidoout->modelotonerblack . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-capacidadetoner">Capac. Toner PRETO</label>
                                                        <input type="text" id="txt-capacidadetoner" name="txt-capacidadetoner" readonly class="form-control" value="' . $pedidoout->capacidadetoner . '">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-numeroserietonerciano">Num. Série CIANO</label>
                                                        <input type="text" id="txt-numeroserietonerciano" name="txt-numeroserietonerciano" readonly class="form-control" value="' . $pedidoout->numserietonerciano . '">
                                                    </div>
                                                </div>

                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-datainstalacaociano">Data Inst. CIANO</label>
                                                        <input type="text" id="txt-datainstalacaociano" name="txt-datainstalacaociano" readonly class="form-control" value="' . date('d/m/Y', strtotime($pedidoout->datadeinstalacaociano)) . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-modelotonerciano">Modelo CIANO</label>
                                                        <input type="text" id="txt-modelotonerciano" name="txt-modelotonerciano" readonly class="form-control" value="' . $pedidoout->modelotonerciano . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-capacidadetonerciano">Capac. Toner CIANO</label>
                                                        <input type="text" id="txt-capacidadetonerciano" name="txt-capacidadetonerciano" readonly class="form-control" value="' . $pedidoout->capacidadetonerciano . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-numeroserietonermagenta">Num. Série MAGENTA</label>
                                                        <input type="text" id="txt-numeroserietonermagenta" name="txt-numeroserietonermagenta" readonly class="form-control" value="' . $pedidoout->numserietonermagenta . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-datainstalacaomagenta">Data Inst. MAGENTA</label>
                                                        <input type="text" id="txt-datainstalacaomagenta" name="txt-datainstalacaomagenta" readonly class="form-control" value="' . date('d/m/Y', strtotime($pedidoout->datadeinstalacaomagenta)) . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-modelotonermagenta">Modelo MAGENTA</label>
                                                        <input type="text" id="txt-modelotonermagenta" name="txt-modelotonermagenta" readonly class="form-control" value="' . $pedidoout->modelotonermagenta . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-capacidadetonermagenta">Capac. Toner MAGENTA</label>
                                                        <input type="text" id="txt-capacidadetonermagenta" name="txt-capacidadetonermagenta" readonly class="form-control" value="' . $pedidoout->capacidadetonermagenta . '">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-numeroserietoner">Num. Série AMARELO</label>
                                                        <input type="text" id="txt-numeroserietoneramarelo" name="txt-numeroserietoneramarelo" readonly class="form-control" value="' . $pedidoout->numserietoneramarelo . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-datainstalacaoamarelo">Data Inst. AMARELO</label>
                                                        <input type="text" id="txt-datainstalacaoamarelo" name="txt-datainstalacaoamarelo" readonly class="form-control" value="' . date('d/m/Y', strtotime($pedidoout->datadeinstalacaoamarelo)) . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-modelotoneramarelo">Modelo AMARELO</label>
                                                        <input type="text" id="txt-modelotoneramarelo" name="txt-modelotoneramarelo" readonly class="form-control" value="' . $pedidoout->modelotoneramarelo . '">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label id="lbl-capacidadetoneramarelo">Capac. Toner AMARELO</label>
                                                        <input type="text" id="txt-capacidadetoneramarelo" name="txt-capacidadetoneramarelo" readonly class="form-control" value="' . $pedidoout->capacidadetoneramarelo . '">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
							echo $modal = '<div class="modal fade excluir-modal-' . $pedidoout->idtonerout . '" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header btn-danger">
                                        <h5 class="modal-title" id="mediummodalLabel">Exclusão de Pedido de toner</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Deseja Excluir o Pedido de toner do ' . $pedidoout->host . '?</h4>
                                        <p>Após Excluido o Pedido de toner do <b>' . $pedidoout->host . '</b> não ficara mais disponível no Sistema.</p>
                                        <p>Todos os itens relacionados ao pedido de toner do serial <b>' . $pedidoout->serial . '</b> serão afetados e não aparecerão no sistema até que sejam editados.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <a type="button" class="btn btn-danger" href="' . base_url("outsourcing/excluir_toner/" . md5($pedidoout->idtonerout)) . '">Excluir</a>
                                    </div>
                                </div>
                            </div>
                        </div>';
							$this->table->add_row($nomepatrimonio, $nomehost, $nomelocalizacao, $nomeserial, $nomepedido, $datapedido, $statustoner, $alterar . '&nbsp&nbsp' . $excluir . '&nbsp&nbsp' . $detalhes);
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
