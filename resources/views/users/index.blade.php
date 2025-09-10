@extends('layout')

@section('content')
    <h1>Usuarios</h1>
    <a href="{{route('usuarios.create')}}" class="btn btn-primary float-right">Crear nuevo usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Role</th>
                <th>Notas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    {{-- <td><a href="{{route('mensajes.show',$message->id)}}">{{$message->nombre}}</a></td> --}}
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        {{-- @foreach ($user->roles as $role)
                            {{$role->display_name}}
                        @endforeach --}}
                        {{ $user->roles->pluck('display_name')->implode(" | ")}}
                    </td>
                    <td>{{$user->note['body']}}</td>
                    <td>
                        <a class="btn btn-info btn-xs" href="{{route('usuarios.edit',$user->id)}}">Editar</a>
                        <form style="display: inline" action="{{route('usuarios.destroy',$user->id)}}" method="post">
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
