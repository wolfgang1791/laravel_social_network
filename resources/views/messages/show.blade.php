@extends('layout')

@section('content')
    <h1>Mensaje</h1>
    <p>Enviado por {{$message->nombre}} - {{ $message->email}}</p>
    <p>{{ $message->mensaje}}</p>
@endsection
