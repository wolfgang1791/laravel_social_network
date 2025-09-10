{{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
{!! csrf_field()!!}
@unless($message->user_id)
    <label for="nombre">Nombre</label>
    <input class="form-control" type="text" name="name" value="{{  $message->name ??old('name')}}">
    {!!$errors->first('name','<span class=error>:message</span>')!!}
    <br>
    <label for="email">Email</label>
    <input class="form-control"  type="text" name="email" value="{{ $message->email ?? old('email')}}">
    {!!$errors->first('email','<span class=error>:message</span>')!!}
@endunless
<br>
<label for="mensaje">Escribe tus weas</label>
<br>
<textarea class="form-control" name="mensaje" rows="4" cols="8">{{ $message->mensaje ?? old('mensaje')}}</textarea>
{!!$errors->first('mensaje','<span class=error>:message</span>')!!}
<br>
<input class="btn btn-primary" type="submit" name="env" value="{{$btnText ?? 'Guardar'}}"> <!--  isset($btnText) ? $btnText : 'Guardar'|| or -->
