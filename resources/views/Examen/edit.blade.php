@extends('Layout')

@section('content')
<div class="containe pr-5 pl-5">
    <h1 class="text-center text-secondary"> Programación de Exámenes </h1>
    <h4 class="text-center text-black"> {{ $carrera->carrera }} </h4>
    <p class="text-center">Recuerde que solo apareceran las materias que estén registradas en el sistema </p>
    @include('Examen.Partial._Formulario')
</div>
@endsection