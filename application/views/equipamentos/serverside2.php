<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="./assets/images/icon/mpretacor.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="shortcut icon" href="./assets/images/icon/mpretacor.ico"> 
	<link href="./assets/images/icon/mpretacor.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    <title><?php echo $titulo ?> - <?php echo $versao ?></title>

   <!-- Fontfaces CSS-->
    <link href="<?php echo base_url() . "assets/"; ?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/"; ?>vendor/font-awesome-5.6.3/css/all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/"; ?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo base_url() . "assets/"; ?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo base_url() . "assets/"; ?>vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/"; ?>vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/"; ?>vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/"; ?>vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/"; ?>vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/"; ?>vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo base_url() . "assets/"; ?>vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- <link href="<?php echo base_url() . "assets/"; ?>css/jquery.dataTables.min.css" rel="stylesheet" media="all"> -->
    <link href="<?php echo base_url() . "assets/"; ?>css/dataTables.bootstrap4.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo base_url() . "assets/"; ?>css/theme.css" rel="stylesheet" media="all">

</head>
<body>
    <div class="page-wrapper">
        <div class="page-content--bgf7">
            <section class="p-t-20 m-b-30">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <h3 class="title-5 m-b-35"><?php echo $subtitulo ?></h3>
                            <div class="row m-b-15">
                                <a href="geral/exportaexcel"><button class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Exporta????o para Excel"><i class="zmdi zmdi-download"></i>  Exporta????o para Excel</button></a>
                            </div>
                            <div class="table-responsive table--no-card m-t-20">
                                <?php
                                $this->table->set_heading("ID", "Patrim??nio", "Unidade", "Usu??rio", "Tipo", "Teamviewer", "OP????ES");
                                
                                $this->table->set_template(array(
                                    'table_open' => '<table id="memListTable" class="display table table-borderless table-striped table-earning">'
                                ));
                                echo $this->table->generate();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- COPYRIGHT-->
            <section class="p-t-60 p-b-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright"> 
                                <p><?php echo $nomesistema ?> - <?php echo $versao ?> - Copyright ?? 2019 - Todos os direitos reservados.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END COPYRIGHT-->
        </div>
    </div>
    <?php
    foreach ($equipamentos as $equipamento) {
        
    }
    ?>
