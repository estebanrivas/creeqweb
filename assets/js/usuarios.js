/*
* Configuração de parâmetros da página usuários.
*
*
*/

// Parametrização do tooltip, para os botões do Datatable
$("[data-tt=tooltip]").tooltip();
$("[data-ttt=tooltip]").tooltip();
$("[data-tttt=tooltip]").tooltip();

// Configuração do Datatable que aparece na tela de usuários
$(document).ready(function () {
	$('#tableUsuarios').DataTable({
		"responsive": true,
		"processing": true,
		"autoWidth": true,
		"columnDefs": [{
			"width": "1%",
			"targets": [0, 1]
		}],
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

setTimeout(function () {
	$('#mensagemUsuario').fadeOut('fast');
}, 5000);
