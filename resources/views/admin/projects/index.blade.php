@extends('layouts.app')

@section('title', 'Project list')

@section('content')
    <section>
        <div class="container my-4">
            {{-- pulsante inserisci progetto --}}
            <a href="{{ route('admin.projects.create') }}" role="button" class="btn btn-primary">Add Project</a>

            {{-- lista progetti --}}
            <h1 class="my-4">Projects list</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" style="width: 170px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->description }}</td>
                            <td class="align-middle">
                                <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info btn-sm"> Info </a>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm"> Edit </a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-project-{{ $project->id }}-modal">
                                    Delete
                                  </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><i>NO Project</i></td>
                        </tr>
                    @endforelse
    
                </tbody>
            </table>


            @foreach ($projects as $project)
            {{-- Modal eliminazione --}}
            <div class="modal fade" id="delete-project-{{$project->id}}-modal" tabindex="-1" aria-labelledby="delete-project-{{$project->id}}-modal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{$project->slug}}</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete the Project {{$project->id}}?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                      {{-- form con pulsante elimina fumetto --}}
                      <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                        @csrf
                        {{-- metodo --}}
                        @method("DELETE")
                        <button class="btn btn-danger">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            {{-- paginazione --}}
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
