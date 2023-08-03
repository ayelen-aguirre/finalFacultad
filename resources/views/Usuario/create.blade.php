@extends('Layout')

@section('content')
    <div class="containe pr-5 pl-5">
        <h1 class="text-center text-secondary"> Nuevo Usuario </h1>

        @if(Session::has('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{Session('status')}}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @include('Usuario.Partial._Formulario')
    </div>
    <a href="{{route('usuario.index')}}" class="btn btn-view mt-5 mr1"><i class="fas fa-arrow-left"></i> Volver al listado de usuarios </a>
@endsection