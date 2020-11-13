@extends('permissions.layout')


@can('ver permisos')
    @section('content')
        <div class="container">
            <ul>
                @foreach ($permissions as $permissions)
                    <li>{{ $permissions->id }} - {{ $permissions->name }}</li>
                @endforeach
            </ul>
        </div>
    @endsection
@endcan

@cannot('ver permisos')
    @section('content')
        <div class="container">
            <h1>No tiene los permisos necesarios para acceder a esta funcionalidad.</h1>
        </div>
    @endsection
@endcannot
