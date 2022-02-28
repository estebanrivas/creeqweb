        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">


            <section class="p-t-20">
                <div class="container">
                    <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <h3 class="title-5 m-b-35"> <?php echo 'Cadastro de '. $subtitulo ?> </h3>
                                <div class="card">
                                    <div class="card-header">
                                        <strong> <?php echo 'Cadastro de '. $subtitulo ?> </strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div id="mensagemUsuario"><?php echo $this->session->userdata('msg'); ?></div>
                                            <?php
                                                echo validation_errors('<div class="alert alert-danger">', '</div>');
                                                echo form_open('usuarios/inserir');
                                            ?>
                                            <div class="form-group">
                                                <label id="select-ativo"><strong>Ativo</strong></label>
                                                <select id="select-ativo" name="select-ativo" class="form-control">
                                                    <option value="1">SIM</option>
                                                    <option value="0">NÃO</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label id="select-nivel"><strong>Categoria</strong></label>
                                                <select id="select-nivel" name="select-nivel" class="form-control">
                                                    <?php foreach ($niveis as $nivel) { ?>
                                                    <option value="<?php echo $nivel->idnivel ?>"><?php echo $nivel->nivel_descricao ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label id="txt-nome"><strong>Nome do Usuário</strong></label>
                                                <input type="text" id="txt-nome" name="txt-nome" placeholder="Digite o nome..." class="form-control" autofocus value="<?php echo set_value('txt-nome') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label id="txt-login"><strong>Login</strong></label>
                                                <input type="text" id="txt-login" name="txt-login" placeholder="Digite o login..." class="form-control" value="<?php echo set_value('txt-login') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label id="lbl-regional"><strong>Regional</strong></label>
                                                <select id="select-regional" name="select-regional" class="form-control">
                                                    <?php foreach ($regionais as $regional) { ?>
                                                    <option value="<?php echo $regional->idregional ?>"><?php echo $regional->regional ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label id="txt-email"><strong>Email</strong></label>
                                                <input type="text" id="txt-email" name="txt-email" placeholder="Digite o email..." class="form-control" value="<?php echo set_value('txt-email') ?>">
                                            </div>
                                            <div class="form-group">
                                                <label id="txt-senha"><strong>Senha</strong></label>
                                                <input type="password" id="txt-senha" name="txt-senha" placeholder="Digite a senha..." class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label id="txt-confirmasenha"><strong>Confirma Senha</strong></label>
                                                <input type="password" id="txt-confirmasenha" name="txt-confirmasenha" placeholder="Confirme a senha..." class="form-control">
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
                            <div class="col-md-6 col-lg-6">
                                <h3 class="title-5 m-b-35">Alterar <?php echo $subtitulo ?></h3>
                                <div class="table-responsive table--no-card">
                                    <?php
                                    $this->table->set_heading("Foto", "Nome do Usuário", "Ativo", "Opções");
                                    foreach ($usuarios as $usuario) {
                                        $nomeuser= $usuario->nome;
                                        if ($usuario->ativo == 1) {
                                            $statusativo = '<span class="role member">Ativo</span>';
                                        } else {
                                            $statusativo = '<span class="role admin">Inativo</span>';
                                        }

                                        if ($usuario->img == 1) {
                                            $fotouser = '<div class="account-item account-item--style2"><div class="image">' . img("assets/images/usuarios/" . md5($usuario->idusuario) . ".jpg") . '</div></div>';
                                        } else {
                                            $fotouser = '<div class="account-item account-item--style2"><div class="image">' . img("assets/images/semFoto.png") . '</div></div>';
                                        } //fim do if da exibição de imagem

                                        if ($usuario->ativo == 1) {
                                            $ativacao = anchor('usuarios/desativar/' . md5($usuario->idusuario), '<button type="button" class="btn btn-primary btn-sm item" data-ttt="tooltip" data-placement="top" title="Inativar"><i class="zmdi zmdi-star"></i></button>');
                                        } else {
                                            $ativacao = anchor('usuarios/ativar/' . md5($usuario->idusuario), '<button type="button" class="btn btn-primary btn-sm item" data-ttt="tooltip" data-placement="top" title="Ativar"><i class="zmdi zmdi-check"></i></button>');
                                        } // fim do if do botão mudar status ;

                                        $alterar= anchor(base_url('usuarios/alterar/'. md5($usuario->idusuario)), '<button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button>');
                                        $excluir= '<button type="button" class="btn btn-danger btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".excluir-modal-'. $usuario->idusuario .'" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>';
                                        
                                        echo $modal= ' <div class="modal fade excluir-modal-'. $usuario->idusuario .'" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header btn-danger">
                                                        <h5 class="modal-title" id="mediummodalLabel">Exclusão de Conexão</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h4>Deseja Excluir o Usuário '. $usuario->nome .'?</h4>
                                                        <p>Após Excluido o usuário <b>'. $usuario->nome .'</b> não ficara mais disponível no Sistema.</p>
                                                        <p>Todos os itens relacionados ao usuário <b>'. $usuario->nome .'</b> serão afetados e não aparecerão no sistema até que sejam editados.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                        <a type="button" class="btn btn-danger" href="'. base_url("usuarios/excluir/".md5($usuario->idusuario)) .'">Excluir</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                        $this->table->add_row($fotouser, $nomeuser, $statusativo, $alterar.'&nbsp&nbsp'.$excluir.'&nbsp&nbsp'. $ativacao);
                                    }
                                    $this->table->set_template(array('table_open' => '<table id="tableUsuarios" class="table table-borderless table-striped table-earning">'));
                                    echo $this->table->generate();
                                    ?>
                                </div>
                            </div>
                    </div>
                </div>
            </section>
