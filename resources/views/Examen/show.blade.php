@extends('Layout')

@section('content')
    <div class="containe pr-5 pl-5">
        <h1 class="text-center text-primary"> Usuario </h1>
        <div class="card">
            <div class="card-body">
             <h2> Detalles del usuario </h2>
                <p> <span class="font-weight-bold"> Nombre:</span> {{ $user->name }} </p>
                <p> <span class="font-weight-bold"> Email:</span> {{  $user->email }} </p>
                <p> <span class="font-weight-bold"> Creado el:</span> {{ $user->created_at->toFormattedDateString() }} </p>
                <p> <span class="font-weight-bold"> Modificado el:</span> {{  $user->updated_at->toFormattedDateString() }} </p>
            </div>
        </div>
    </div>
    <a href="{{route('usuario.index')}}" class="btn btn-view mt-5 mr1"><i class="fas fa-arrow-left"></i> Volver al listado de usuarios </a>
@endsection