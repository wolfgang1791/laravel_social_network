@extends('layout')

@section('content')
    <h1>Login</h1>
    <form class="form-inline" action="login" method="post">
        {!! csrf_field() !!}
        <input class="form-control" type="email" name="email" placeholder="Email">
        <input class="form-control"  type="password" name="password" placeholder="Password">
        <input class="btn btn-primary"  type="submit"  value="Ingresar">
    </form>
@endsection
