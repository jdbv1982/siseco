<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>hsbc</title>
    <style>
        .container{
            width: 600px;
            height: 800px;
            float: left;
        }

        .fecha{
            float: right;
        }

        .beneficiario{
            float: left;
            padding-top: 10px;
        }

        .importe{
            float: right;
            padding-top: 10px;
        }

        .iniciales{
            float: left;
            margin-left: 170px;
            margin-right: -120px;
        }

        .letra{
            padding-top: 8px;
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
        <br/><br/>
        <div class="fecha">{{ $fecha }}</div>
        <br/><br/><br/>
        <div class="beneficiario">{{ $caja->beneficiario }}</div>
        <div class="importe">{{$caja->importe}}</div>
        <br/><br/>
        <div class="letra">{{$importe}}</div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div class="concepto">{{$caja->concepto}}</div>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br><br><br><br><br>
        <div class="iniciales">JDBV</div>
        <div class="iniciales">JDBV</div>
        <div class="iniciales">JDBV</div>
    </div>
</body>
</html>
