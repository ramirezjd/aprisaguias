<!doctype html>
<html lang="en">
    <head>
        <style>
            body {
                font-family: 'arial';
                font-size:11px;
                margin: 0px;
            }
            table{
                width: 100%;
            }
            .whatever{
                background-color: gray;
                height: 3cm;
            }
        </style>
    </head>
<body>
    <table>
        <tr>
            <td class="whatever">
            <img src="{{ public_path('/img/aprisa-azul.png') }}" style="width: 6cm;">
            </td>
            <td>
            hello world
            </td>
            <td>
            hello world
            </td>
        </tr>
        
    </table>
    <div style="page-break-after: always;"></div>
    <img src="{{ public_path('/img/qrcode.png') }}" style="width: 200px; height: 200px">

    </body>
</html>
