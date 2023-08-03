@extends('Layout')

@section('content')
    <div class="containe pr-5 pl-5">
        <h1 class="text-center text-secondary"> Usuario </h1>
        <div class="card">
            <div class="card-body">
             <h2> Detalles del usuario </h2>
                <p> <span class="font-weight-bold"> Nombre:</span> {{ $user->name }} </p>
                <p> <span class="font-weight-bold"> Rol:</span> {{  $user->role_id }} </p>
                <p> <span class="font-weight-bold"> Email:</span> {{  $user->email }} </p>
                <p> <span class="font-weight-bold"> Telefono:</span> {{  $user->phone }} </p>
                <p> <span class="font-weight-bold"> Creado el:</span> {{ $user->created_at->toFormattedDateString() }} </p>
                <p> <span class="font-weight-bold"> Modificado el:</span> {{  $user->updated_at->toFormattedDateString() }} </p>
            </div>
        </div>
    </div>
    <a href="{{route('usuario.index')}}" class="btn btn-view mt-5 mr1">
    <i class="fas fa-arrow-left"></i> Volver a la lista de usuarios </a>
@endsection