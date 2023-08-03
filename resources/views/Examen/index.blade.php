@extends('Layout')

@section('content')
<h2 class="text-center text-secondary pb-4"> Exámenes Finales </h2>
<div class="container">
    @if(Session::has('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{Session('status')}}
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Carreras</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($carreras as $carrera)
        <tr>
            <td scope="col">{{ $carrera->carrera }}</td>
            <td scope="col">
                <a href={{route('examen.edit', ['Examan' => $carrera->id])}}  role="button" class="btn btn-outline-info m-2">
                    <i class="fas fa-plus-circle"></i> Exámenes Finales</a>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<hr>
<div class="d-flex justify-content-center">
    {!! $carreras->links() !!}
</div>
@endsection

{{--  <a class="btn btn-outline-info m-2" role="button" data-bs-toggle="modal" data-bs-target="#action{{$carrera->id}}">
<i class="fas fa-plus-circle"></i> Exámenes Finales</a> --}}
{{-- @include('Examen.Partial._modalAction')  --}}