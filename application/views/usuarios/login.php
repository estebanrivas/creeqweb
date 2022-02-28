        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="<?= base_url() . "assets/"; ?>images/icon/creeq_colorido.svg" width="250" alt="Creeq" />
                            </a>
                        </div>
                        <div class="login-form">
                            <div id="mensagemUsuario">
                            <?= $this->session->userdata('msg'); ?>
                            <?= $this->session->userdata('erro_login'); ?>
                            <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                            </div>
                            <?= form_open('usuarios/login');?>
                                <div class="form-group">
                                    <label><strong>Login</strong></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input class="form-control au-input au-input--full" type="txt" id="txt-login" name="txt-login" placeholder="Login" autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label><strong>Senha</strong></label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-asterisk"></i>
                                        </div>
                                        <input class="form-control au-input au-input--full" type="password" id="txt-senha" name="txt-senha" placeholder="Senha">
                                    </div>
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue2 m-b-20" type="submit">Acessar</button>
                            <?= form_close(); ?>
                         </div>
                    </div>
                </div>
            </div>
           