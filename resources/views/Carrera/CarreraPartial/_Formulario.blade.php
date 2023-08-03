@if(isset($carrera))
    {{ Form::model($carrera, ['method' => 'put', 'route' => ['carrera.update', $carrera->id], 'files' => true, 'novalidate', 'autocomplete' => 'off']) }}
@else
    {{ Form::open(['route' => 'carrera.store', 'novalidate', 'files' => true, 'autocomplete' => 'off']) }}
@endif
@csrf
<div class="form-group @if($errors->has('carrera')) has-error has-feedback @endIf">
    {{ Form::label('carrera', 'Carrera', ['class' => 'control-label']) }}
    {{ Form::text('carrera', old('carrera'), ['class' => 'form-control', 'placeholder' =>  'Ingresa el nombre de la carrera']) }}
    @error('carrera')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('resolucion')) has-error has-feedback @endIf">
    {{ Form::label('resolucion', 'Resolución', ['class' => 'control-label']) }}
    {{ Form::text('resolucion', old('resolucion'), ['class' => 'form-control', 'placeholder' =>  'Ingresa la resolución de la carrera']) }}
    @error('resolucion')
    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
    @enderror
</div>

<div class="form-group @if($errors->has('pdf')) has-error has-feedback @endIf">
    @if(isset($carrera))
    <div class="custom-file col-12  mb-3">
        {{ Form::label('pdf', 'Resolución PDF', ['class' => '', 'for' => 'pdf']) }}
        {{ Form::file('pdf',['class' => '', 'for' => 'pdf', 'id' => 'pdf'])}}
        <a href="{{ asset('./storage/'.$carrera->pdf) }}"> {{ basename($carrera->pdf)}} </a> 
    </div>
    @else
    <div class="custom-file col-12  mb-3">
        {{ Form::label('pdf', 'Resolución PDF', ['class' => '', 'for' => 'pdf']) }}
        {{ Form::file('pdf', ['class' => '', 'for' => 'pdf', 'id' => 'pdf'])}}
        @error('pdf')
        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
        @enderror
    </div>
    @endif
</div>

<button type="submit" class="btn btn-primary btn-lg btn-block"> Guardar datos </button>
{{ Form::close() }}
