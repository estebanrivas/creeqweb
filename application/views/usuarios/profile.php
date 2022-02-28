<!-- PAGE CONTENT-->
<div class="page-content--bgf7">


    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title mb-3">Profile Card</strong>
                        </div>
                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <?php
                                if ($this->session->userdata('img') == 1) {
                                    ?>
                                <img class="rounded-circle mx-auto d-block" src="<?php echo base_url() . "assets/"; ?>images/usuarios/<?php echo md5($this->session->userdata('idusuario')) . '.jpg' ?>" alt="<?php echo $this->session->userdata('nome') ?>" />
                                <?php
                                } else {
                                    ?>
                                <img class="rounded-circle mx-auto d-block" src="<?php echo base_url() . "assets/"; ?>images/semFoto.png" alt="<?php echo $this->session->userdata('nome') ?>" />
                                <?php
                                }
                                ?>

                            </div>
                            <div class="mx-auto d-block">
                                <!-- <img class="rounded-circle mx-auto d-block" src="<?php echo base_url() . "assets/"; ?>images/icon/avatar-01.jpg" alt="Card image cap"> -->
                                <h4 class="text-sm-center mt-2 mb-1"><?php echo $this->session->userdata('nome') ?></h4>
                                <div class="location text-sm-center">
                                    <?php echo $this->session->userdata('email') ?>
                                </div>
                            </div>
                            <hr>
                            <div class="card-text text-sm-center">
                                <a href="#">
                                    <i class="fab fa-facebook-f pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-twitter pr-1"></i>
                                </a>
                                <a href="#">
                                    <i class="fab fa-linkedin-in pr-1"></i>
                                </a>
                                <!-- <a href="#">
                                    <i class="fab fa-pinterest pr-1"></i>
                                </a> -->
                                <a href="#">
                                    <i class="fab fa-instagram pr-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>