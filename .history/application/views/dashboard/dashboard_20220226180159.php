        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">

        	<!-- WELCOME-->
        	<section class="welcome p-t-10">
        		<div class="container">
        			<div class="row">
        				<div class="col-md-12">
        					<h1 class="title-4">Seja Bem vindo
        						<span><?= $this->session->userdata('nome') ?>!</span><?= $this->session->userdata('idregioanl') ?>
        					</h1>
        					<hr class="line-seprate">
							<p><?= echo CI?></p>
        				</div>
        			</div>
        		</div>
        	</section>
			<!-- END WELCOME-->
			<!-- INICIO ESTATISTICAS -->
<?php if ($this->session->userdata('idregionais') == 4) {?>
		
        	<!-- INICIO REGIONAL TRIANGULO -->
			<!-- ESTATÍSTICA -->
			
        	<section class="statistic statistic2">
        		<div class="container">
        			<div class="row">
        				<div class="col-md-12">
        					<h3 class="title-5 m-b-35">Estatística</h3>
        				</div>
        			</div>
					
        			<div class="row">
        				<div class="col-md-6 col-lg-3">
        					<div class="statistic__item statistic__item--green">
        						<h2 class="number"><?php echo $this->modelequipamentos->contardesktop() ?></h2>
        						<span class="desc"><strong>Desktops ATIVOS cadastrados na regional Triângulo</strong></span>
        						<div class="icon">
        							<i class="zmdi zmdi-desktop-windows"></i>
        						</div>
        					</div>
        				</div>
        				<div class="col-md-6 col-lg-3">
        					<div class="statistic__item statistic__item--orange">
        						<h2 class="number"><?php echo $this->modelequipamentos->contartablet() ?></h2>
        						<span class="desc"><strong>Tablets cadastrados na regional Triângulo</strong></span>
        						<div class="icon">
        							<i class="zmdi zmdi-tablet-mac"></i>
        						</div>
        					</div>
        				</div>
        				<div class="col-md-6 col-lg-3">
        					<div class="statistic__item statistic__item--blue">
        						<h2 class="number"><?php echo $this->modelequipamentos->soma_notebook_dashboard() ?></h2>
        						<span class="desc"><strong>notebooks cadastrados na regional Triângulo</strong></span>
        						<div class="icon">
        							<i class="zmdi zmdi-laptop"></i>
        						</div>
        					</div>
        				</div>
        				<div class="col-md-6 col-lg-3">
        					<div class="statistic__item statistic__item--red">
        						<h2 class="number"><?php echo $this->modelequipamentos->lista_outsourcing_dashboard() ?></h2>
        						<span class="desc"><strong>Impressoras ATIVAS Outsourcing na regional Triângulo</strong></span>
        						<div class="icon">
        							<i class="zmdi zmdi-print"></i>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</section>
			<!-- FIM ESTATÍSTICA-->
			<!-- FIM REGIONAL TRIANGULO -->
<?php } if ($this->session->userdata('idregionais') == 2) { ?>
	<!-- INICIO REGIONAL SUL -->
	<!-- ESTATÍSTICA -->
	
	<section class="statistic statistic2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-5 m-b-35">Estatística</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--green">
						<h2 class="number"><?php echo $this->modelequipamentos->contardesktop_sul() ?></h2>
						<span class="desc"><strong>Desktops ATIVOS cadastrados na regional SUDESTE</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-desktop-windows"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--orange">
						<h2 class="number"><?php echo $this->modelequipamentos->contartablet_sul() ?></h2>
						<span class="desc"><strong>Tablets cadastrados na regional SUDESTE</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-tablet-mac"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--blue">
						<h2 class="number"><?php echo $this->modelequipamentos->soma_notebook_dashboard_sul() ?></h2>
						<span class="desc"><strong>notebooks cadastrados na regional SUDESTE</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-laptop"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--red">
						<h2 class="number"><?php echo $this->modelequipamentos->lista_outsourcing_dashboard_sul() ?></h2>
						<span class="desc"><strong>Impressoras ATIVAS Outsourcing na regional SUDESTE</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-print"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FIM ESTATÍSTICA-->
	<!-- FIM REGIONAL SUL -->
<?php } if ($this->session->userdata('idregionais') == 8) { ?>
	<!-- INICIO REGIONAL BH -->
	<!-- ESTATÍSTICA -->
	
	<section class="statistic statistic2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-5 m-b-35">Estatística</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--green">
						<h2 class="number"><?php echo $this->modelequipamentos->contardesktop_bh() ?></h2>
						<span class="desc"><strong>Desktops ATIVOS cadastrados na regional BH</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-desktop-windows"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--orange">
						<h2 class="number"><?php echo $this->modelequipamentos->contartablet_bh() ?></h2>
						<span class="desc"><strong>Tablets cadastrados na regional BH</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-tablet-mac"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--blue">
						<h2 class="number"><?php echo $this->modelequipamentos->soma_notebook_dashboard_bh() ?></h2>
						<span class="desc"><strong>notebooks cadastrados na regional BH</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-laptop"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--red">
						<h2 class="number"><?php echo $this->modelequipamentos->lista_outsourcing_dashboard_bh() ?></h2>
						<span class="desc"><strong>Impressoras ATIVAS Outsourcing na regional BH</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-print"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FIM ESTATÍSTICA BH-->
<?php } if ($this->session->userdata('idregionais') == 6) {?>
	<!-- INICIO REGIONAL NORDESTE -->
	<!-- ESTATÍSTICA -->
	
	<section class="statistic statistic2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-5 m-b-35">Estatística</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--green">
						<h2 class="number"><?php echo $this->modelequipamentos->contardesktop_nordeste() ?></h2>
						<span class="desc"><strong>Desktops ATIVOS cadastrados na regional NORDESTE</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-desktop-windows"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--orange">
						<h2 class="number"><?php echo $this->modelequipamentos->contartablet_nordeste() ?></h2>
						<span class="desc"><strong>Tablets cadastrados na regional NORDESTE</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-tablet-mac"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--blue">
						<h2 class="number"><?php echo $this->modelequipamentos->soma_notebook_dashboard_nordeste() ?></h2>
						<span class="desc"><strong>notebooks cadastrados na regional NORDESTE</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-laptop"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--red">
						<h2 class="number"><?php echo $this->modelequipamentos->lista_outsourcing_dashboard_nordeste() ?></h2>
						<span class="desc"><strong>Impressoras ATIVAS Outsourcing na regional NORDESTE</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-print"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FIM ESTATÍSTICA NORDESTE-->
<?php } if ($this->session->userdata('idregionais') == 7) {?>
	<!-- INICIO REGIONAL METROPOLITANA -->
	<!-- ESTATÍSTICA -->
	
	<section class="statistic statistic2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-5 m-b-35">Estatística</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--green">
						<h2 class="number"><?php echo $this->modelequipamentos->contardesktop_metropolitana() ?></h2>
						<span class="desc"><strong>Desktops ATIVOS cadastrados na regional METROPOLITANA</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-desktop-windows"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--orange">
						<h2 class="number"><?php echo $this->modelequipamentos->contartablet_metropolitana() ?></h2>
						<span class="desc"><strong>Tablets cadastrados na regional METROPOLITANA</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-tablet-mac"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--blue">
						<h2 class="number"><?php echo $this->modelequipamentos->soma_notebook_dashboard_metropolitana() ?></h2>
						<span class="desc"><strong>notebooks cadastrados na regional METROPOLITANA</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-laptop"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--red">
						<h2 class="number"><?php echo $this->modelequipamentos->lista_outsourcing_dashboard_metropolitana() ?></h2>
						<span class="desc"><strong>Impressoras ATIVAS Outsourcing na regional METROPOLITANA</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-print"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FIM ESTATÍSTICA METROPOLITANA-->
<?php } if ($this->session->userdata('idregionais') == 9){?>
	<!-- INICIO REGIONAL CAPITAL -->
	<!-- ESTATÍSTICA -->
	
	<section class="statistic statistic2">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="title-5 m-b-35">Estatística</h3>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--green">
						<h2 class="number"><?php echo $this->modelequipamentos->contardesktop_capital() ?></h2>
						<span class="desc"><strong>Desktops ATIVOS cadastrados na regional CAPITAL</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-desktop-windows"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--orange">
						<h2 class="number"><?php echo $this->modelequipamentos->contartablet_capital() ?></h2>
						<span class="desc"><strong>Tablets cadastrados na regional CAPITAL</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-tablet-mac"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--blue">
						<h2 class="number"><?php echo $this->modelequipamentos->soma_notebook_dashboard_capital() ?></h2>
						<span class="desc"><strong>notebooks cadastrados na regional CAPITAL</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-laptop"></i>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-3">
					<div class="statistic__item statistic__item--red">
						<h2 class="number"><?php echo $this->modelequipamentos->lista_outsourcing_dashboard_capital() ?></h2>
						<span class="desc"><strong>Impressoras ATIVAS Outsourcing na regional CAPITAL</strong></span>
						<div class="icon">
							<i class="zmdi zmdi-print"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FIM ESTATÍSTICA CAPITAL-->
<?php }?>
			<!-- FIM ESTATISTICAS -->

        	<!-- GRÁFICOS TOTAIS -->
        	<section class="statistic-chart">
        		<div class="container">
        			<div class="row">
        				<div class="col-md6 col-lg-6">
        					<div class="au-card m-b-30">
        						<div class="au-card-inner">
        							<!-- <h3 class="title-2 m-b-40">Desktop Regionais</h3> -->
        							<canvas id="dsktregionais"></canvas>
        						</div>
        					</div>
        				</div>
        				<div class="col-md6 col-lg-6">
        					<div class="au-card m-b-30">
        						<div class="au-card-inner">
        							<!-- <h3 class="title-2 m-b-40">Outsourcing Regionais</h3> -->
        							<canvas id="impregionais"></canvas>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</section>
        	<!-- FIM GRÁFICOS TOTAIS -->

			<!-- GRÁFICOS TOTAIS -->
        	<section class="statistic-chart">
        		<div class="container">
        			<div class="row">
        				<div class="col-md6 col-lg-6">
        					<div class="au-card m-b-30">
        						<div class="au-card-inner">
        							<!-- <h3 class="title-2 m-b-40">Desktop Regionais</h3> -->
        							<canvas id="tonera3"></canvas>
        						</div>
        					</div>
        				</div>
        				<div class="col-md6 col-lg-6">
        					<div class="au-card m-b-30">
        						<div class="au-card-inner">
        							<!-- <h3 class="title-2 m-b-40">Outsourcing Regionais</h3> -->
        							<canvas id="chamadosa3"></canvas>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</section>
        	<!-- FIM GRÁFICOS TOTAIS -->

        	<!-- CARDS INFORMATIVOS -->
        	<div class="container-fluid">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="card">
								<a href="<?php echo base_url('/serverside') ?>" title="Listagem Geral"><img class="card-img-top" src="<?php echo base_url() . "assets/"; ?>images/infra_01_sem_barra.jpg" alt="Card image cap"></a>
								<div class="card-body">
									<h4 class="card-title mb-3">Equipamentos</h4>
									<p class="card-text"><a href="<?php echo base_url('/serverside') ?>" title="Listagem Geral">Lista completa dos equipamentos cadastrados em nossa base de dados.</a></p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<img class="card-img-top" src="<?php echo base_url() . "assets/"; ?>images/infra_04_sem_barra.jpg" alt="Card image cap">
								<div class="card-body">
									<h4 class="card-title mb-3">Knowledge</h4>
									<p class="card-text">Base de conhecimento compartilhada de procedimentos internos.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<img class="card-img-top" src="<?php echo base_url() . "assets/"; ?>images/infra_03_sem_barra.jpg" alt="Card image cap">
								<div class="card-body">
									<h4 class="card-title mb-3">Infraestrutura</h4>
									<p class="card-text">Servidores e equipamentos essenciais para desenvolver as atividades de infraestrutura.</p>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="card">
								<img class="card-img-top" src="<?php echo base_url() . "assets/"; ?>images/infra_02_sem_barra.jpg" alt="Card image cap">
								<div class="card-body">
									<h4 class="card-title mb-3">Links</h4>
									<p class="card-text">Links de sites de conhecimento comum e de parceiros do Sesc Minas Gerais.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
        	</div>
        	<!-- FIM CARDS INFORMATIVOS -->


