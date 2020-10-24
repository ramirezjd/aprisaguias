@extends('guias.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit guia</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('guias.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="{{ route('guias.update',$guia->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <input name="codigo" type="hidden" value="{{ $guia->codigo }}">
                <div class="form-group">
                    <strong>Peso:</strong>
                    <input type="num" name="peso" value="{{ $guia->peso }}" class="form-control" placeholder="Peso">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Dimension:</strong>
                    <input type="num" name="dimensiones" value="{{ $guia->dimensiones }}" class="form-control" placeholder="Dimension">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Precio:</strong>
                    <input type="num" name="precio" class="form-control" value="{{ $guia->precio }}" placeholder="Precio">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fecha Entrega:</strong>
                    <input class="form-control" name="fecha_entrega" value="{{ $guia->fecha_entrega }}" placeholder="Fecha Entrega"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Direccion Destino:</strong>
                    <input class="form-control" name="direccion_destino" value="{{ $guia->direccion_destino }}" placeholder="Direccion Destino"></input>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Punto de Referencia:</strong>
                    <textarea class="form-control" rows="5" name="punto_referencia_destino" placeholder="Punto de Referencia">{{ $guia->punto_referencia_destino }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection