@if(isset($user))
{{ Form::model($user, ['method' => 'put', 'route' => ['usuario.update', $user->id], 'novalidate', 'autocomplete' => 'off']) }}
@else
{{ Form::open(['route' => 'usuario.store', 'files' => true, 'novalidate', 'autocomplete' => 'off']) }}
@endif
@csrf

<div class="form-group @if($errors->has('name')) has-error has-feedback @endIf">
    {{ Form::label('name', ('Nombre de usuario'), ['class' => 'control-label']) }}
    {{ Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' =>  ('Nombre del usuario')]) }}
    @error('name')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('email')) has-error has-feedback @endIf">
    {{ Form::label('email', ('Email'), ['class' => 'control-label']) }}
    {{ Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' =>  ('Email... ')]) }}
    @error('email')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('rol')) has-error has-feedback @endIf">
    {{ Form::label('rol', 'Rol', ['class' => 'control-label']) }}
    {{ Form::select('rol_id', $rol, null, ['class' => 'form-control']) }}
    @error('rol')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('phone')) has-error has-feedback @endIf">
    {{ Form::label('phone', ('Teléfono'), ['class' => 'control-label']) }}
    {{ Form::number('phone', old('phone'), ['class' => 'form-control', 'placeholder' =>  ('Ingrese un teléfono'), 'min' => 0]) }}
    @error('phone')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('password')) has-error has-feedback @endIf">
    {{ Form::label('password', ('Contraseña'), ['class' => 'control-label']) }}
    {{ Form::password('password', ['class' => 'form-control', 'placeholder' =>  ('Ingresa su contraseña')]) }}
    @error('password')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('password')) has-error has-feedback @endIf">
    {{ Form::label('password', ('Confirmar contraseña '), ['class' => 'control-label']) }}
    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' =>  ('Reingrese su contraseña')]) }}
    @error('password_confirm')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block"> Guardar datos </button>
{{ Form::close() }}
