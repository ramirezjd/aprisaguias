<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <title>Laravel 7 CRUD Application - ItSolutionStuff.com</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>

<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New guia</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('guias.index') }}"> Back</a>
        </div>
    </div>
</div>
<form action="">
    @csrf
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <select name="estados" id="dropdownEstados">
                <option value="Seleccione un estado">Seleccione un estado</option>
                @foreach ($estados as $estados)
                <option value="{{ $estados->id }}">{{ $estados->estado }}</option>
                @endforeach
            </select>

            <select name="municipios" id="dropdownMunicipios">
                <option value="0">Seleccione un municipio</option>
            </select>

            <select name="ciudades" id="dropdownCiudades">
                <option value="0">Seleccione una ciudad</option>
            </select>

            <select name="parroquias" id="dropdownParroquias">
                <option value="0">Seleccione una parroquia</option>
            </select>

            <select name="zip_codes" id="dropdownZip_codes">
                <option value="0">Seleccione un codigo postal</option>
            </select>
        </div>
    </div>
</div>


</div>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $( document ).ready(function() {

        $( '#dropdownParroquias' ).change(function(e) {

        var parroquia_id = e.target.value;

        $.ajax({
            url:"{{ route('request_parroquia') }}",
            method:"GET",
            data:{"parroquia_id":parroquia_id},
            dataType:"json",
            success:function(data){

                $('#dropdownZip_codes').empty();

                $('#dropdownZip_codes').append('<option value="'+0+'">Seleccione una zona postal</option>');
                $('#dropdownZip_codes').append('<option value="'+data.id+'">'+data.zip_code+'</option>');


            },
            error: function (data) {
                alert('fail');
            }
            });

        });


        $( '#dropdownMunicipios' ).change(function(e) {

        var municipio_id = e.target.value;
        alert(municipio_id);

        $.ajax({
            url:"{{ route('request_municipio') }}",
            method:"GET",
            data:{"municipio_id":municipio_id},
            dataType:"json",
            success:function(data){

                $('#dropdownCiudades').empty();

                $('#dropdownCiudades').append('<option value="'+0+'">Seleccione una ciudad</option>');


                $.each(data, function(i, id, ciudad) {
                    $('#dropdownCiudades').append('<option value="'+data[i].id+'">'+data[i].ciudad+'</option>');
                });
            },
            error: function (data) {
                alert('fail');
            }
            });

            $.ajax({
            url:"{{ route('request_ciudad') }}",
            method:"GET",
            data:{"municipio_id":municipio_id},
            dataType:"json",
            success:function(data){

                $('#dropdownParroquias').empty();

                $('#dropdownParroquias').append('<option value="'+0+'">Seleccione una parroquia</option>');

                $.each(data, function(i, id, parroquia) {
                    $('#dropdownParroquias').append('<option value="'+data[i].id+'">'+data[i].parroquia+'</option>');
                });
            },
            error: function (data) {
                alert('fail');
            }
            });

        });

        $( '#dropdownEstados' ).change(function(e) {

            var estado_id = e.target.value;

            $.ajax({
            url:"{{ route('request_estado') }}",
            method:"GET",
            data:{"estado_id":estado_id},
            dataType:"json",
            success:function(data){

                $('#dropdownMunicipios').empty();

                $('#dropdownMunicipios').append('<option value="'+0+'">Seleccione un municipio</option>');


                $.each(data, function(i, id, municipio) {
                    $('#dropdownMunicipios').append('<option value="'+data[i].id+'">'+data[i].municipio+'</option>');
                });
            },
            error: function (data) {
                alert('fail');
            }
            });
        });



    });
</script>
</body>




</html>

