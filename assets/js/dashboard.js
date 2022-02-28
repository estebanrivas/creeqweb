var paramRegional = [];
var paramRegional1 = [];
var paramDesktops = [];
var paramImpressoras = [];
var bgColor = [];
var bgBorder = [];
var bghoverColor = [];

$(document).ready(function () {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url: "dashboard/desktopregionaistotal",
		type: "GET",
		success: function (data) {
			console.log(data);
			var obj = JSON.parse(data);

			// var score = {
				paramRegional = [];
				paramDesktops = [];
				bgColor = [];
				bgBorder = [];
				bghoverColor = [];
			// };
			

			$.each(obj, function (i, item) {
				var r = Math.random() * 255;
				r = Math.round(r);

				var g = Math.random() * 255;
				g = Math.round(g);

				var b = Math.random() * 255;
				b = Math.round(b);

				paramRegional.push(item.regional);
				paramDesktops.push(item.TOTAL_DESKTOP);
				bgColor.push('rgba(' + r + ',' + g + ',' + b + ', 0.9)');
				bgBorder.push('rgba(' + r + ',' + g + ',' + b + ', 1)');
				bghoverColor.push('rgba(' + r + ',' + g + ',' + b + ', 0.9)');
			});

			//get canvas
			var ctx = $("#dsktregionais");

			var data = {
				labels: paramRegional,
				datasets: [{
						label: "Desktop",
						data: paramDesktops,
						backgroundColor: bgColor,
						borderColor: bgBorder,
						fill: false,
						lineTension: 0,
						pointRadius: 5
					}
					// {
					// 	label: "TeamB score",
					// 	data: score.TeamB,
					// 	backgroundColor: "green",
					// 	borderColor: "lightgreen",
					// 	fill: false,
					// 	lineTension: 0,
					// 	pointRadius: 5
					// }
				]
			};

			var options = {
				title: {
					display: true,
					position: "top",
					text: "Desktop Regionais",
					fontSize: 18,
					fontColor: "#111"
				},
				legend: {
					display: true,
					position: "left"
				}
			};

			var chart = new Chart(ctx, {
				// type: "doughnut",
				type: "pie",
				data: data,
				options: options
			});

		},
		error: function (data) {
			console.log(data);
		}
	});

});

$(document).ready(function () {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url: "dashboard/outsourcingregionaltotal",
		type: "GET",
		success: function (data) {
			console.log(data);
			var obj = JSON.parse(data);

			// var score = {
			paramRegional1 = [];
			paramImpressoras = [];
			bgColor = [];
			bgBorder = [];
			bghoverColor = [];
			// };


			$.each(obj, function (i, item) {
				var r = Math.random() * 255;
				r = Math.round(r);

				var g = Math.random() * 255;
				g = Math.round(g);

				var b = Math.random() * 255;
				b = Math.round(b);

				paramRegional1.push(item.Regionais);
				paramImpressoras.push(item.TOTAL_IMPRESSORAS);
				bgColor.push('rgba(' + r + ',' + g + ',' + b + ', 0.9)');
				bgBorder.push('rgba(' + r + ',' + g + ',' + b + ', 1)');
				bghoverColor.push('rgba(' + r + ',' + g + ',' + b + ', 0.9)');
			});

			//get canvas
			var ctx = $("#impregionais");

			var data = {
				labels: paramRegional1,
				datasets: [{
						label: "Outsourcing",
						data: paramImpressoras,
						borderColor: bgBorder,
						borderWidth: "0",
						backgroundColor: bgColor,
						fill: false,
						lineTension: 0,
						pointRadius: 5
					}
					// {
					// 	label: "TeamB score",
					// 	data: score.TeamB,
					// 	backgroundColor: "green",
					// 	borderColor: "lightgreen",
					// 	fill: false,
					// 	lineTension: 0,
					// 	pointRadius: 5
					// }
				]
			};

			var options = {
				title: {
					display: true,
					position: "top",
					text: "Outsourcing Regionais",
					fontSize: 18,
					fontColor: "#111"
				},
				legend: {
					display: true,
					position: "left"
				}
			};

			var chart = new Chart(ctx, {
				type: "doughnut",
				// type: "bar",
				data: data,
				options: options
			});

		},
		error: function (data) {
			console.log(data);
		}
	});

});

