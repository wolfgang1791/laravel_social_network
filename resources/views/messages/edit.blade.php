@extends('layout')

@section('content')
    <h1>Editar Mensaje</h1>
    @if (session()->has('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif
    <form action="{{route('mensajes.update',$message->id)}}" method="post">
        {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
        {!! method_field('PUT')!!}
        @include('messages.form',['btnText'=>'Actualizar'])
    </form>
@endsection
