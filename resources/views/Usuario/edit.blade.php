@extends('Layout')

@section('content')
    <h1 class="text-center text-secondary"> Usuario </h1>
    @include('Usuario.Partial._Formulario')
    <a href="{{route('usuario.index')}}" class="btn btn-view mt-5 mr1"><i 
    class="fas fa-arrow-left"></i> Volver a la lista de usuarios </a>
@endsection