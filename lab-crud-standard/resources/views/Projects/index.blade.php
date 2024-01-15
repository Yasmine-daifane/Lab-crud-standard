@extends('layouts.layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Liste des projets</h1>
                </div>
               
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
        
            <div class="row">
                <div class="col-12">
                    <div class="card">
                       
                        <div id="search_ajax">
                            @include('Projects.table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
  
   

@endsection
