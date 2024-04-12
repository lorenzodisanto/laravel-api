@extends('layouts.app')

@section('title', 'Technologies list')

@section('content')
    <section>
        <div class="container my-4">
            {{-- pulsante inserisci tecnologia --}}
            <a href="{{ route('admin.technologies.create') }}" role="button" class="btn btn-primary">Add Technology</a>

            {{-- lista tecnologie --}}
            <h1 class="my-4">Technologies list</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Label</th>
                        <th scope="col">Color label (HEX)</th>
                        <th scope="col" style="width: 170px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($technologies as $technology)
                        <tr>
                            <th scope="row">{{ $technology->id }}</th>
                            <td><h3><span class="badge" style="background-color: {{ $technology->color }}">{{ $technology->label }}</span></h3></td>
                            <td>{{ $technology->color }}</td>
                            <td class="align-middle">
                                <a href="{{ route('admin.technologies.show', $technology) }}" class="btn btn-info btn-sm"> Info </a>
                                <a href="{{ route('admin.technologies.edit', $technology) }}" class="btn btn-warning btn-sm"> Edit </a>
                                <button technology="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-technology-{{ $technology->id }}-modal">
                                    Delete
                                  </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><i>NO Technologies</i></td>
                        </tr>
                    @endforelse
    
                </tbody>
            </table>

            @foreach ($technologies as $technology)
            {{-- Modal eliminazione --}}
            <div class="modal fade" id="delete-technology-{{$technology->id}}-modal" tabindex="-1" aria-labelledby="delete-technology-{{$technology->id}}-modal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{$technology->label}}</h1>
                      <button technology="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete the Technology {{$technology->label}}?
                    </div>
                    <div class="modal-footer">
                      <button technology="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                      {{-- form con pulsante elimina tecnologia --}}
                      <form action="{{ route('admin.technologies.destroy', $technology) }}" method="POST" class="d-inline">
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
            {{ $technologies->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection