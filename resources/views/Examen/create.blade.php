@extends('Layout')

@section('content')
    <div class="containe pr-5 pl-5">
        <h1 class="text-center text-secondary"> Programación de Exámenes </h1>
        <h4 class="text-center text-secondary"> Tecnicatura Superior en Análisis de Sistemas </h4>
        <p class="text-center">Recuerde que solo apareceran las materias que estén registradas en el sistema </p>
        @if(Session::has('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{Session('status')}}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @include('Examen.Partial.putoUser')
    </div>
@endsection