<!-- MODAL EXCLUIR -->
    <div class="modal fade excluir-modal-<?php echo $equipamento->idequipamento ?>" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediummodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header btn-danger">
                    <h5 class="modal-title" id="mediummodalLabel">Exclus??o de Equipamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Deseja Excluir o Equipamento de patrim??nio <?php echo $equipamento->patrimonio ?>  ?</h4>
                    <p>Ap??s Excluido o Equipamento de patrim??nio <b><?php echo $equipamento->patrimonio ?></b>, o mesmo n??o ficara mais dispon??vel no Sistema.</p>
                    <p>Todos os itens relacionados ao equipamento de <b><?php echo $equipamento->patrimonio ?></b> ser??o afetados e n??o aparecer??o no sistema at?? que sejam editados.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a type="button" class="btn btn-danger" href="<?php echo base_url("equipamentos/excluir/". md5($equipamento->idequipamento)) ?>">Excluir</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM MODAL EXCLUIR -->
    <!-- MODAL DETALHES -->
    <div class="modal fade detalhes-modal-<?php echo $equipamento->idequipamento ?>" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
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
                        echo form_open();
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="select-tpequipamento"><strong>Tipo de equipamento</strong></label>
                                <select id="select-tpequipamento" name="select-tpequipamento" disabled class="form-control" autofocus>
                                <option value=""><?php echo $equipamento->tipoequipamento ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-teamviewer"><strong>Teamviewer</strong></label>
                                <input type="text" id="txt-teamviewer" name="txt-teamviewer" disabled  value="<?php echo $equipamento->teamviewer ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-host"><strong>Host</strong></label>
                                <input type="text" id="txt-host" name="txt-host" disabled  value="<?php echo $equipamento->host ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-usuario"><strong>Usu??rio</strong></strong></label>
                                <input type="text" id="txt-usuario" name="txt-usuario" disabled  value="<?php echo $equipamento->usuario ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-ip"><strong>IP</strong></label>
                                <input type="text" id="txt-ip" name="txt-ip" disabled  value="<?php echo $equipamento->ip ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-patrimonio"><strong>Patrim??nio</strong></label>
                                <input type="text" id="txt-patrimonio" name="txt-patrimonio" disabled  value="<?php echo $equipamento->patrimonio  ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-modelo"><strong>Modelo</strong></label>
                                <input type="text" id="txt-modelo" name="txt-modelo" disabled  value="<?php echo $equipamento->modelo ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-serial"><strong>Serial</strong></label>
                                <input type="text" id="txt-serial" name="txt-serial" disabled  value="<?php  echo $equipamento->serial ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-hd"><strong>HD</strong></label>
                                <input type="text" id="txt-hd" name="txt-hd" disabled  value="<?php echo $equipamento->hd ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-ram"><strong>RAM</strong></label>
                                <input type="text" id="txt-ram" name="txt-ram" disabled  value="<?php echo $equipamento->ram ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-maclan"><strong>MAC LAN</strong></label>
                                <input type="text" id="txt-maclan" name="txt-maclan"  disabled value="<?php echo $equipamento->mac ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-macwifi"><strong>MAC WI-FI</strong></label>
                                <input type="text" id="txt-macwifi" name="txt-macwifi"  disabled value="<?php echo $equipamento->macw ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-macbluetooth"><strong>MAC BLUETOOTH</strong></label>
                                <input type="text" id="txt-macbluetooth" name="txt-macbluetooth" disabled  value="<?php echo $equipamento->macb ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="select-fabricante"><strong>Fabricante</strong></label>
                                <select id="select-fabricante" name="select-fabricante" disabled  class="form-control" >
                                <option value=""><?php echo $equipamento->fabricantesesc ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="select-regional"><strong>Regional</strong></label>
                                <select id="select-regional" name="select-regional"  disabled class="form-control" >
                                <option value=""><?php echo $equipamento->regionalsesc ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="select-sos"><strong>Sistema Opeacional</strong></label>
                                <select id="select-sos" name="select-sos" disabled  class="form-control" >
                                <option value=""><?php echo $equipamento->sosesc ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="select-status"><strong>Status</strong></label>
                                <select id="select-status" name="select-status" disabled  class="form-control" >
                                <option value=""><?php echo $equipamento->statussesc ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="select-localizacao"><strong>Localiza????o</strong></label>
                                <select id="select-localizacao" name="select-localizacao"  disabled class="form-control" >
                                <option value=""><?php echo $equipamento->localizacaosesc ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="select-unidade"><strong>Unidade</strong></label>
                                <select id="select-unidade" name="select-unidade"  disabled class="form-control" >
                                <option value=""><?php echo $equipamento->unidadessesc ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="select-conexao"><strong>Conex??o</strong></label>
                                <select id="select-conexao" name="select-conexao" disabled  class="form-control" >
                                <option value=""><?php echo $equipamento->conexaosesc ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="select-outsourcing"><strong>Outsourcing</strong></label>
                                <select id="select-outsourcing" name="select-outsourcing" disabled class="form-control" >
                                <option value=""><?php echo $equipamento->outsourcing ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label id="txt-observacao"><strong>Observa????o</strong></label>
                                <textarea id="txt-observacao" name="txt-observacao" disabled  class="form-control"><?php echo $equipamento->obs ?></textarea>
                            </div>
                        </div>
                    </div>
                    <?php
                    echo form_close();
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- FIM MODAL DETALHES -->
    



    <!-- Jquery JS-->
    <script src="<?php echo base_url() . "assets/"; ?>vendor/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap JS-->
    <!-- <script src="<?php echo base_url() . "assets/"; ?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/bootstrap-4.1/bootstrap.min.js"></script> -->

    <!-- Vendor JS       -->
    <!-- <script src="<?php echo base_url() . "assets/"; ?>vendor/slick/slick.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/animsition/animsition.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>vendor/select2/select2.min.js"></script> -->
    <script src="<?php echo base_url() . "assets/"; ?>js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . "assets/"; ?>js/dataTables.bootstrap4.min.js"></script>
    
      <!-- Main JS-->
    <!-- <script src="<?php echo base_url() . "assets/"; ?>js/main.js"></script> -->
    <script src="<?php echo base_url() . "assets/"; ?>js/md5.min.js"></script>
    <script type="text/javascript">
        $("[data-tt=tooltip]").tooltip();
    </script>

    <!-- <script>
    $(document).ready(function(){
        $('#memListTable').DataTable({
            // Processing indicator            "processing": true,
            // DataTables server-side processing mode
            "serverSide": true,
            // Initial no order.
            "order": [],
            // Load data from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('serverside/getLists/'); ?>",
                "type": "POST"
            },
            //Set column definition initialisation properties
            "columnDefs": [{ 
                "targets": [0],
                "orderable": false
            }]
        });
    });
    </script> -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('#memListTable').DataTable({
                // Quantiade de itens para serem exibidos na datatable
                "pageLength" : 10,
                // DataTables server-side processing mode
                "serverSide": true,
                // Initial no order.
                "order": [
                    [2, "asc" ]
                ],                
                "columns": [
                    null,
                    null,
                    null,
                    null,
                    {orderable: false}
                ],
                // Datatable responsivo
                "responsive": true,
                // Processing indicator
                "processing": true,
                
                // Load data from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('serverside2/getlist'); ?>",
                    "type": "GET"
                },
                //Set column definition initialisation properties
                "columnDefs": [{ 
                    // "targets": [0],
                    // "visible": false,
                    // "orderable": false
                },

                // {
                //     "targets": [1],
                //     "visible": false,
                //     "orderable": false
                // },

                {
                    "targets": [6],
                    "data": null,
                    "render": function (data, type, row, meta){

                            data = '<a href="<?php echo base_url("equipamentos/alterar/")."'+md5(row[0])+'" ?>"><button type="button" class="btn btn-success btn-sm item" data-toggle="tooltip" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target="detalhes-modal-<?php echo "'+row[0]+'"?>"  title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>&nbsp<button type="button" class="btn btn-danger btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target="excluir-modal-<?php echo "'+row[0]+'"?>" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>';
                            return data;
                    }
                },
            ],
                "oLanguage": {
                        "sEmptyTable": "Nenhum registro encontrado.",
                        "sInfo": "Mostrando _TOTAL_ registros",
                        "sInfoEmpty": "0 Registros",
                        "sInfoFiltered": "(De _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sInfoThousands":  ".",
                        "sLengthMenu": "Mostrar _MENU_",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing":     "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado.",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Proximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast":"Ultimo"
                        }
                        },
            });
        });
    </script>
</body>

</html>
            
