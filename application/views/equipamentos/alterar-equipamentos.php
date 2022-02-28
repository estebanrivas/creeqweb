<!-- PAGE CONTENT-->
<div class="page-content--bgf7">


<section class="p-t-20">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<h3 class="title-5 m-b-35"><?php echo 'Alteração de '.$subtitulo ?></h3>
				<div class="card">
					<div class="card-header">
						<strong><?php echo 'Alteração de '.$subtitulo ?></strong>
					</div>
					<div class="card-body card-block">
						<?php
							echo validation_errors('<div class="alert alert-danger">', '</div>');
							foreach ($equipamentos as $equipamento) {
							echo form_open('equipamentos/salvar_alteracoes/'.md5($equipamento->idequipamento));
						?>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-tpequipamento"><strong>Tipo de equipamento</strong></label>
									<select id="select-tpequipamento" name="select-tpequipamento" class="form-control" autofocus>
									<?php foreach ($tpequipamentos as $tpequipamento) { ?>
									<option value="<?php echo $tpequipamento->idtpequipamento ?>" <?php if ($tpequipamento->idtpequipamento == $equipamento->tbtpequipamento_idtpequipamento){echo "selected";} ?>><?php echo $tpequipamento->tpequipamento ?></option>
									<?php 
									} ?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-teamviewer"><strong>Teamviewer</strong></label>
									<input type="text" id="txt-teamviewer" name="txt-teamviewer" placeholder="Digite o ID do Teamviewer..." value="<?php echo $equipamento->teamviewer ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-patrimonio"><strong>Patrimônio</strong></label>
									<input type="text" id="txt-patrimonio" name="txt-patrimonio" placeholder="Digite o patrimônio..." value="<?php echo $equipamento->patrimonio ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-usuario"><strong>Usuário</strong></strong></label>
									<input type="text" id="txt-usuario" name="txt-usuario" placeholder="Digite o usuário..." value="<?php echo $equipamento->usuario ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-ip"><strong>IP</strong></label>
									<input type="text" id="txt-ip" name="txt-ip" placeholder="Digite o ip. Ex: 10.xxx.xxx.xxx" value="<?php echo $equipamento->ip ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-host"><strong>Host</strong></label>
									<input type="text" id="txt-host" name="txt-host" placeholder="Digite o HOST, SESC-XXXXXX" value="<?php echo $equipamento->host ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-modelo"><strong>Modelo</strong></label>
									<input type="text" id="txt-modelo" name="txt-modelo" placeholder="Digite o modelo..." value="<?php echo $equipamento->modelo ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-serial"><strong>Serial</strong></label>
									<input type="text" id="txt-serial" name="txt-serial" placeholder="Digite o serial..." value="<?php echo $equipamento->serial ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-processador"><strong>Processador</strong></label>
									<input type="text" id="txt-processador" name="txt-processador" placeholder="Digite o processador..." value="<?php echo $equipamento->processador ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="txt-telamonitor"><strong>Tela do Monitor</strong></label>
									<input type="text" id="txt-telamonitor" name="txt-telamonitor" placeholder="Digite a tela do monitor..." value="<?php echo $equipamento->telamonitor ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-hd"><strong>HD</strong></label>
									<input type="text" id="txt-hd" name="txt-hd" placeholder="Digite a conexão..." value="<?php echo $equipamento->hd ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-ram"><strong>RAM</strong></label>
									<input type="text" id="txt-ram" name="txt-ram" placeholder="Digite a ram..." value="<?php echo $equipamento->ram ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-maclan"><strong>MAC LAN</strong></label>
									<input type="text" id="txt-maclan" name="txt-maclan" placeholder="Digite O MAC..." value="<?php echo $equipamento->mac ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-macwifi"><strong>MAC WI-FI</strong></label>
									<input type="text" id="txt-macwifi" name="txt-macwifi" placeholder="Digite O MAC..." value="<?php echo $equipamento->macw ?>" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-macbluetooth"><strong>MAC BLUETOOTH</strong></label>
									<input type="text" id="txt-macbluetooth" name="txt-macbluetooth" placeholder="Digite O MAC..." value="<?php echo $equipamento->macb ?>" class="form-control">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-fabricante"><strong>Fabricante</strong></label>
									<select id="select-fabricante" name="select-fabricante" class="form-control" >
									<?php foreach ($fabricantes as $fabricante) { ?>
									<option value="<?php echo $fabricante->idfabricante ?>" <?php if($fabricante->idfabricante == $equipamento->tbfabricante_idfabricante){echo "selected";} ?>><?php echo $fabricante->fabricante ?></option>
									<?php 
									} ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-regional"><strong>Regional</strong></label>
									<select id="select-regional" name="select-regional" class="form-control" >
									<?php foreach ($regionais as $regional) { ?>
									<option value="<?php echo $regional->idregional ?>" <?php if($regional->idregional == $equipamento->tbregional_idregional){echo "selected";} ?>><?php echo $regional->regional ?></option>
									<?php 
									} ?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-sos"><strong>Sistema Opeacional</strong></label>
									<select id="select-sos" name="select-sos" class="form-control" >
									<?php foreach ($sos as $so) { ?>
									<option value="<?php echo $so->idso ?>" <?php if($so->idso == $equipamento->tbso_idso){echo "selected";} ?>><?php echo $so->so ?></option>
									<?php 
								} ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-status"><strong>Status</strong></label>
									<select id="select-status" name="select-status" class="form-control" >
									<?php foreach ($status as $statu) { ?>
									<option value="<?php echo $statu->idstatus ?>" <?php if($statu->idstatus == $equipamento->tbstatus_idstatus){echo "selected";} ?>><?php echo $statu->status ?></option>
									<?php 
								} ?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-localizacao"><strong>Localização</strong></label>
									<select id="select-localizacao" name="select-localizacao" class="form-control" >
									<?php foreach ($localizacoes as $localizacao) { ?>
									<option value="<?php echo $localizacao->idlocalizacao ?>" <?php if($localizacao->idlocalizacao == $equipamento->tblocalizacao_idlocalizacao){echo "selected";} ?>><?php echo $localizacao->localizacao ?></option>
									<?php 
								} ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-unidade"><strong>Unidade</strong></label>
									<select id="select-unidade" name="select-unidade" class="form-control" >
									<?php foreach ($unidades as $unidade) { ?>
									<option value="<?php echo $unidade->idunidade ?>" <?php if($unidade->idunidade == $equipamento->tbunidades_idunidade){echo "selected";} ?>><?php echo $unidade->unidade ?></option>
									<?php 
								} ?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-conexao"><strong>Conexão</strong></label>
									<select id="select-conexao" name="select-conexao" class="form-control" >
									<?php foreach ($conexoes as $conexao) { ?>
									<option value="<?php echo $conexao->idconexao ?>" <?php if($conexao->idconexao == $equipamento->tbconexao_idconexao){echo "selected";} ?>><?php echo $conexao->conexao ?></option>
									<?php 
								} ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-outsourcing"><strong>Outsourcing</strong></label>
									<select id="select-outsourcing" name="select-outsourcing" class="form-control" >
									<option value="NÃO" <?php if($equipamento->outsourcing == "NÃO"){echo "selected";} ?>>NÃO</option>
									<option value="SIM" <?php if($equipamento->outsourcing == "SIM"){echo "selected";} ?>>SIM</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label id="lbl-observacao"><strong>Observação</strong></label>
									<textarea id="txt-observacao" name="txt-observacao" class="form-control"><?php echo $equipamento->obs ?></textarea>
								</div>
							</div>
						</div>
						<input type="hidden" name="txt-idequipamento" id="txt-idequipamento" value="<?php echo $equipamento->idequipamento ?>">
						<button type="submit" class="btn btn-primary btn-sm" align="center">
						<i class="fa fa-plus"></i> Atualizar
						</button>
						<a href="<?php echo base_url() ?>/localizar" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Voltar</a>

						<?php
							echo form_close();
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
