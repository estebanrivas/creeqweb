<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

	<section class="p-t-20">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-12">
					<div class="overview-wrap">
						<h3 class="title-5 m-b-35"><?php echo $subtitulo ?></h3>
						<a href="<?= base_url() ?>chamadoout/listagemchamadosout"><button class="au-btn au-btn-icon au-btn--green" data-toggle="tooltip" data-placement="top" title="Listagem de Chamados Outsourcing"><i class="fas fa-file-alt"></i> Listagem</button></a>
					</div>
					<div class="alert alert-danger" role="alert">
						<span class="badge badge-pill badge-danger">IMPORTANTE!!!</span>
						<strong>
							<p>Antes de cadastrar o chamado outsourcing, é necessário ter o equipamento cadastrado!!!</p>
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
							echo form_open('chamadoout/inserir_chamadoout/');
							?>
							<h3 class="mt-2"><i class="fas fa-table"></i> Chamados Outsourcing</h3>
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
										<input type="text" id="txt-chamadoservicedesk" name="txt-chamadoservicedesk" class="form-control" value="<?php echo set_value('txt-chamadoservicedesk') ?>">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-group">
										<label id="lbl-chamadoout">* Chamado Outsourcing</label>
										<input type="text" id="txt-chamadoout" name="txt-chamadoout" class="form-control" value="<?php echo set_value('txt-chamadoout') ?>">
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
										<label id="lbl-contadortotal">* Contador Total</label>
										<input type="text" id="txt-contadortotal" name="txt-contadortotal" class="form-control" value="<?php echo set_value('txt-contadortotal') ?>">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-group">
										<label id="lbl-contadorpb">* Contador PB</label>
										<input type="text" id="txt-contadorpb" name="txt-contadorpb" class="form-control" value="<?php echo set_value('txt-contadorpb') ?>">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-group">
										<label id="lbl-contadorcolor">* Contador Colorido</label>
										<input type="text" id="txt-contadorcolor" name="txt-contadorcolor" class="form-control" value="<?php echo set_value('txt-contadorcolor') ?>">
									</div>
								</div>

								<div class="col-sm-3">
									<div class="form-group">
										<label id="lbl-statuschamadoout">Status do Chamado</label>
										<select id="select-statuschamadoout" name="select-statuschamadoout" class="form-control">
											<option value="ABERTO">ABERTO</option>
											<option value="PENDENTE">PENDENTE</option>
											<option value="RESOLVIDO">RESOLVIDO</option>
											<option value="DECLINADO">DECLINADO</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label id="lbl-descricaochamadoout">Descrição do Chamado</label>
										<textarea id="txt-descricaochamadoout" name="txt-descricaochamadoout" class="form-control"><?php echo set_value('txt-descricaochamadoout') ?></textarea>
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
