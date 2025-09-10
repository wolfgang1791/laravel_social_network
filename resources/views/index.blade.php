@extends('layout')

@section('content')
    <h1>Todos los mensajes</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Notas de mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr>
                    @if( $message->user_id)
                        <td><a href="{{route('usuarios.show',$message->user_id)}}">{{ $message->user->name }}</a></td>
                        <td>{{ $message->user->email }}</td>
                    @else
                        <td>{{$message->name}}</td>
                        <td>{{$message->email}}</td>
                    @endif
                    <td><a href="{{route('mensajes.show',$message->id)}}">{{$message->mensaje}}</a></td>
                    <td>{{$message->note['body']}}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{route('mensajes.edit',$message->id)}}">Editar</a>
                        <form style="display: inline" action="{{route('mensajes.destroy',$message->id)}}" method="post">
                            {!! csrf_field() !!}
                            {!! method_field('DELETE') !!}
                            <button class="btn btn-danger btn-xs"type="submit" name="button">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
