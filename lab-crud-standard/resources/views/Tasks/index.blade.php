@extends('layouts.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des tâche</h1>
                </div>
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="{{ route('tasks.create') }}" class="btn btn-sm btn-primary">Ajouter tâche</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            {{-- start alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success </strong> {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- end alert --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header ">
                            {{-- filter --}}
                            <div class="row d-flex justify-content-between">
                                <div class="col-4">
                                    <div class="input-group">
                                       
                                    </div>
                                </div>
                                <div class="input-group col-md-3">
                                    <input type="text" class="form-control" placeholder="Recherche"
                                        aria-label="Recherche" aria-describedby="basic-addon1" id="search-input">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                                </div>

                            </div>
                        </div>
                        <div id="search_ajax">
                            @include('Tasks.Table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetchData(page, searchValue, projetId) {
                // Choose either requestUrl or requestUr2
                var requestUrl = "{{ url('projects') }}/tasks/" + projetId +"?page=" + page + "&searchValue=" + searchValue;

                console.log("Request URL:", requestUrl);

                $.ajax({
                    url: requestUrl, 
                    success: function(data) {

                        if (data == 'false') {
                        // No results found, display a message
                        $('tbody').html('<tr><td colspan="4">No results found</td></tr>');
                    } else {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
            
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error:", textStatus, errorThrown);
                    }
                });
            }

            $('body').on('click', '.pagination a', function(event) {
                event.preventDefault();

                var page = $(this).attr('href').split('page=')[1];
                var searchValue = $('#search-input').val();
                var projectId = $('#projectId').val();

                fetchData(page, searchValue, 1);
            });

            $('body').on('keyup', '#search-input', function() {

                var page = 1;
                var searchValue = $('#search-input').val();
                var projectId = $('#projectId').val();

                console.log(searchValue);
                fetchData(page, searchValue, 1);
            });
        });
    </script>


<script>
    function deleteTask(taskId) {
        document.getElementById('deleteForm').action = "{{ route('tasks.destroy', ':taskId') }}".replace(':taskId',
            taskId);
    }
</script>


@endsection