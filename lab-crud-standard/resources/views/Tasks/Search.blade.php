@foreach ($Tasks as $Task)
<tr>
    <td>{{ $Task->nom }}</td>
    <td>{{ Str::limit($Task->description, 30) }}</td>
   
    <td class="">
        <a href="{{ route('tasks.show',['task'=> $Task->id] )}}" class="btn btn-sm btn-default mx-2">
            <i class="fa-regular fa-eye"></i>
        </a>
        <a href="{{ route('tasks.edit', ['task' => $Task->id]) }}" class="btn btn-sm btn-default mx-2">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>

        <button type="submit" class="btn btn-sm btn-danger" onclick="deleteTask({{$Task->id}})" data-toggle="modal"
            data-target="#deleteTask">
            <i class="fa-solid fa-trash"></i></button>



    </td>
</tr>


<!-- Modal -->
<div class="modal fade" id="deleteTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> Supprimer la
                    Tâche</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Êtes-vous sûr de vouloir supprimer cette tâche ?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="Task_id" name="id">
                    <div class="container pb-3 d-flex flex-row-reverse gap-2 bd-highlight">
                        <button type="submit" onclick="submitDeleteForm()"
                            class="btn btn-danger ml-2">Supprimer</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<tr>
    <td></td>
    <td></td>
    <td>
        <div class="pagination m-0 float-right">
            {{ $Tasks->links() }}
        </div>

    </td>
</tr>