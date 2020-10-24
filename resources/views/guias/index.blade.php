@extends('guias.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 7 CRUD Example from scratch - ItSolutionStuff.com</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('guias.create') }}"> Create New guia</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Cod</th>
            <th>Peso</th>
            <th>Dimensiones</th>
            <th>Precio</th>
            <th>Fecha de Entrega</th>
            <th>Direccion Destino</th>
            <th>Punto de Referencia</th>
        </tr>
        @foreach ($guias as $guia)
        <tr>
            <td>{{ $guia->codigo }}</td>
            <td>{{ $guia->peso }}</td>
            <td>{{ $guia->dimensiones }}</td>
            <td>{{ $guia->precio }}</td>
            <td>{{ $guia->fecha_entrega }}</td>
            <td>{{ $guia->direccion_destino }}</td>
            <td>{{ $guia->punto_referencia_destino }}</td>
            <td>
                <form action="{{ route('guias.destroy',$guia->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('guias.show',$guia->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('guias.edit',$guia->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $guias->links() !!}
      
@endsection