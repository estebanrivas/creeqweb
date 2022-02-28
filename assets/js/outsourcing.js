/*
 * Configuração de parâmetros da página de Equipamentos.
 *
 *
 */


// Configuração do tempo de exibição da mensagem ao usuário
setTimeout(function () {
	$('#mensagemUsuario').fadeOut('fast');
}, 5000);

// Configuração do datatable

$(document).ready(function () {
	$('#memListOutsourcingnordeste').DataTable({
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
		// Show records per page.
		// "pageLength": 25,
		// Load data from an Ajax source
		"ajax": {
			// "url": "<?= base_url('serverside/getLists/'); ?>",
			"url": "getListsnordeste/",
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

$(document).ready(function () {
	$('#memListOutsourcingsudeste').DataTable({
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
		// Show records per page.
		// "pageLength": 25,
		// Load data from an Ajax source
		"ajax": {
			// "url": "<?= base_url('serverside/getLists/'); ?>",
			"url": "getListssudeste/",
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
			"url": "outsourcing/getLists/",
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

$(document).ready(function () {
	$('#memListOutsourcingbh').DataTable({
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
			"url": "getListsbh/",
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

$(document).ready(function () {
	$('#memListOutsourcingmetropolitana').DataTable({
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
			"url": "getListsmetropolitana/",
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

$(document).ready(function () {
	$('#memListOutsourcingap').DataTable({
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
			"url": "getListsap/",
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

$(document).ready(function () {
	$('#memListOutsourcingsede').DataTable({
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
			"url": "getListssede/",
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