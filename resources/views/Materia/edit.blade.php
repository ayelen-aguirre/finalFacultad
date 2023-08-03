@extends('Layout')

@section('content')
    <h1 class="text-center text-secondary"> Materia </h1>
    @include('Materia.Partial._Formulario')
    <a href="{{route('materia.index')}}" class="btn btn-view mt-5 mr1"><i class="fas fa-arrow-left"></i> Volver al listado de materias </a>
@endsection