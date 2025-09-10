
{!! csrf_field()!!}
<label for="nombre">Nombre</label>
<input class="form-control" type="text" name="name" value="{{$user->name ?? old('name')}}">
{!!$errors->first('name','<span class=error>:message</span>')!!}
<br>
<label for="email">Email</label>
<input class="form-control" type="text" name="email" value="{{$user->email ?? old('email')}}">
{!!$errors->first('email','<span class=error>:message</span>')!!}
<br>
@unless ($user->id)
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password">
    {!!$errors->first('password','<span class=error>:message</span>')!!}
    <br>
    <br>
    <label for="password_confirmation">Password Confirmation</label>
    <input class="form-control" type="password" name="password_confirmation">
    {!!$errors->first('password_confirmation','<span class=error>:message</span>')!!}
    <br>
@endunless
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <div class="input-group-text">
        @foreach ($roles as $id => $name)
            <label for="roles">
                <input
                    type="checkbox"
                    name="roles[]"
                    value="{{$id}}"
                    {{$user->roles->pluck('id')->contains($id) ? 'checked' : ''}}>
            {{$name}}
            </label>
        @endforeach
    </div>
  </div>
</div>
{!!$errors->first('roles','<span class=error>:message</span>')!!}
