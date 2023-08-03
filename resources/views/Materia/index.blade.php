@extends('Layout')

@section('content')
<h2 class="text-center text-secondary pb-4"> Listado de materias </h2>
<div class="container">
    <a class="btn btn-outline-info m-2" href="{{route('materia.create')}}" role="button"><i class="fas fa-plus-circle"></i> Crear nueva materia</a>
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
            <th scope="col">Materia</th>
            <th scope="col">Carrera</th>
            <th scope="col">Año</th>
            <th scope="col">Programa</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($materias as $materia)
        <tr>
            <td scope="col">{{ $materia->materia }}</td>
            <td scope="col">{{ $materia->Carrera->carrera }}</td>
            <td scope="col">{{ $materia->anio + 1 }}</td>
            <td scope="col">
                @if($materia->programa)
                    <span class="badge badge-warning"> 
                        <a href="{{ asset('./storage/'. $materia->programa) }}" target="_blank"> {{ Str::limit(basename($materia->programa), 30)}} </a>
                    </span> 
                @else
                    <span class="badge badge-danger text-aling-center"> 
                       Sin cargar
                    </span> 
                @endIf
            </td>
            <td scope="col">
                <a href="{{route('materia.show', ['Materium' => $materia->id])}}" class="btn btn-primary mr1"><i class="fas fa-eye text-light"></i></a>
                <a href="{{route('materia.edit', ['Materium' => $materia->id])}}" class="btn btn-secondary mr-1"><i class="far fa-edit text-light"></i></a>    
                <button class="btn btn-danger mr-1" data-bs-toggle="modal" data-bs-target="#modaldelete{{$materia->id}}"><i class="fas fa-trash-alt text-light"></i></button> 
            </td>
        </tr>
        @include('Materia.delete') 
        @endforeach
    </tbody>
</table>
<hr>
<div class="d-flex justify-content-center">
    {!! $materias->links() !!}
</div>

@endsection
