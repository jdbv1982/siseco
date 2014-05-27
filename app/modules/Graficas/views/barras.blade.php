<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?= $titulo ?></title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
var titulo = '<?php echo $titulo; ?>';
var tituloy = '<?php echo $tituloy; ?>';
var titulox = '<?php echo $titulox; ?>';
var data = <?php echo json_encode($datos);?>;
var total = 0;

var jsseries = [];

for (x=0;x<data.length;x++){
    var numero = parseInt(data[x].autorizadas);
    total = total + numero;
    jsseries.push({name: data[x].nombre+'('+numero+')' ,data: [numero]});
}

$(function () {

        $('#container').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: titulo
            },
            subtitle: {
                text: 'Total de Obras ' +'('+ total +')'
            },
            xAxis: {
                categories: [
                    titulox
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: tituloy
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                },
            },
            series: jsseries
        });
    });


		</script>
	</head>
	<body>
<script src="../graficos/highcharts.js"></script>
<script src="../graficos/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	</body>
</html>
