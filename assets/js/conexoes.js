/*
 * Configuração de parâmetros da página de Conexoes.
 *
 *
 */

// Configuração dos Tooltip da datatable
$("[data-tt=tooltip]").tooltip();
$("[data-ttt=tooltip]").tooltip();
$("[data-tttt=tooltip]").tooltip();

// Configuração do tempo de exibição da mensagem ao usuário
setTimeout(function () {
	$('#mensagemUsuario').fadeOut('fast');
}, 5000);

// Configuração do datatable
$(document).ready(function () {
	$('#myTable').DataTable({
		"responsive": true,
		"processing": true,
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
