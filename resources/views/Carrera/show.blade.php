@extends('Layout')

@section('content')
    <div class="containe pr-5 pl-5">
        <h1 class="text-center text-secondary"> Carrera </h1>
        <div class="card">
            <div class="card-body">
             <h2> Detalles de la carrera </h2>
                <p> <span class="font-weight-bold"> Nombre:</span> {{ $carrera->carrera}}</p>
                <p> <span class="font-weight-bold"> Resolución:</span> {{ $carrera->resolucion}}</p>
                <p> <span class="font-weight-bold"> Resolución PDF:</span> <a href="{{ asset('./storage/'. $carrera->pdf) }}" target="_blank"> {{ basename($carrera->pdf)}} </a></p>
            </div>
        </div>
    </div>
    <a href="{{route('carrera.index')}}" class="btn btn-view mt-5 mr1"><i class="fas fa-arrow-left"></i> Volver al listado de carreras</a>
@endsection