/*
 * Configuração de parâmetros da página de Transferências.
 *
 *
 */





// Adicionar campos de patrimônio e descrição
// $("#add-campo").click(function () {
// 	$("#patrimonio").append('<div class="col-sm-3"><div class="form-group"><input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" placeholder="Digite o patrimônio..."></div></div><div class="col-sm-8"><div class="form-group"><input type="text" id="txt-descricao-patrimonio" name="txt-descricao-patrimonio" class="form-control" onkeyup="maiusculo(this);"></div></div>');
// });



// Configuração do datatable
$(document).ready(function () {
	// Configuração dos Tooltip da datatable
	
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$("[data-tt=tooltip]").tooltip();
		$("[data-ttt=tooltip]").tooltip();
		$("[data-tttt=tooltip]").tooltip();
	});

	// Configuração do tempo de exibição da mensagem ao usuário
	setTimeout(function () {
		$('#mensagemUsuario').fadeOut('fast');
	}, 5000);


	// Função para adicionar e remover campos de patrimônio e descrição
	var cont = 1;
	$('#add-campo').click(function () {
		cont++;
		// $("#patrimonio1").append('<div class="row" id="campo' + cont + '"><div class="col-12 col-md-1"><label id="lbl-patrimonio">Patrimônio</label></div><div class="col-12 col-md-2"><input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" placeholder="Patrimônio..."></div><div class="col-12 col-md-2"><label id="lbl-descricao-patrimonio">Descrição Patrimônio</label></div><div class="col-12 col-md-6"><input type="text" id="txt-descricao-patrimonio" name="txt-descricao-patrimonio" class="form-control" placeholder="Descrição...."></div><div class="col-12 col-md-1"><button type="button" id="' + cont + '" class="btn btn-danger btn-apagar" data-tt="tooltip" data-placement="top" title="Remover Campos"> - </button></div><br></div>');
		$("#patrimonio1").append(
			'<div class="row" id="campo' + cont + '"><div class="col-sm-2"><div class= "form-group"><input type="text" id="txt-patrimonio" name="txt-patrimonio" class="form-control" placeholder="Patrimônio..."></div></div><div class="col-sm-9"><div class="form-group"><input type="text" id="txt-descricao-patrimonio" name="txt-descricao-patrimonio" class="form-control" placeholder="Descrição...."></div></div><div class="col-sm-1"><button type="button" id="' + cont + '" class="btn btn-apagar btn-danger" data-toogle="tooltip" data-placement="top" title="Remover Campos">-</button></div></div>'
		);
		$("[data-tt=tooltip]").tooltip();
		$('[data-toggle="tooltip"]').tooltip();

	});
	$('form').on('click', '.btn-apagar', function () {
		var button_id = $(this).attr("id");
		$('#campo' + button_id + '').remove();
	});


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
