<!-- HEADER DESKTOP-->
<header class="header-desktop3 d-none d-lg-block">
	<div class="section__content section__content--p35">
		<div class="header3-wrap">
			<div class="header__logo">
				<a href="<?php echo base_url() ?>">
					<img src="<?php echo base_url() . "assets/"; ?>images/icon/creeq_colorido2.svg" alt="MasterCreeq" />&nbsp;<span class="badge badge-success"><?php echo $versao ?></span>
				</a>
			</div>
			<div class="header__navbar">
				<ul class="list-unstyled">
					<li class="has-sub">
						<a href="#">
							<i class="fas fa-table"></i>Cadastros
							<span class="bot-line"></span>
						</a>
						<ul class="header3-sub-list list-unstyled">
							<li>
								<a href="<?php echo base_url('/cadeados') ?>"><i class="fas fa-lock"></i>Cadeados</a>
							</li>
							<li>
								<a href="<?php echo base_url('/conexoes') ?>"><i class="fas fa-wrench"></i>Conexões</a>
							</li>
							<li>
								<a href="<?php echo base_url('/contatos') ?>"><i class="fas fa-users"></i>Contatos</a>
							</li>
							<li>
								<a href="<?php echo base_url('/equipamentos') ?>"><i class="fas fa-tools"></i>Equipamentos</a>
							</li>
							<li>
								<a href="<?php echo base_url('/fabricante') ?>"><i class="fas fa-industry"></i>Fabricante</a>
							</li>
							<li>
								<a href="<?php echo base_url('/localizacoes') ?>"><i class="fas fa-search-location"></i>Localizações</a>
							</li>
							<li>
								<a href="<?php echo base_url('/regional') ?>"><i class="fas fa-map-marked-alt"></i>Regional</a>
							</li>
							<li>
								<a href="<?php echo base_url('/soperacional') ?>"><i class="fab fa-windows"></i>S. Operacional</a>
							</li>
							<li>
								<a href="<?php echo base_url('/status') ?>"><i class="fas fa-thumbs-up"></i>Status</a>
							</li>
							<li>
								<a href="<?php echo base_url('/tpequipamento') ?>"><i class="fas fa-microchip"></i>Tipos de Equipamento</a>
							</li>
							<li>
								<a href="<?php echo base_url('/unidade') ?>"><i class="fas fa-home"></i>Unidade</a>
							</li>
							<li>
								<a href="<?php echo base_url('/usuarios') ?>"><i class="fas fa-user-ninja"></i>Usuários</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="<?php echo base_url('/equipamentos/localizar') ?>">
							<i class="fas fa-search"></i>
							<span class="bot-line"></span>Localizar</a>
					</li>
					<li class="has-sub">
						<a href="#">
							<i class="fas fa-print"></i>
							<span class="bot-line"></span>Outsourcing</a>
						<ul class="header3-sub-list list-unstyled">
							<li>
								<a href="<?php echo base_url('/outsourcing/outap') ?>">Access Point Microcity</a>
							</li>
							<li>
								<a href="<?php echo base_url('/outsourcing') ?>">Impressoras Triângulo</a>
							</li>
							<li>
								<a href="<?php echo base_url('/outsourcing/outbh') ?>">Impressoras BH</a>
							</li>
							<li>
								<a href="<?php echo base_url('/outsourcing/outnordeste') ?>">Impressoras Nordeste</a>
							</li>
							<li>
								<a href="<?php echo base_url('/outsourcing/outsudeste') ?>">Impressoras Sudeste</a>
							</li>
							<li>
								<a href="<?php echo base_url('/outsourcing/outmetropolitana') ?>">Impressoras Metropolitana</a>
							</li>
							<li>
								<a href="<?php echo base_url('/outsourcing/outsede') ?>">Impressoras Sede</a>
							</li>
							<li>
								<a href="<?php echo base_url('/outsourcing/outcftv') ?>">CFTV</a>
							</li>
						</ul>
					</li>
					<!-- <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-copy"></i>
                            <span class="bot-line"></span>SIMPRESS</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="<?php echo base_url('/simpress') ?>">SIMPRESS Triângulo - FIM</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/simpress/simpressbh') ?>">SIMPRESS BH - FIM</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/simpress/simpressnordeste') ?>">SIMPRESS Nordeste - FIM</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/simpress/simpresssudeste') ?>">SIMPRESS Sudeste - FIM</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/simpress/simpressmetropolitana') ?>">SIMPRESS Metropolitana - FIM</a>
                            </li>
                        </ul>
                    </li> -->
					<!-- <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-copy"></i>
                            <span class="bot-line"></span>ONLINE</a>
                        <ul class="header3-sub-list list-unstyled">
                            <li>
                                <a href="<?php echo base_url('/onlineequipamentos/outap') ?>">AP MICROCITY</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/onlineequipamentos') ?>">IMP TRIÂNGULO</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/onlineequipamentos/outsudeste') ?>">IMP SUDESTE</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/onlineequipamentos/outnordeste') ?>">IMP NORDESTE</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/onlineequipamentos/outbh') ?>">IMP BH</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/onlineequipamentos/outmetropolitana') ?>">IMP METROPOLITANA</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/onlineequipamentos/outsede') ?>">IMP CAPITAL</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('/onlineequipamentos/outcftv') ?>">CFTV</a>
                            </li>
                        </ul>
                    </li> -->
					<!-- <li class="has-sub">
                    <a href="#">
                        <i class="fas fa-copy"></i>
                        <span class="bot-line"></span>Patrimônio</a>
                        <ul class="header3-sub-list list-unstyled">
                        <li>
                            <a href="#">Baixa</a>
                        </li>
                        <li>
                            <a href="#">Empréstimo</a>
                        </li>
                        <li>
                            <a href="#">Transferência</a>
                        </li>
                    </ul>
                    </li> -->
					<li class="has-sub">
						<a href="#">
							<i class="fas fa-file-alt"></i>
							<span class="bot-line"></span>Lista</a>
						<ul class="header3-sub-list list-unstyled">
							<li>
								<a href="<?php echo base_url('/serverside') ?>">Listagem Geral</a>
							</li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="#">
							<i class="fas fa-clipboard-check"></i>
							<span class="bot-line"></span>CONTROL</a>
						<ul class="header3-sub-list list-unstyled">
							<li>
								<a href="<?php echo base_url('/outsourcing/toner') ?>">Cadastrar Pedido de Toner</a>
							</li>
							<li>
								<a href="<?php echo base_url('/outsourcing/listagemtoner') ?>">Listagem Pedidos de Toner</a>
							</li>
							<li>
								<a href="<?php echo base_url('/chamadoout') ?>">Cadastrar Chamado A3</a>
							</li>
							<li>
								<a href="<?php echo base_url('/chamadoout/listagemchamadosout') ?>">Listagem de Chamados A3</a>
							</li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="#">
							<i class="fas fa-link"></i>
							<span class="bot-line"></span>Links</a>
						<ul class="header3-sub-list list-unstyled">
							<!-- <li>
                                <a href="http://atendimento.simpress.com.br" target="_blank">SIMPRESS</a>
                            </li> -->
							<li>
								<a href="https://suporte.visual.com.br/" target="_blank">VISUAL SISTEMAS</a>
							</li>
							<li>
								<a href="http://servicedesk.sescmg.com.br/" target="_blank">SERVICEDESK</a>
							</li>
							<li>
								<a href="http://181.213.97.139:8085/newdataservice/" target="_blank">REPROCÓPIA A3</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="header_button">
				<div class="account-wrap">
					<div class="account-item account-item--style2 clearfix js-item-menu">
						<div class="image">
							<?php
							if ($this->session->userdata('img') == 1) {
							?>
								<img src="<?php echo base_url() . "assets/"; ?>images/usuarios/<?php echo md5($this->session->userdata('idusuario')) . '.jpg' ?>" alt="<?php echo $this->session->userdata('nome') ?>" />
							<?php
							} else {
							?>
								<img src="<?php echo base_url() . "assets/"; ?>images/semFoto.png" alt="<?php echo $this->session->userdata('nome') ?>" />
							<?php
							}
							?>
						</div>
						<div class="content">
							<a class="js-acc-btn" href="#"><?php echo $this->session->userdata('nome') ?></a>
						</div>
						<div class="account-dropdown js-dropdown">
							<div class="info clearfix">
								<div class="image">
									<?php
									if ($this->session->userdata('img') == 1) {
									?>
										<img src="<?php echo base_url() . "assets/"; ?>images/usuarios/<?php echo md5($this->session->userdata('idusuario')) . '.jpg' ?>" alt="<?php echo $this->session->userdata('nome') ?>" />
									<?php
									} else {
									?>
										<img src="<?php echo base_url() . "assets/"; ?>images/semFoto.png" alt="<?php echo $this->session->userdata('nome') ?>" />
									<?php
									}
									?>
								</div>
								<div class="content">
									<h5 class="name">
										<a href="<?php echo base_url('/usuarios/profile') ?>"><?php echo $this->session->userdata('nome') ?></a>
									</h5>
									<span class="email"><?php echo $this->session->userdata('email') ?></span>
								</div>
							</div>
							<div class="account-dropdown__footer">
								<a href="<?php echo base_url('usuarios/logout') ?>">
									<i class="zmdi zmdi-power"></i>Logout</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!-- END HEADER DESKTOP-->

