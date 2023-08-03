<!-- Modal --> 
<div class="modal fade" id="modaldelete{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        {{ Form::model($user, ['method' => 'delete', 'route' => ['usuario.destroy', $user->id]]) }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Eliminar</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> ¿Está seguro que desea eliminar el usuario seleccionado? </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar usuario </button>   
                    </div>
                </div>
            </div>
        {{ Form::close() }}
    </div>
</div>