@extends('guias.layout')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-lg-6 margin-tb">
            <h2>CRUD de Guias</h2>
        </div>
        <div class="col-6 text-right">
            <a class="btn btn-success" href="{{ route('guias.create') }}"> Create New guia</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
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
                    <td>{{ $guia->user->username }}</td>
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
        </div>

    </div>
</div>
@endsection
