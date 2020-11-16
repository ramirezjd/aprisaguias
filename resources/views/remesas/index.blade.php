@extends('users.layout')


@can('ver usuario')
    @section('content')
        <div class="container">
            <div class="row mb-4">
                <div class="col-1">
                    <span>User ID</span>
                </div>
                <div class="col-2">
                    <span>User username</span>
                </div>
                <div class="col-2">
                    <span>User nombres</span>
                </div>
                <div class="col-2">
                    <span>User apellidos</span>
                </div>
                <div class="col-2">
                    <span>User email</span>
                </div>
                <div class="col-3">
                    <span>Acciones</span>
                </div>
            </div>
            @foreach ($users as $user)
            <div class="row my-3">
                <div class="col-1">
                    <span>{{ $user->id }}</span>
                </div>
                <div class="col-2">
                    <span>{{ $user->username }}</span>
                </div>
                <div class="col-2">
                    <span>{{ $user->nombres }}</span>
                </div>
                <div class="col-2">
                    <span>{{ $user->apellidos }}</span>
                </div>
                <div class="col-2">
                    <span>{{ $user->email }}</span>
                </div>
                <div class="col-3">
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
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