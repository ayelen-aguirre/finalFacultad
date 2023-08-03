@extends('Layout')

@section('content')
    <div class="containe pr-5 pl-5">
        <h1 class="text-center text-secondary"> Nueva materia </h1>

        @if(Session::has('status'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{Session('status')}}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @include('Materia.Partial._Formulario')
    </div>
@endsection