/*
 * Configuração de parâmetros da página toner alterar
 *
 *
 */

$(function () {
	// Atribui evento e função para limpeza dos campos
	$("#txt-patrimonio").on("input", limpacampos);

	// Dispara o Autocomplete a partir do segundo caracter
	$("#txt-patrimonio").autocomplete({
		source: function (request, response) {
			$.ajax({
				url: "../autocompleteDataPatrimonio",
				dataType: "json",
				data: {
					term: request.term,
				},
				success: function (data) {
					response(data);
				},
			});
		},
		minLength: 2,
		select: function (event, ui) {
			$("#txt-patrimonio").val(ui.item.value);
			$("#txt-patrimonio1").val(ui.item.value);
			$("#txt-serial").val(ui.item.serial);
			$("#txt-host").val(ui.item.host);
			$("#txt-unidade").val(ui.item.unidade);
			$("#txt-localizacao").val(ui.item.localizacao);
		},
	});


	// Função para limpar os campos caso a busca esteja vazia
	function limpacampos() {
		var busca = $("#txt-patrimonio").val();

		if (busca == "") {
			$("#txt-patrimonio1").val("");
			$("#txt-serial").val("");
			$("#txt-host").val("");
			$("#txt-unidade").val("");
			$("#txt-localizacao").val("");
		}
	}

	// Configuração dos Tooltip da datatable
	$("[data-tt=tooltip]").tooltip();
	$("[data-ttt=tooltip]").tooltip();
	$("[data-tttt=tooltip]").tooltip();

	// Função datapicker jquery-ui
	$("#txt-datasolicitacao").datepicker({

		// dateFormat: "yy-mm-dd",
		dateFormat: 'yy-mm-dd',
		dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
		dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
		monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
		showButtonPanel: true,
		showOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		selectOtherMonths: true,
		autoclose: true
		
	});

	$("#txt-datadachegada").datepicker({

		dateFormat: 'yy-mm-dd',
		dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
		dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
		monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
		showButtonPanel: true,
		showOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		selectOtherMonths: true,
		autoclose: true

	});

	$("#txt-datainstalacao").datepicker({

		dateFormat: 'yy-mm-dd',
		dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
		dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
		monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
		showButtonPanel: true,
		showOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		selectOtherMonths: true,
		autoclose: true

	});

	$("#txt-datainstalacaociano").datepicker({

		dateFormat: 'yy-mm-dd',
		dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
		dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
		monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
		showButtonPanel: true,
		showOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		selectOtherMonths: true,
		autoclose: true

	});

	$("#txt-datainstalacaomagenta").datepicker({

		dateFormat: 'yy-mm-dd',
		dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
		dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
		monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
		showButtonPanel: true,
		showOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		selectOtherMonths: true,
		autoclose: true

	});

	$("#txt-datainstalacaoamarelo").datepicker({

		dateFormat: 'yy-mm-dd',
		dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
		dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
		dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
		monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
		monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
		showButtonPanel: true,
		showOtherMonths: true,
		changeMonth: true,
		changeYear: true,
		selectOtherMonths: true,
		autoclose: true

	});

	// 1 Capitalize string - convert textbox user entered text to uppercase
	$("#txt-chamadoservicedesk").keyup(function () {
		$(this).val($(this).val().toUpperCase());
	});

	$("#txt-chamadoout").keyup(function () {
		$(this).val($(this).val().toUpperCase());
	});

	$("#txt-quemrecebeu").keyup(function () {
		$(this).val($(this).val().toUpperCase());
	});

	$("#txt-numeroserietoner").keyup(function () {
		$(this).val($(this).val().toUpperCase());
	});

	$("#txt-numeroserietonerciano").keyup(function () {
		$(this).val($(this).val().toUpperCase());
	});

	$("#txt-numeroserietonermagenta").keyup(function () {
		$(this).val($(this).val().toUpperCase());
	});

	$("#txt-numeroserietoneramarelo").keyup(function () {
		$(this).val($(this).val().toUpperCase());
	});

	$(document).ready(function () {
		// Configuração do tempo de exibição da mensagem ao usuário
		setTimeout(function () {
			$("#mensagemUsuario").fadeOut("fast");
		}, 5000);
	});

	// Configuração do datatable
	$(document).ready(function () {
		$("#myTable").DataTable({
			order: [[5, "DESC"]],
			responsive: true,
			processing: true,
			oLanguage: {
				sEmptyTable: "Nenhum registro encontrado.",
				sInfo: "Mostrando _TOTAL_ registros",
				sInfoEmpty: "0 Registros",
				sInfoFiltered: "(De _MAX_ registros)",
				sInfoPostFix: "",
				sInfoThousands: ".",
				sLengthMenu: "Mostrar _MENU_",
				sLoadingRecords: "Carregando...",
				sProcessing: "Processando...",
				sZeroRecords: "Nenhum registro encontrado.",
				sSearch: "Pesquisar",
				oPaginate: {
					sNext: "Proximo",
					sPrevious: "Anterior",
					sFirst: "Primeiro",
					sLast: "Ultimo",
				},
			},
		});
	});
});
