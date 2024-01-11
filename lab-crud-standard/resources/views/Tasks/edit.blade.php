@extends('../Layouts.Layout')
@section('content')
    <div class="content-header">
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Tâche </h3>
                        </div>
                        <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="project_id">Projet<span class="text-danger">*</span></label>
                                    <select id="project_id" name="projetId" class="custom-select">
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                                    {{ $project->nom }}
                                </option>
                            @endforeach
                        </select>
                                </div>

                                <div class="form-group">
                                    <label for="Projet">Nom <span class="text-danger">*</span></label>
                                    <input type="text" name="nom"
                                        class="form-control @error('nom') border-danger @enderror"
                                        value="{{ $task->nom }}" id="nom" placeholder="Enter le name de Tâche">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" name="description" rows="3" placeholder="Entre un Description ">{{ $task->description }}</textarea>
                                </div>

                            </div>

                            <div class="card-footer">
                                <a href="{{ route('tasks.index') }}" class="btn btn-default">annuler</a>
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
