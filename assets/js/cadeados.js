/*
 * Configuração de parâmetros da página cadeados.
 *
 *
 */
$(function () {
	// Atribui evento e função para limpeza dos campos
	$('#txt-patrimonio').on('input', limpacampos);

	// Dispara o Autocomplete a partir do segundo caracter
	$("#txt-patrimonio").autocomplete({
		source: function (request, response) {
			$.ajax({
				url: 'cadeados/autocompleteData',
				dataType: "json",
				data: {
					term: request.term
				},
				success: function (data) {
					response(data);
				}
			});
		},
		minLength: 2,
		select: function (event, ui) {
			$('#txt-patrimonio').val(ui.item.value);
			$('#txt-patrimonio1').val(ui.item.value);
			$('#txt-unidade').val(ui.item.unidade);
			$('#txt-localizacao').val(ui.item.localizacao);
			$('#txt-usuario').val(ui.item.usuario);
		}
	});
	// // Função para limpar os campos caso a busca esteja vazia
	function limpacampos() {
		var busca = $('#txt-patrimonio').val();

		if (busca == "") {
			$('#txt-patrimonio1').val('');
			$('#txt-unidade').val('');
			$('#txt-localizacao').val('');
			$('#txt-usuario').val('');
		}
	}
});

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




