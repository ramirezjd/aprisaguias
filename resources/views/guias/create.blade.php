@extends('guias.layout')

@section('content')
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
                @foreach ($estados as $estado)
                <option value="{{ $estado->id }}">{{ $estado->estado }}</option>
                @endforeach
            </select>
            <select name="municipios" id="dropdownMunicipios">
                <option value="Seleccione un municipio">Seleccione un municipio</option>
                @foreach ($municipios as $municipios)
                <option value="{{ $municipios->id }}">{{ $municipios->municipio }}</option>
                @endforeach
            </select>

            <select name="ciudades" id="dropdownCiudades">
                <option value="Seleccione un ciudad">Seleccione un ciudad</option>
                @foreach ($ciudades as $ciudade)
                <option value="{{ $ciudade->ciudad }}">{{ $ciudade->ciudad }}</option>
                @endforeach
            </select>
            <select name="parroquias" id="dropdownParroquias">
                <option value="Seleccione un parroquia">Seleccione un parroquia</option>
                @foreach ($parroquias as $parroquia)
                <option value="{{ $parroquia->parroquia }}">{{ $parroquia->parroquia }}</option>
                @endforeach
            </select>
            <select name="zip_codes" id="dropdownZip_codes">
                <option value="Seleccione un zip_code">Seleccione un zip_code</option>
                @foreach ($zip_codes as $zip_code)
                <option value="{{ $zip_code->zip_code }}">{{ $zip_code->zip_code }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('guias.store') }}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-4 col-sm-12 col-md-4">
            <input name="codigo" type="hidden" value="xm234jq">
            <div class="form-group">
                <strong>Peso:</strong>
                <input type="num" name="peso" class="form-control" placeholder="Peso">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Dimension:</strong>
                <input type="num" name="dimensiones" class="form-control" placeholder="Dimension">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Precio:</strong>
                <input type="num" name="precio" class="form-control" placeholder="Precio">
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Fecha Entrega:</strong>
                <input type="date" class="form-control" name="fecha_entrega" placeholder="Fecha Entrega"></input>
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Direccion Destino:</strong>
                <input type="text" class="form-control" name="direccion_destino" placeholder="Direccion Destino"></input>
            </div>
        </div>
        <div class="col-xs-4 col-sm-12 col-md-4">
            <div class="form-group">
                <strong>Punto de Referencia:</strong>
                <textarea class="form-control" rows="5" name="punto_referencia_destino" placeholder="Punto de Referencia"></textarea>
            </div>
        </div>
        <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    console.log('asdasdas2')
    $(document).ready(function () {

        console.log('asdasdas1')
        $('#dropdownEstados').on('change',function(e) {

            var estado_id = e.target.value;
<<<<<<< HEAD
<<<<<<< HEAD
            alert("hi");
            /*
            $.ajax({
                type:"POST",
                url:"{{ route('mun') }}",
                data: {
                    estado_id: estado_id
                },
                success:function (data) {

                    $('#dropdownMunicipios').empty();

                    $.each(data.municipios[0].municipios,function(index,municipio){
                        $('#dropdownMunicipios').append('<option value="'+municipio.id+'">'+municipio.name+'</option>');
                    })
                },
                error: function (jqXHR, status, err) {
                    alert("Local error callback.");
                    console.log(err)
                },
            })*/
            $('#dropdownMunicipios').empty();



            @$ciudades.forEach(element => {
                alert("hi")
            });
            })
            //$('#dropdownMunicipios').empty();
            @foreach ($ciudades as $ciudad)
               //<option value="{{ $ciudad->ciudad }}">{{ $ciudad->ciudad }}</option>
            @endforeach

            })
            //$('#dropdownMunicipios').empty();
            @foreach ($ciudades as $ciudad)
               //<option value="{{ $ciudad->ciudad }}">{{ $ciudad->ciudad }}</option>
            @endforeach

        });
    });
</script>

@endsection
