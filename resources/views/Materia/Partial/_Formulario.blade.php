@if(isset($materia))
{{ Form::model($materia, ['method' => 'put', 'route' => ['materia.update', $materia->id], 'files' => true, 'novalidate', 'autocomplete' => 'off']) }}
@else
{{ Form::open(['route' => 'materia.store', 'files' => true, 'novalidate', 'autocomplete' => 'off']) }}
@endif
@csrf

<div class="form-group @if($errors->has('materia')) has-error has-feedback @endIf">
    {{ Form::label('materia', ('Materia'), ['class' => 'control-label']) }}
    {{ Form::text('materia', old('materia'), ['class' => 'form-control', 'placeholder' =>  ('Nombre de la materia')]) }}
    @error('materia')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('carrera')) has-error has-feedback @endIf">
    {{ Form::label('carrera_id', ('Carrera'), ['class' => 'control-label']) }}
    {{ Form::select('carrera_id', $carreras, null, ['class' => 'form-control']) }}
    @error('email')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('anio')) has-error has-feedback @endIf">
    {{ Form::label('anio', 'Año', ['class' => 'control-label']) }}
    {{ Form::select('anio', $anio, null, ['class' => 'form-control']) }}
    @error('rol')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('programa')) has-error has-feedback @endIf">
    @if(isset($materia))
    <div class="custom-file col-12  mb-3">
        {{ Form::label('programa', 'Programa', ['class' => '', 'for' => 'programa']) }}
        {{ Form::file('programa',  ['class' => '', 'for' => 'programa', 'id' => 'programa'])}}
        <a href="{{ asset('./storage/'.$materia->programa) }}"> {{ basename($materia->programa)}} </a>
    </div>
    @else
    <div class="custom-file col-12  mb-3">
        {{ Form::label('programa', 'Programa', ['class' => '', 'for' => 'programa']) }}
        {{ Form::file('programa',  ['class' => '', 'for' => 'programa', 'id' => 'programa'])}}
        @error('programa')
        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
    @endif
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block"> Guardar datos </button>
{{ Form::close() }}