<!-- HEADER MOBILE-->
<header class="header-mobile header-mobile-2 d-block d-lg-none">
	<div class="header-mobile__bar">
		<div class="container-fluid">
			<div class="header-mobile-inner">
				<a class="logo" href="<?php echo base_url() ?>">
					<img src="<?php echo base_url() . "assets/"; ?>images/icon/creeq_colorido2.svg" alt="MasterCreeq" />
				</a>
				<button class="hamburger hamburger--slider" type="button">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
			</div>
		</div>
	</div>
	<nav class="navbar-mobile">
		<div class="container-fluid">
			<ul class="navbar-mobile__list list-unstyled">
				<li class="has-sub">
					<a class="js-arrow" href="#">
						<i class="fas fa-table"></i>Cadastros</a>
					<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
						<li>
							<a href="<?php echo base_url('/cadeados') ?>"><i class="fas fa-lock"></i>Cadeados</a>
						</li>
						<li>
							<a href="<?php echo base_url('/conexoes') ?>"><i class="fas fa-wrench"></i>Conexões</a>
						</li>
						<li>
							<a href="<?php echo base_url('/contatos') ?>"><i class="fas fa-users"></i>Contatos</a>
						</li>
						<li>
							<a href="<?php echo base_url('/equipamentos') ?>"><i class="fas fa-tools"></i>Equipamentos</a>
						</li>
						<li>
							<a href="<?php echo base_url('/fabricante') ?>"><i class="fas fa-industry"></i>Fabricante</a>
						</li>
						<li>
							<a href="<?php echo base_url('/localizacoes') ?>"><i class="fas fa-search-location"></i>Localizações</a>
						</li>
						<li>
							<a href="<?php echo base_url('/regional') ?>"><i class="fas fa-map-marked-alt"></i>Regional</a>
						</li>
						<li>
							<a href="<?php echo base_url('/soperacional') ?>"><i class="fab fa-windows"></i>S. Operacional</a>
						</li>
						<li>
							<a href="<?php echo base_url('/status') ?>"><i class="fas fa-thumbs-up"></i>Status</a>
						</li>
						<li>
							<a href="<?php echo base_url('/tpequipamento') ?>"><i class="fas fa-microchip"></i>Tipos de Equipamento</a>
						</li>
						<li>
							<a href="<?php echo base_url('/unidade') ?>"><i class="fas fa-home"></i>Unidade</a>
						</li>
						<li>
							<a href="<?php echo base_url('/usuarios') ?>"><i class="fas fa-user-ninja"></i>Usuários</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo base_url('/equipamentos/localizar') ?>">
						<i class="fas fa-search"></i>
						<span class="bot-line"></span>Localizar</a>
				</li>
				<li class="has-sub">
					<a class="js-arrow" href="#">
						<i class="fas fa-print"></i>
						<span class="bot-line"></span>Outsourcing</a>
					<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
						<li>
							<a href="<?php echo base_url('/outsourcing') ?>">Impressoras Triângulo</a>
						</li>
						<li>
							<a href="<?php echo base_url('/outsourcing/outbh') ?>">Impressoras BH</a>
						</li>
						<li>
							<a href="<?php echo base_url('/outsourcing/outnordeste') ?>">Impressoras Nordeste</a>
						</li>
						<li>
							<a href="<?php echo base_url('/outsourcing/outsudeste') ?>">Impressoras Sudeste</a>
						</li>
						<li>
							<a href="<?php echo base_url('/outsourcing/outmetropolitana') ?>">Impressoras Metropolitana</a>
						</li>
						<li>
							<a href="<?php echo base_url('/outsourcing/outsede') ?>">Impressoras Sede</a>
						</li>
						<li>
							<a href="<?php echo base_url('/outsourcing/outcftv') ?>">CFTV</a>
						</li>
						<li>
							<a class="js-arrow" href="#">
								<i class="fas fa-plus"></i>
								<span class="bot-line"></span>Toner</a>
							<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
								<li>
									<a href="<?php echo base_url('/outsourcing/toner') ?>">Incluir Toner</a>
								</li>
								<li>
									<a href="<?php echo base_url('/outsourcing/listagemtoner') ?>">Listagem Toner</a>
								</li>
							</ul>
						</li>
						<li class="has-sub">
							<a href="#">
								<i class="fas fa-plus"></i>
								<span class="bot-line"></span>Chamados
							</a>
							<ul class="header3-sub-list list-unstyled">
								<li>
									<a href="<?php echo base_url() ?>">Cadastrar Chamado A3</a>
								</li>
								<li>
									<a href="<?php echo base_url() ?>">Listagem de Chamados A3</a>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<!-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>
                        <span class="bot-line"></span>SIMPRESS</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="<?php echo base_url('/simpress') ?>">SIMPRESS Triângulo - FIM</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/simpress/simpressbh') ?>">SIMPRESS BH - FIM</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/simpress/simpressnordeste') ?>">SIMPRESS Nordeste - FIM</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/simpress/simpresssudeste') ?>">SIMPRESS Sudeste - FIM</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/simpress/simpressmetropolitana') ?>">SIMPRESS Metropolitana - FIM</a>
                        </li>
                    </ul>
                </li> -->
				<!-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>
                        <span class="bot-line"></span>ONLINE</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="<?php echo base_url('/onlineequipamentos/outap') ?>">AP MICROCITY</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/onlineequipamentos') ?>">IMP TRIÂNGULO</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/onlineequipamentos/outsudeste') ?>">IMP SUDESTE</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/onlineequipamentos/outnordeste') ?>">IMP NORDESTE</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/onlineequipamentos/outbh') ?>">IMP BH</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/onlineequipamentos/outmetropolitana') ?>">IMP METROPOLITANA</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/onlineequipamentos/outsede') ?>">IMP CAPITAL</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/onlineequipamentos/outcftv') ?>">CFTV</a>
                        </li>
                    </ul>
                </li> -->

				<!-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>TROCAS</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="<?php echo base_url('/equipamentos/troca') ?>">Troca Obrigatória</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('/equipamentos/sugestao') ?>">Troca Sugerida</a>
                        </li>
                    </ul>
                </li> -->
				<!-- <li class="has-sub">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-copy"></i>Patrimônio</a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                        <li>
                            <a href="#">Baixa</a>
                        </li>
                        <li>
                            <a href="#">Empréstimo</a>
                        </li>
                        <li>
                            <a href="#">Transferência</a>
                        </li>
                    </ul>
                </li> -->
				<li class="has-sub">
					<a class="js-arrow" href="#">
						<i class="fas fa-file-alt"></i>Lista</a>
					<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
						<li>
							<a href="<?php echo base_url('/serverside') ?>">Listagem Geral</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="<?php echo base_url('/contatos') ?>">
						<i class="fas fa-users"></i>
						<span class="bot-line"></span>Contatos</a>
				</li>
				<li class="has-sub">
					<a class="js-arrow" href="#">
						<i class="fas fa-link"></i>Links</a>
					<ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
						<!-- <li>