$(document).ready(function () {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url: "dashboard/tonera3",
		type: "GET",
		success: function (data) {
			console.log(data);
			var obj = JSON.parse(data);

			// var score = {
			paramStatus1 = [];
			paramPedidostoner = [];
			bgColor = [];
			bgBorder = [];
			bghoverColor = [];
			// };


			$.each(obj, function (i, item) {
				var r = Math.random() * 255;
				r = Math.round(r);

				var g = Math.random() * 255;
				g = Math.round(g);

				var b = Math.random() * 255;
				b = Math.round(b);

				paramStatus1.push(item.Status);
				paramPedidostoner.push(item.PEDIDOS_TONER_A3);
				bgColor.push('rgba(' + r + ',' + g + ',' + b + ', 0.9)');
				bgBorder.push('rgba(' + r + ',' + g + ',' + b + ', 1)');
				bghoverColor.push('rgba(' + r + ',' + g + ',' + b + ', 0.9)');
			});

			//get canvas
			var ctx = $("#tonera3");

			var data = {
				labels: paramStatus1,
				datasets: [{
					label: "TONERS",
					data: paramPedidostoner,
					borderColor: bgBorder,
					borderWidth: "0",
					backgroundColor: bgColor,
					fill: false,
					lineTension: 0,
					pointRadius: 5
				}
					// {
					// 	label: "TeamB score",
					// 	data: score.TeamB,
					// 	backgroundColor: "green",
					// 	borderColor: "lightgreen",
					// 	fill: false,
					// 	lineTension: 0,
					// 	pointRadius: 5
					// }
				]
			};

			var options = {
				title: {
					display: true,
					position: "top",
					text: "Pedidos de Toner Realizados A3",
					fontSize: 18,
					fontColor: "#111"
				},
				legend: {
					display: true,
					position: "left"
				}
			};

			var chart = new Chart(ctx, {
				// type: "doughnut",
				type: "bar",
				data: data,
				options: options
			});

		},
		error: function (data) {
			console.log(data);
		}
	});

});

$(document).ready(function () {

	/**
	 * call the data.php file to fetch the result from db table.
	 */
	$.ajax({
		url: "dashboard/chamadosa3",
		type: "GET",
		success: function (data) {
			console.log(data);
			var obj = JSON.parse(data);

			// var score = {
			paramStatus1 = [];
			paramChamados = [];
			bgColor = [];
			bgBorder = [];
			bghoverColor = [];
			// };


			$.each(obj, function (i, item) {
				var r = Math.random() * 255;
				r = Math.round(r);

				var g = Math.random() * 255;
				g = Math.round(g);

				var b = Math.random() * 255;
				b = Math.round(b);

				paramStatus1.push(item.Status);
				paramChamados.push(item.CHAMADOS_A3);
				bgColor.push('rgba(' + r + ',' + g + ',' + b + ', 0.9)');
				bgBorder.push('rgba(' + r + ',' + g + ',' + b + ', 1)');
				bghoverColor.push('rgba(' + r + ',' + g + ',' + b + ', 0.9)');
			});

			//get canvas
			var ctx = $("#chamadosa3");

			var data = {
				labels: paramStatus1,
				datasets: [{
					label: "Chamados A3",
					data: paramChamados,
					borderColor: bgBorder,
					borderWidth: "0",
					backgroundColor: bgColor,
					fill: false,
					lineTension: 0,
					pointRadius: 5
				}
					// {
					// 	label: "TeamB score",
					// 	data: score.TeamB,
					// 	backgroundColor: "green",
					// 	borderColor: "lightgreen",
					// 	fill: false,
					// 	lineTension: 0,
					// 	pointRadius: 5
					// }
				]
			};

			var options = {
				title: {
					display: true,
					position: "top",
					text: "Total de Chamados Realizados A3",
					fontSize: 18,
					fontColor: "#111"
				},
				legend: {
					display: true,
					position: "left"
				}
			};

			var chart = new Chart(ctx, {
				// type: "doughnut",
				type: "bar",
				data: data,
				options: options
			});

		},
		error: function (data) {
			console.log(data);
		}
	});

});