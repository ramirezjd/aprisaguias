<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <tr>
                        <td>Guia: {{$guia->id}}</td>
                        <td>Codigo: {{$guia->codigo}}</td>
                    </tr>

                    <tr>
                        <td>Origen</td>
                        <td>Destino</td>
                    </tr>

                    <tr>
                        <td>{{$guia->cod_origen}}</td>
                        <td>{{$guia->cod_destino}}</td>
                    </tr>

                    <tr>
                        <td class="p-0 m-0">
                            <table class="table table-bordered m-0 p-0">
                                <tr>
                                    <td> Detalles de envio</td>
                                    <td>Peso Vol: {{$guia->peso_volumetrico}}</td>
                                    <td>Peso: {{$guia->peso_total}}</td>
                                    <td>Precio: {{$guia->precio}}</td>
                                </tr>
                            </table>
                        </td>
                        <td><span>Destinatario: {{$destinatario->tipo_documento}} {{$destinatario->documento}},</span>
                            <span>{{$destinatario->nombre_razonsocial}},</span>
                            <span>{{$destinatario->telefono}}</span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <span>Remitente {{$remitente->tipo_documento}} {{$remitente->documento}},</span>
                            <span>{{$remitente->nombre_razonsocial}},</span>
                            <span>{{$remitente->telefono}}</span>
                        </td>

                        <td >
                            <span>Direccion Destinatario</span>
                        </td>
                    </tr>

                    <tr>
                        <td >
                            <span>Direccion Remitente</span>
                        </td>
                        <td>
                            <span>Prueba de entrega</span><br><br><br><br>
                            <span>Nombre</span>
                            <span>Firma</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="p-0 m-0">
                            <table class="table table-bordered m-0 p-0">
                                <tr>
                                    <td> Nombre</td>
                                    <td> Firma</td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </table>
                        </td>
                        <td class="p-0 m-0">
                            <table class="table table-bordered m-0 p-0">
                                <tr>
                                    <td> Nombre</td>
                                    <td> Firma</td>
                                </tr>
                                <tr>
                                    <td> </td>
                                    <td> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>


                </table>
            </div>

        </div>
    </div>


</body>
</html>



