/*
 * Configuração de parâmetros da página de Equipamentos.
 *
 *
 */

// Configuração da Mask de MACADRESS de LAN, WIFI e BLUETOOTH
// $(function () {
// 	$.mask.definitions['h'] = "[A-Fa-f0-9]";
// 	$("#txt-maclan").mask("hh:hh:hh:hh:hh:hh");
// 	$("#txt-macwifi").mask("hh:hh:hh:hh:hh:hh");
// 	$("#txt-macbluetooth").mask("hh:hh:hh:hh:hh:hh");
// });

// Configuração do tempo de exibição da mensagem ao usuário
setTimeout(function () {
	$('#mensagemUsuario').fadeOut('fast');
}, 5000);

// Configuração do datatable

$(document).ready(function () {
	$('#memListOutsourcing').DataTable({
		// Datatable responsivo
		"responsive": true,
		// Processing indicator
		"processing": true,
		// DataTables server-side processing mode
		"serverSide": true,
		// Auto
		"autoWidth": false,
		// Initial no order.
		"order": [],
		// Load data from an Ajax source
		"ajax": {
			// "url": "<?= base_url('serverside/getLists/'); ?>",
			"url": "getLists/",
			"type": "POST"
		},
		"drawCallback": function (settings) {

			$('[data-toggle="tooltip1"]').tooltip();
			$('[data-toggle="tooltip2"]').tooltip();
			$('[data-toggle="tooltip3"]').tooltip();

			$("[data-tt=tooltip]").tooltip();
			$("[data-ttt=tooltip]").tooltip();
			$("[data-tttt=tooltip]").tooltip();
		},

		//Set column definition initialisation properties
		"columnDefs": [{
				"targets": [0],
				"visible": false,
				"orderable": false
			}
			// {
			// 	"targets": [1],
			// 	"visible": true,
			// 	"orderable": true
			// }

			// {
			//     "targets": [7],
			//     "data": null,
			//     "render": function (data, type, row, meta){

			//             data = '<a href="<?= base_url("equipamentos/alterar/") . "'+md5(row[1])+'" ?>"><button type="button" class="btn btn-success btn-sm item" data-ttt="tooltip" data-placement="top" title="Editar"><i class="zmdi zmdi-edit"></i></button></a>&nbsp<button type="button" class="btn btn-warning btn-sm item" data-tt="tooltip" data-toggle="modal" data-placement="top" data-target=".detalhes-modal-<?= "'+row[1]+'" ?>"  title="Detalhes"><i class="zmdi zmdi-more zmdi-hc-lg"></i></button>&nbsp<button type="button" class="btn btn-danger btn-sm item" data-tttt="tooltip" data-toggle="modal" data-placement="top" data-target=".excluir-modal-<?= "'+row[1]+'" ?>" title="Excluir"><i class="zmdi zmdi-delete zmdi-hc-lg"></i></button>';
			//             return data;
			//     }
			// }
		],
		"oLanguage": {
			"sEmptyTable": "Nenhum registro encontrado.",
			"sInfo": "Mostrando _TOTAL_ registros",
			"sInfoEmpty": "0 Registros",
			"sInfoFiltered": "(De _MAX_ registros)",
			"sInfoPostFix": "",
			"sInfoThousands": ".",
			"sLengthMenu": "Mostrar _MENU_",
			"sLoadingRecords": "Carregando...",
			"sProcessing": "Processando...",
			"sZeroRecords": "Nenhum registro encontrado.",
			"sSearch": "Pesquisar",
			"oPaginate": {
				"sNext": "Proximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Ultimo"
			}
		},
	});
});


$(document).ready(function () {
	$('#memListOutsourcingcftv').DataTable({
		// Datatable responsivo
		"responsive": true,
		// Processing indicator
		"processing": true,
		// DataTables server-side processing mode
		"serverSide": true,
		// Auto
		"autoWidth": false,
		// Initial no order.
		"order": [],
		// Load data from an Ajax source
		"ajax": {
			// "url": "<?= base_url('serverside/getLists/'); ?>",
			"url": "getListcftv/",
			"type": "POST"
		},
		"drawCallback": function (settings) {

			$('[data-toggle="tooltip1"]').tooltip();
			$('[data-toggle="tooltip2"]').tooltip();
			$('[data-toggle="tooltip3"]').tooltip();

			$("[data-tt=tooltip]").tooltip();
			$("[data-ttt=tooltip]").tooltip();
			$("[data-tttt=tooltip]").tooltip();
		},

		//Set column definition initialisation properties
		"columnDefs": [{
			"targets": [0],
			"visible": false,
			"orderable": false
		}

		],
		"oLanguage": {
			"sEmptyTable": "Nenhum registro encontrado.",
			"sInfo": "Mostrando _TOTAL_ registros",
			"sInfoEmpty": "0 Registros",
			"sInfoFiltered": "(De _MAX_ registros)",
			"sInfoPostFix": "",
			"sInfoThousands": ".",
			"sLengthMenu": "Mostrar _MENU_",
			"sLoadingRecords": "Carregando...",
			"sProcessing": "Processando...",
			"sZeroRecords": "Nenhum registro encontrado.",
			"sSearch": "Pesquisar",
			"oPaginate": {
				"sFirst": "Primeiro",
				"sPrevious": "Anterior",
				"sNext": "Proximo",
				"sLast": "Ultimo"
			}
		},
	});

});