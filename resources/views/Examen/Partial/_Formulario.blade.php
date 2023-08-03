{{ Form::model('', ['method' => 'put', 'route' => ['examen.update', $carrera->id], 'novalidate', 'autocomplete' => 'off']) }}

@csrf

<div class="accordion" id="accordionAnios" style="background-color: #34495E;">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    1er Año
                </button>
            </h2>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionAnios">
            @foreach($materia1 as $key => $m)
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        {{ Form::label('materia', ('Materia'), ['class' => '']) }}
                        {{ Form::text("materia_id$key", $m, ['class' => 'form-control', 'readonly']) }}
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('fecha', ('Fecha del exámen'), ['class' => '']) }}
                        {{ Form::date("fecha$key",  $examen->where('materia_id', $key)->first()->fecha,  ['class' => 'form-control'])}}
                        @error('fecha')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                        @enderror
                    </div>

                <div class="form-row">
                    <div class="form-group col-md-4 @if($errors->has(' vocal1')) has-error has-feedback @endIf">
                        {{ Form::label('vocal', "Vocal  1", ['class' => '']) }}
                        {{ Form::select("vocal1$key", $user, $examen->where('materia_id', $key)->first()->vocal1, ['class' => 'form-control']) }}
                        @error('vocal')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                         @enderror
                    </div>

                    <div class="form-group col-md-4 @if($errors->has(' vocal2')) has-error has-feedback @endIf">
                        {{ Form::label('vocal', "Vocal  2", ['class' => '']) }}
                        {{ Form::select("vocal2$key", $user, $examen->where('materia_id', $key)->first()->vocal2, ['class' => 'form-control']) }}
                        @error('vocal')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                         @enderror                    
                    </div>

                    <div class="form-group col-md-4 @if($errors->has(' vocal3')) has-error has-feedback @endIf">
                        {{ Form::label('vocal', "Vocal  3", ['class' => '']) }}
                        {{ Form::select("vocal3$key", $user, $examen->where('materia_id', $key)->first()->vocal3, ['class' => 'form-control']) }}
                        @error('vocal')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                        @enderror                    
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    2do Año
                </button>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionAnios">
            @foreach($materia2 as $key => $m)
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        {{ Form::label('materia', ('Materia'), ['class' => '']) }}
                        {{ Form::text("materia_id$key", $m, ['class' => 'form-control', 'readonly']) }}
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('fecha', ('Fecha del exámen'), ['class' => '']) }}
                        {{ Form::date("fecha$key", $examen->where('materia_id', $key)->first()->fecha,  ['class' => 'form-control'])}}
                    @error('fecha')
                    <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                    @enderror
                    </div>
                

                <div class="form-row">
                    <div class="form-group col-md-4 @if($errors->has(' vocal1')) has-error has-feedback @endIf">
                        {{ Form::label('vocal', "Vocal  1", ['class' => '']) }}
                        {{ Form::select("vocal1$key", $user, $examen->where('materia_id', $key)->first()->vocal1, ['class' => 'form-control']) }}
                        @error('vocal')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                         @enderror
                    </div>

                    <div class="form-group col-md-4 @if($errors->has(' vocal2')) has-error has-feedback @endIf">
                        {{ Form::label('vocal', "Vocal  2", ['class' => '']) }}
                        {{ Form::select("vocal2$key", $user, $examen->where('materia_id', $key)->first()->vocal2, ['class' => 'form-control']) }}
                        @error('vocal')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                         @enderror
                    </div>

                    <div class="form-group col-md-4 @if($errors->has(' vocal3')) has-error has-feedback @endIf">
                        {{ Form::label('vocal', "Vocal  3", ['class' => '']) }}
                        {{ Form::select("vocal3$key", $user, $examen->where('materia_id', $key)->first()->vocal3, ['class' => 'form-control']) }}
                        @error('vocal')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                         @enderror
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    3er Año
                </button>
            </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-bs-parent="#accordionAnios">
            @foreach($materia3 as $key => $m)
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        {{ Form::label('materia', ('Materia'), ['class' => '']) }}
                        {{ Form::text("materia_id$key", $m, ['class' => 'form-control', 'readonly']) }}
                    </div>
                    <div class="form-group col-md-2">
                        {{ Form::label('fecha', ('Fecha del exámen'), ['class' => '']) }}
                        {{ Form::date("fecha$key",  $examen->where('materia_id', $key)->first()->fecha,  ['class' => 'form-control'])}}
                        @error('fecha')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                         @enderror
                    </div>
                

                <div class="form-row">
                    <div class="form-group col-md-4 @if($errors->has(' vocal1')) has-error has-feedback @endIf">
                        {{ Form::label('vocal', "Vocal  1", ['class' => '']) }}
                        {{ Form::select("vocal1$key", $user, $examen->where('materia_id', $key)->first()->vocal1, ['class' => 'form-control']) }}
                        @error('vocal')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                         @enderror
                    </div>

                    <div class="form-group col-md-4 @if($errors->has(' vocal2')) has-error has-feedback @endIf">
                        {{ Form::label('vocal', "Vocal  2", ['class' => '']) }}
                        {{ Form::select("vocal2$key", $user, $examen->where('materia_id', $key)->first()->vocal2, ['class' => 'form-control']) }}
                        @error('vocal')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                         @enderror
                    </div>

                    <div class="form-group col-md-4 @if($errors->has(' vocal3')) has-error has-feedback @endIf">
                        {{ Form::label('vocal', "Vocal  3", ['class' => '']) }}
                        {{ Form::select("vocal3$key", $user, $examen->where('materia_id', $key)->first()->vocal3, ['class' => 'form-control']) }}
                        @error('vocal')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{$message}}</strong></span>
                         @enderror
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>

<h2 class="mb-0">
    <button type="submit" class="btn btn-primary btn-lg btn-block"> Guardar datos </button>
    {{ Form::close() }}
</h2>