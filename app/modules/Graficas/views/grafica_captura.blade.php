<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?= $titulo ?></title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">
var titulo = '{{$titulo}}';
var tituloy = '{{ $tituloy }}';
var titulox = '{{ $titulox }}';
var total = '{{ $planeacion }}';
var planeacion = '{{ $planeacion }}';
var licitaciones = '{{ $licitaciones }}';
var obras = '{{ $obras }}';
var administracion = '{{ $administracion }}';
var afisico = '{{ $afisico }}';

var jsseries = [];

jsseries.push({name:'PLANEACION (' + planeacion +') ' + parseInt(planeacion * 100 / total) + '%', data:[parseInt(planeacion * 100 / total)]});
jsseries.push({name:'LICITACIONES (' + licitaciones + ') ' + parseInt(licitaciones * 100 / total) +'%', data:[parseInt(licitaciones * 100 / total)]});
jsseries.push({name:'OBRAS (ESTIMACIONES) (' + obras + ') ' + parseInt(obras * 100 / total) + '%', data:[parseInt(obras * 100 / total)]});
jsseries.push({name:'OBRAS (AVANCE FISICO) (' + afisico + ') ' + parseInt(afisico * 100 / total) + '%', data:[parseInt(afisico * 100 / total)]});
jsseries.push({name:'ADMINISTRACION (' + administracion + ') ' + parseInt(administracion * 100 / total) + '%', data:[parseInt(administracion * 100 / total)]});



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
            categories: [""]
        },
        yAxis: {
            min: 0,
            max: 100,
            title: {
                text: tituloy
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
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
