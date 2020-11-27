<!doctype html>
<html lang="en">
<head>
    <style>
        body {
            font-family: 'arial';
            font-size:11px;
        }
        .td{
            margin-left: 2%;
        }
    </style>
</head>
<body>
    <h1>Remesa: {{$remesa->codigo}} | Origen:  {{$remesa->cod_origen}} | Destino: {{$remesa->cod_destino}}</h1>
    <h1>Peso Volumetrico: {{$remesa->peso_volumetrico_total}} | Volumen:  {{$remesa->volumen_total}} | Peso: {{$remesa->peso_total}}</h1>

    <br>
    <h1> GUIAS: </h1>
    <table>
        <tr>
            <td>Codigo: </td>
            <td>Nº Paquetes:</td>
            <td>Origen:</td>
            <td>Destino:</td>
            <td>Peso:</td>
            <td>Peso Vol:</td>
        </tr>
    @foreach ($guias as $guia)
        <tr>
        <td>{{$guia->codigo}}</td>
        <td>{{$guia->n_paquetes}}</td>
        <td>{{$guia->cod_origen}}</td>
        <td>{{$guia->cod_destino}}</td>
        <td>{{$guia->peso_total}}</td>
        <td>{{$guia->peso_volumetrico}}</td>
        </tr>
    @endforeach
    </table>
</body>
</html>
