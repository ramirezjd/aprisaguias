@extends('layouts.app')

@section('content')
    {!! QrCode::size(250)->generate('Hola, QR de prueba!!'); !!}
@endsection


