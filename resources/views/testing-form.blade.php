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
                <option value="Seleccione un municipio">Seleccione un municipio</option>
                @foreach ($municipios as $municipios)
                <option value="{{ $municipios->municipio }}">{{ $municipios->municipio }}</option>
                @endforeach
            </select>

            <select name="ciudades" id="dropdownCiudades">
                <option value="Seleccione un ciudad">Seleccione un ciudad</option>
                @foreach ($ciudades as $ciudades)
                <option value="{{ $ciudades->ciudad }}">{{ $ciudades->ciudad }}</option>
                @endforeach
            </select>
            <select name="parroquias" id="dropdownParroquias">
                <option value="Seleccione un parroquia">Seleccione un parroquia</option>
                @foreach ($parroquias as $parroquias)
                <option value="{{ $parroquias->parroquia }}">{{ $parroquias->parroquia }}</option>
                @endforeach
            </select>
            <select name="zip_codes" id="dropdownZip_codes">
                <option value="Seleccione un zip_code">Seleccione un zip_code</option>
                @foreach ($zip_codes as $zip_codes)
                <option value="{{ $zip_codes->zip_code }}">{{ $zip_codes->zip_code }}</option>
                @endforeach
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

        
        $( '#dropdownEstados' ).change(function(e) {
            
            var estado_id = e.target.value;

            $.ajax({
            url:"{{ route('ajaxRequest') }}",
            method:"GET",
            data:{"estado_id":estado_id},
            dataType:"json",
            success:function(data){
                alert(data.success);
                $('#dropdownMunicipios').empty();

                $('#dropdownMunicipios').append('<option value="'+0+'">Seleccione un municipio</option>');
                $.each(data.subcategories[0].subcategories,function(index,subcategory){
                        
                    $('#dropdownMunicipios').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                })
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

