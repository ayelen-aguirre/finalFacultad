@extends('Layout')

@section('content')
<h2 class="text-center text-secondary pb-4"> Usuarios </h2>
<div class="container">
    <a class="btn btn-outline-info m-2" href="{{route('usuario.create')}}" role="button"><i class="fas fa-plus-circle"></i> Crear nuevo usuario</a>
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
            <th scope="col">Usuario</th>
            <th scope="col">E-mail</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td scope="col">{{ $user->name }}</td>
            <td scope="col">{{ $user->email }}</td>
            <td scope="col">
                <a href="{{route('usuario.show', ['Usuario' => $user->id])}}" class="btn btn-primary mr1"><i class="fas fa-eye text-light"></i></a>
                <a href="{{route('usuario.edit', ['Usuario' => $user->id])}}" class="btn btn-secondary mr-1"><i class="far fa-edit text-light"></i></a>
                <button class="btn btn-danger mr-1" data-bs-toggle="modal" data-bs-target="#modaldelete{{$user->id}}"><i class="fas fa-trash-alt text-light"></i></button>
            </td>
        </tr>
        @include('Usuario.delete') 
        @endforeach
    </tbody>
</table>
<hr>
<div class="d-flex justify-content-center">
    {!! $users->links() !!}
</div>

@endsection
