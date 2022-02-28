        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">


        <section class="p-t-20">
                <div class="container">
                    <div class="row">
                     <div class="col-md-6 offset-md-3">
                        <h3 class="title-5 m-b-35"><?= 'Localização de '.$subtitulo ?></h3>
                        <div class="card">
                            <div class="card-header">
                                <strong><?= 'Localização de ' . $subtitulo ?> por USUÁRIO, PATRIMÔNIO, HOST e UNIDADE</strong>
                            </div>
                            <div class="card-body card-block">
                                <div id="mensagemUsuario"><?= $this->session->userdata('msg'); ?></div>
                                <div class="form-header">
                                    <?= form_open('equipamentos/pesquisar', array('class' => 'form-header')); ?>
                                    <input class="au-input au-input--w435" type="text" id="txt-pesquisar" name="txt-pesquisar" placeholder="Pesquisar por usuário, patrimônio, host e unidade" autofocus />
                                    <button class="au-btn--submit" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo base_url() . "assets/"; ?>images/infra_01_sem_barra.jpg" alt="Card image cap">
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
