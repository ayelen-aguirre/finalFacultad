<div class="modal fade" id="action{{$carrera->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Exámenes Finales </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <a href={{route('examen.edit', ['Examan' => $carrera->id])}}  role="button" class="text-center">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <div class="card-body">
                                    <span><i class="far fa-plus-square" style=" font-size: 120px;"></i><h6 class="card-title">CREAR FINALES</h6></span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-6">
                        <a href={{route('examen.edit', ['Examan' => $carrera->id])}}  role="button" class="text-center">
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                <div class="card-body">
                                    <span><i class="fas fa-pen-square" style=" font-size: 120px;"></i><h6 class="card-title">EDITAR FINALES</h6></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>