@extends('permissions.layout')


@can('ver usuario')
    @section('content')
        <div class="container">
            <ul>
                @foreach ($users as $user)
                    <li>{{ $user->id }} - {{ $user->username }} - {{ $user->nombres }} - {{ $user->apellidos }} - {{ $user->email }} </li>
                @endforeach
            </ul>
        </div>
    @endsection
@endcan

@cannot('ver usuario')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
