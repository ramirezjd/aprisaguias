<!doctype html>
<html lang="en">
    <head>
        <style>
            body {
                font-family: 'arial';
                font-size:11px;
            }
        </style>
    </head>
<body>
    @foreach ($paquetes as $paquete)
    <table style="width: 100%;">
        <tr>
            <td colspan="2" style="border: solid;">
                <p>codigo {{$codigo}}/{{$loop->index+1}}</p>
                <p>peso_total {{$peso_total}}</p>
                <p>peso_volumetrico {{$peso_volumetrico}}</p>
                <p>fecha_creacion {{$fecha_creacion}}</p>
            </td>
        </tr>
        <tr>
            <td style="border: solid;">
                <p>origen {{$origen}}</p>
                <p>remitente_documento {{$remitente_tipo_documento}} {{$remitente_documento}}</p>
                <p>remitente_nombre_razonsocial {{$remitente_nombre_razonsocial}}</p>
                <p>remitente_email {{$remitente_email}}</p>
                <p>remitente_telefono {{$remitente_telefono}}</p>
                <p>remitente_direccion {{$remitente_direccion}}</p>
            </td>
            <td style="border: solid;">
                <p>destino {{$destino}}</p>
                <p>destinatario_documento {{$destinatario_tipo_documento}} {{$destinatario_documento}}</p>
                <p>destinatario_nombre_razonsocial {{$destinatario_nombre_razonsocial}}</p>
                <p>destinatario_email {{$destinatario_email}}</p>
                <p>destinatario_telefono {{$destinatario_telefono}}</p>
                <p>destinatario_direccion {{$destinatario_direccion}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: solid;">
                <p>codigo {{$codigo}}/{{$loop->index+1}}</p>
                <p>peso_total {{$peso_total}}</p>
                <p>peso_volumetrico {{$peso_volumetrico}}</p>
                <p>fecha_creacion {{$fecha_creacion}}</p>
            </td>
        </tr>
        <tr>
            <td style="border: solid;">
                <p>origen {{$origen}}</p>
                <p>remitente_documento {{$remitente_tipo_documento}} {{$remitente_documento}}</p>
                <p>remitente_nombre_razonsocial {{$remitente_nombre_razonsocial}}</p>
                <p>remitente_email {{$remitente_email}}</p>
                <p>remitente_telefono {{$remitente_telefono}}</p>
                <p>remitente_direccion {{$remitente_direccion}}</p>
            </td>
            <td style="border: solid;">
                <p>destino {{$destino}}</p>
                <p>destinatario_documento {{$destinatario_tipo_documento}} {{$destinatario_documento}}</p>
                <p>destinatario_nombre_razonsocial {{$destinatario_nombre_razonsocial}}</p>
                <p>destinatario_email {{$destinatario_email}}</p>
                <p>destinatario_telefono {{$destinatario_telefono}}</p>
                <p>destinatario_direccion {{$destinatario_direccion}}</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="border: solid;">
                <p>codigo {{$codigo}}/{{$loop->index+1}}</p>
                <p>peso_total {{$peso_total}}</p>
                <p>peso_volumetrico {{$peso_volumetrico}}</p>
                <p>fecha_creacion {{$fecha_creacion}}</p>
            </td>
        </tr>
        <tr>
            <td style="border: solid;">
                <p>origen {{$origen}}</p>
                <p>remitente_documento {{$remitente_tipo_documento}} {{$remitente_documento}}</p>
                <p>remitente_nombre_razonsocial {{$remitente_nombre_razonsocial}}</p>
                <p>remitente_email {{$remitente_email}}</p>
                <p>remitente_telefono {{$remitente_telefono}}</p>
                <p>remitente_direccion {{$remitente_direccion}}</p>
            </td>
            <td style="border: solid;">
                <p>destino {{$destino}}</p>
                <p>destinatario_documento {{$destinatario_tipo_documento}} {{$destinatario_documento}}</p>
                <p>destinatario_nombre_razonsocial {{$destinatario_nombre_razonsocial}}</p>
                <p>destinatario_email {{$destinatario_email}}</p>
                <p>destinatario_telefono {{$destinatario_telefono}}</p>
                <p>destinatario_direccion {{$destinatario_direccion}}</p>
            </td>
        </tr>

        <tr style="border: solid;">
            <p>Aqui van las politicas y toda esa vaina que la gente nunca lee.. Jajajaja
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo iure perferendis
            laudantium rerum eum laboriosam eaque, ipsam sapiente, adipisci maiores quia,
            quasi qui illum fugit fuga delectus tenetur natus nisi.</p>

        </tr>
    </table>
    <div style="page-break-after: always;"></div>
    @endforeach


    </body>
</html>
