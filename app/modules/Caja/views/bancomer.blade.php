<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
    	body{
                    font-family: sans-serif;
		font-size: 12px;
                        margin-top: 2px;
	    }
        .container{
            width: 950px;
            height: 800px;
            float: left;
        }

        .fecha{
            padding-top: 15px;
            width: 280px;
            float: right;
        }

        .beneficiario{
            float: left;
            padding-top: 10px;
        }

        .importe{
            float: right;
            padding-top: 10px;
            width: 300px;
            text-align: right;
            margin-right: 50px;
        }

        .iniciales{
            float: left;
            margin-left: 170px;
            margin-right: -120px;
        }

        .letra{
            padding-top: 8px;
            padding-top: 0px;
        }

        .concepto{
            width: 450px;
        }

        @page{
            margin-bottom: 0;
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <br/>
        <div class="fecha">{{ $fecha }}</div>
        <br/><br/><br/>
        <div class="beneficiario">{{ $caja->beneficiario }}</div>
        <div class="importe">{{$importe_pesos}}</div>
        <br/><br/>
        <div class="letra">{{$importe}}</div>
        <br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/>
        <div class="concepto">{{$caja->concepto}}</div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/>

    </div>
</body>
</html>
