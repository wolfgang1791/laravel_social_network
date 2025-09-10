@extends('layout')

@section('content')
    <h1>Contactos</h1>
    @if(session()->has('info'))
        <h3>{{session('info')}}</h3>
    @else
        <h2>Escribeme</h2>
        <form class="" action="{{route('mensajes.store')}}" method="post">
            @include('messages.form',['message'=>new App\Message])
        </form>
    @endif
@endsection
