@extends('Layout')

@section('content')
    <div class="containe pr-5 pl-5">
        <h1 class="text-center text-primary"> Carrera </h1>
        {{-- PASAR AL INDEX --}}
        @if(Session::has('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{Session('status')}}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @include('Carrera.CarreraPartial._Formulario')
    </div>
    <a href="{{route('carrera.index')}}" class="btn btn-view mt-5 mr1"><i class="fas fa-arrow-left"></i> Volver al listado de carreras</a>
@endsection