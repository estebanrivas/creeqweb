<!-- Lauch Modal Detalhes -->
        		<!-- <div class="modal fade detalhes-modal" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
        			<div class="modal-dialog modal-lg">
        				<div class="modal-content">
        					<div class="modal-header btn-warning">
        						<h5 class="modal-title" id="largeModalLabel">Consulta de detalhes do Equipamento</h5>
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        							<span aria-hidden="true">&times;</span>
        						</button>
        					</div>
        					<div class="modal-body">
							<?php
								foreach ($equipamentos as $equipamento) {
									echo form_open();
								?>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="select-tpequipamento"><strong>Tipo de equipamento</strong></label>
        										<select id="select-tpequipamento" name="select-tpequipamento" disabled class="form-control" autofocus>
        											<option value="">'.$equipamento->tipoequipamento.'</option>
        										</select>
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-teamviewer"><strong>Teamviewer</strong></label>
        										<input type="text" id="txt-teamviewer" name="txt-teamviewer" disabled value="' . $equipamento->teamviewer . '" class="form-control">
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-patrimonio"><strong>Patrimônio</strong></label>
        										<input type="text" id="txt-patrimonio" name="txt-patrimonio" disabled value="' . $equipamento->patrimonio . '" class="form-control">
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-usuario"><strong>Usuário</strong></strong></label>
        										<input type="text" id="txt-usuario" name="txt-usuario" disabled value="' . $equipamento->usuario . '" class="form-control">
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-ip"><strong>IP</strong></label>
        										<input type="text" id="txt-ip" name="txt-ip" disabled value="' . $equipamento->ip . '" class="form-control">
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-host"><strong>Host</strong></label>
        										<input type="text" id="txt-host" name="txt-host" disabled value="' . $equipamento->host . '" class="form-control">
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-modelo"><strong>Modelo</strong></label>
        										<input type="text" id="txt-modelo" name="txt-modelo" disabled value="' . $equipamento->modelo . '" class="form-control">
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-serial"><strong>Serial</strong></label>
        										<input type="text" id="txt-serial" name="txt-serial" disabled value="' . $equipamento->serial . '" class="form-control">
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-processador"><strong>Processador</strong></label>
        										<input type="text" id="txt-processador" name="txt-processador" disabled value="' . $equipamento->processador . '" class="form-control">
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-telamonitor"><strong>Tela do Monitor</strong></label>
        										<input type="text" id="txt-telamonitor" name="txt-telamonitor" disabled value="' . $equipamento->telamonitor . '" class="form-control">
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-hd"><strong>HD</strong></label>
        										<input type="text" id="txt-hd" name="txt-hd" disabled value="' . $equipamento->hd . '" class="form-control">
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-ram"><strong>RAM</strong></label>
        										<input type="text" id="txt-ram" name="txt-ram" disabled value="' . $equipamento->ram . '" class="form-control">
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-maclan"><strong>MAC LAN</strong></label>
        										<input type="text" id="txt-maclan" name="txt-maclan" disabled value="' . $equipamento->mac . '" class="form-control">
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-macwifi"><strong>MAC WI-FI</strong></label>
        										<input type="text" id="txt-macwifi" name="txt-macwifi" disabled value="' . $equipamento->macw . '" class="form-control">
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-macbluetooth"><strong>MAC BLUETOOTH</strong></label>
        										<input type="text" id="txt-macbluetooth" name="txt-macbluetooth" disabled value="' . $equipamento->macb . '" class="form-control">
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="select-fabricante"><strong>Fabricante</strong></label>
        										<select id="select-fabricante" name="select-fabricante" disabled class="form-control">
        											<option value="">'.$equipamento->fabricantesesc.'</option>
        										</select>
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="select-regional"><strong>Regional</strong></label>
        										<select id="select-regional" name="select-regional" disabled class="form-control">
        											<option value="">'.$equipamento->regionalsesc.'</option>
        										</select>
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="select-sos"><strong>Sistema Opeacional</strong></label>
        										<select id="select-sos" name="select-sos" disabled class="form-control">
        											<option value="">'.$equipamento->sosesc.'</option>
        										</select>
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="select-status"><strong>Status</strong></label>
        										<select id="select-status" name="select-status" disabled class="form-control">
        											<option value="">'.$equipamento->statussesc.'</option>
        										</select>
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="select-localizacao"><strong>Localização</strong></label>
        										<select id="select-localizacao" name="select-localizacao" disabled class="form-control">
        											<option value="">'.$equipamento->localizacaosesc.'</option>
        										</select>
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="select-unidade"><strong>Unidade</strong></label>
        										<select id="select-unidade" name="select-unidade" disabled class="form-control">
        											<option value="">'.$equipamento->unidadessesc.'</option>
        										</select>
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="select-conexao"><strong>Conexão</strong></label>
        										<select id="select-conexao" name="select-conexao" disabled class="form-control">
        											<option value="">'.$equipamento->conexaosesc.'</option>
        										</select>
        									</div>
        								</div>
        							</div>
        							<div class="row">
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="select-outsourcing"><strong>Outsourcing</strong></label>
        										<select id="select-outsourcing" name="select-outsourcing" disabled class="form-control">
        											<option value="">'.$equipamento->outsourcing.'</option>
        										</select>
        									</div>
        								</div>
        								<div class="col-sm-6">
        									<div class="form-group">
        										<label id="txt-observacao"><strong>Observação</strong></label>
        										<textarea id="txt-observacao" name="txt-observacao" disabled class="form-control">'.$equipamento->obs.'</textarea>
        									</div>
        								</div>
        							</div>
        						<?php
									echo form_close();
								}
								?>
        					</div>
        					<div class="modal-footer">
        						<button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
        					</div>
        				</div>
        			</div>
        		</div> -->
        		<!-- Launch Modal Excluir -->
        		<!-- <div class="modal fade excluir-modal-'.$equipamento->idequipamento .'" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
        			<div class="modal-dialog modal-lg">
        				<div class="modal-content">
        					<div class="modal-header btn-danger">
        						<h5 class="modal-title" id="mediummodalLabel">Exclusão de Equipamento</h5>
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        							<span aria-hidden="true">&times;</span>
        						</button>
        					</div>
        					<div class="modal-body">
        						<h4>Deseja Excluir o Equipamento de patrimônio <?= $equipamento->patrimonio ?>?</h4>
        						<p>Após Excluido o Equipamento de patrimônio <b><?= $equipamento->patrimonio ?></b>, o mesmo não ficara mais disponível no Sistema.</p>
        						<p>Todos os itens relacionados ao equipamento <b><?= $equipamento->patrimonio ?></b> serão afetados e não aparecerão no sistema até que sejam editados.</p>
        					</div>
        					<div class="modal-footer">
        						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        						<a type="button" class="btn btn-danger" href="<? base_url("equipamentos/excluir/".md5($equipamento->idequipamento))?>">Excluir</a>
        					</div>
        				</div>
        			</div>
        		</div> -->
