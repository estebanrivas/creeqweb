        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">


            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <h3 class="title-5 m-b-35"><?php echo 'Alterar '.$subtitulo ?></h3>
                                <div class="card">
                                    <div class="card-header">
                                        <strong><?php echo 'Alterar '.$subtitulo ?></strong>
                                    </div>
                                    <div class="card-body card-block">
									<div id="mensagemUsuario">
									<?= $this->session->userdata('msg'); ?>
									<?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
									</div>
                                            <?php
                                                foreach ($usuarios as $usuario) {
                                                echo form_open('usuarios/salvar_alteracoes/'.md5($usuario->idusuario));
                                            ?>
                                            <div class="form-group">
                                                <label id="lbl-ativo">Ativo</label>
                                                <select id="select-ativo" name="select-ativo" class="form-control">
                                                    <option value="1" <?php if ($usuario->ativo == 1) {echo "selected";} ?>>SIM</option>
                                                    <option value="0" <?php if ($usuario->ativo == 0) {echo "selected";} ?>>NÃO</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-nivel">Categoria</label>
                                                <select id="select-nivel" name="select-nivel" class="form-control">
                                                    <?php foreach ($niveis as $nivel) { ?>
                                                    <option value="<?php echo $nivel->idnivel ?>" <?php if ($nivel->idnivel == $usuario->nivel) {echo "selected";} ?>><?php echo $nivel->nivel_descricao ?></option><?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-nome">Nome do Usuário</label>
                                                <input type="text" id="txt-nome" name="txt-nome" placeholder="Digite o nome..." class="form-control" autofocus value="<?php echo $usuario->nome ?>">
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-login">Login</label>
                                                <input type="text" id="txt-login" name="txt-login" placeholder="Digite o login..." class="form-control" value="<?php echo $usuario->login ?>">
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-regional"><strong>Regional</strong></label>
                                                <select id="select-regional" name="select-regional" class="form-control">
                                                    <?php foreach ($regionais as $regional) { ?>
                                                    <option value="<?php echo $regional->idregional ?>" <?php if ($regional->idregional == $usuario->idregional) { echo "selected"; } ?>><?php echo $regional->regional ?></option>
                                                    <?php
                                                        } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-email">Email</label>
                                                <input type="text" id="txt-email" name="txt-email" placeholder="Digite o email..." class="form-control" value="<?php echo $usuario->email ?>">
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-senha">Senha</label>
                                                <input type="password" id="txt-senha" name="txt-senha" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-confirmasenha">Confirma Senha</label>
                                                <input type="password" id="txt-confirmasenha" name="txt-confirmasenha" class="form-control">
                                            </div>
                                            <input type="hidden" name="txt-idusuario" id="txt-idusuario" value="<?php echo $usuario->idusuario ?>">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-plus"></i>Alterar</button>
                                            <a href="<?php echo base_url('/usuarios') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"></i> Cancelar</a>
                                            <?php
                                                echo form_close();
                                            ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <h3 class="title-5 m-b-35">Alterar / Incluir - <?php echo $foto ?></h3>
                                <div class="card">
                                    <div class="card-header">
                                        <strong><?php echo 'Alterar / Incluir - ' . $foto ?></strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="col-lg-3 col-lg-offset-3">
                                            <?php
                                            if ($usuario->img == 1) {
                                                echo img("assets/images/usuarios/" . md5($usuario->idusuario) . ".jpg");
                                            } else {
                                                echo img("assets/images/semFoto.png");
                                            }
                                            ?>
                                        </div>
                                        <div class="col-lg-12">
                                            <?php
                                                $divopen = '<div class="form-group">';
                                                $divclose = '</div>';
                                                echo form_open_multipart('usuarios/nova_foto');
                                                echo form_hidden('idusuario', md5($usuario->idusuario));
                                                echo $divopen;
                                                $imagem = array('name' => 'userfile', 'id' => 'userfile', 'class' => 'form-control');
                                                echo form_upload($imagem);
                                                echo $divclose;
                                                echo $divopen;
                                                $botao = array('name' => 'btn_adicionar', 'id' => 'btn_adicionar', 'class' => 'btn btn-primary btn-sm', 'value' => 'Adicionar nova Imagem');
												echo form_submit($botao);
												$linkcancelar = array('class' => 'btn btn-secondary btn-sm');
												echo anchor('/usuarios', '<i class="fa fa-reply"></i> Cancelar</a>', $linkcancelar);
                                                echo $divclose;
                                                echo form_close();
                                            }
                                            ?>
                                        </div>
                                   </div>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
