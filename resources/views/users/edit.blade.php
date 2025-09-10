@extends('layout')

@section('content')
    <h1>Editar usuario</h1>
    @if (session()->has('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    <form class="" action="{{route('usuarios.update',$user->id)}}" method="post">
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
        {!! method_field('PUT')!!}
        @include('users.form')
        <input class="btn btn-primary" type="submit" name="env" value="enviar">
    </form>
@endsection
