@extends('layout')

@section('content')
    <h1>Saludo a {{$nombre}}</h1>
    <ul>
        @forelse ($consolas as $consola)
            <li>{{$consola}}</li>
        @empty
            <h1>No hay prro :v</h1>
        @endforelse
    </ul>
@endsection
