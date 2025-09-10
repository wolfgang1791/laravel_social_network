@extends('layout')

@section('content')
    <h1>Crear nuevo usuario</h1>
    <form class="" action="{{route('usuarios.store')}}" method="post">
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
        @include('users.form',['user'=> new App\User])
        <input class="btn btn-primary" type="submit" name="env" value="Guardar">
    </form>
@endsection
