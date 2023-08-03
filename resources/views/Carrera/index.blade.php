@extends('Layout')

@section('content')
<h2 class="text-center text-secondary pb-4"> Listado de carreras </h2>
<div class="container">
    <a class="btn btn-outline-info m-2" href="{{route('carrera.create')}}" role="button"><i class="fas fa-plus-circle"></i> Crear nueva carrera</a>
    @if(Session::has('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{Session('status')}}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>
<table class="table table-dark">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre de la carrera</th>
            <th scope="col">Resolución</th>
            <th scope="col">Resolución PDF</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($carreras as $carrera)
        <tr>
            <td scope="col">{{ $carrera->carrera }}</td>
            <td scope="col">{{ $carrera->resolucion }}</td>
            <td scope="col">
                @if($carrera->pdf)
                <span class="badge badge-warning"> 
                    <a href="{{ asset('./storage/'. $carrera->pdf) }}" target="_blank"> {{ Str::limit(basename($carrera->pdf), 25) }} </a>
                </span>
                @endif 
            </td>
            <td scope="col">
            <a href="{{route('carrera.show', ['Carrera' => $carrera->id])}}" class="btn btn-primary mr1"><i class="fas fa-eye text-light" alt="Ver"></i></a>
            <a href="{{route('carrera.edit', ['Carrera' => $carrera->id])}}" class="btn btn-secondary mr-1"><i class="far fa-edit text-light" alt="Editar"></i></a>
            <button type="button" class="btn btn-danger mr-1" data-bs-toggle="modal" data-bs-target="#modaldelete{{$carrera->id}}"><i class="fas fa-trash-alt text-light" alt="Eliminar"></i></button>    
            </td>
        </tr>
        @include('Carrera.delete') 
        @endforeach
    </tbody>
</table>
<hr>
<div class="d-flex justify-content-center">
    {!! $carreras->links() !!}
</div>
@endsection