<a href="http://atendimento.simpress.com.br" target="_blank">SIMPRESS</a>
                        </li> -->
						<li>
							<a href="https://suporte.visual.com.br/" target="_blank">VISUAL SISTEMAS</a>
						</li>
						<li>
							<a href="http://servicedesk.sescmg.com.br/" target="_blank">SERVICEDESK</a>
						</li>
						<li>
							<a href="http://181.213.97.139:8085/newdataservice/" target="_blank">REPROCÓPIA A3</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>
<div class="sub-header-mobile-2 d-block d-lg-none">
	<div class="header__tool">
		<div class="account-wrap">
			<div class="account-item account-item--style2 clearfix js-item-menu">
				<div class="image">
					<?php
					if ($this->session->userdata('img') == 1) {
					?>
						<img src="<?php echo base_url() . "assets/"; ?>images/usuarios/<?php echo md5($this->session->userdata('idusuario')) . '.jpg' ?>" alt="<?php echo $this->session->userdata('nome') ?>" />
					<?php
					} else {
					?>
						<img src="<?php echo base_url() . "assets/"; ?>images/semFoto.png" alt="<?php echo $this->session->userdata('nome') ?>" />
					<?php
					}
					?>
				</div>
				<div class="content">
					<a class="js-acc-btn" href="#"><?php echo $this->session->userdata('nome') ?></a>
				</div>
				<div class="account-dropdown js-dropdown">
					<div class="info clearfix">
						<div class="image">
							<a href="#">
								<?php
								if ($this->session->userdata('img') == 1) {
								?>
									<img src="<?php echo base_url() . "assets/"; ?>images/usuarios/<?php echo md5($this->session->userdata('idusuario')) . '.jpg' ?>" alt="<?php echo $this->session->userdata('nome') ?>" />
								<?php
								} else {
								?>
									<img src="<?php echo base_url() . "assets/"; ?>images/semFoto.png" alt="<?php echo $this->session->userdata('nome') ?>" />
								<?php
								}
								?>
							</a>
						</div>
						<div class="content">
							<h5 class="name">
								<a href="#"><?php echo $this->session->userdata('nome') ?></a>
							</h5>
							<span class="email"><?php echo $this->session->userdata('email') ?></span>
						</div>
					</div>
					<div class="account-dropdown__footer">
						<a href="<?php echo base_url('usuarios/logout') ?>">
							<i class="zmdi zmdi-power"></i>Logout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END HEADER MOBILE -->
