@extends('Layout')

@section('content')
    <div class="containe pr-5 pl-5">
        <h1 class="text-center text-secondary"> {{ $materia->materia }}  </h1>
        <div class="card">
            <div class="card-body">
             <h2> Detalles de la materia </h2>
                <p> <span class="font-weight-bold"> Nombre:</span> {{ $materia->materia }} </p>
                <p> <span class="font-weight-bold"> Año:</span> {{  $materia->anio + 1}} </p>
                <p> <span class="font-weight-bold"> Carrera:</span> {{  $materia->Carrera->carrera }} </p>
                <p> <span class="font-weight-bold"> Programa:</span> <a href="{{ asset('./storage/'. $materia->programa) }}" target="_blank"> {{ basename($materia->programa)}} </a> </p>
                <p> <span class="font-weight-bold"> Creado el:</span> {{ $materia->created_at->toFormattedDateString() }} </p>
                <p> <span class="font-weight-bold"> Modificado el:</span> {{  $materia->updated_at->toFormattedDateString() }} </p>
            </div>
        </div>
    </div>
    <a href="{{route('materia.index')}}" class="btn btn-view mt-5 mr1"><i class="fas fa-arrow-left"></i> Volver al listado de materias </a>
@endsection