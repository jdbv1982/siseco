<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Obras por Fuente</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript">

		// creamos ahora una array en javascript.
		var jstitulo = '<?php echo $titulo; ?>';
		var jstitulopie = '<?php echo $titulopie; ?>';
		var jsdatos = <?php echo json_encode($datos);?>;



$(function () {

	var jsdata = [];

	jsdata.push(['Firefox',   45.0]);
	jsdata.push(['IE',       26.8]);
	jsdata.push(['Others',   12.8]);
	jsdata.push(['Safari',    8.5]);
	jsdata.push(['Opera',     6.2]);
	jsdata.push(['Others',   0.7]);

	//tiene que ser en porcentajes


/*
	for(var i=0;i<jsdatos.length;i++)
	{
		jsdata.push([jsdatos[i]['nombre'],jsdatos[i]['autorizadas']]);
	}
*/


alert (jsdata);
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: jstitulo
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: jstitulopie,
            data: jsdata
        }]
    });
});


		</script>
	</head>
	<body>
<script src="../graficos/highcharts.js"></script>
<script src="../graficos/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

	</body>
</html>
