        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">


            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h3 class="title-5 m-b-35">Listagem geral de <?php echo $subtitulo ?></h3>
                            <div class="row m-b-15">
                                <!-- <a href="equipamentos/exportaexcel"><button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Exportação para Excel"><i class="zmdi zmdi-download"></i> Exportação para Excel</button></a> -->
                            </div>
                            <div class="table-responsive table--no-card">
                                <?php
                                $this->table->set_heading("#", "Patrimônio", "Serial", "IP", "Unidade", "HOST", "Localização", "ONLINE");
                                $this->table->set_template(array(
                                'table_open' => '<table id="memListOutsourcingap" class="table table-borderless table-striped table-earning">'
                                ));
                                echo $this->table->generate();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            