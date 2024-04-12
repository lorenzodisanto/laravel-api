@extends('layouts.app')

@section('title', 'Types list')

@section('content')
    <section>
        <div class="container my-4">
            {{-- pulsante inserisci type --}}
            <a href="{{ route('admin.types.create') }}" role="button" class="btn btn-primary">Add Type</a>

            {{-- lista Types --}}
            <h1 class="my-4">Types list</h1>
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
                    @forelse ($types as $type)
                        <tr>
                            <th scope="row">{{ $type->id }}</th>
                            <td><h3><span class="badge" style="background-color: {{ $type->color }}">{{ $type->label }}</span></h3></td>
                            <td>{{ $type->color }}</td>
                            <td class="align-middle">
                                <a href="{{ route('admin.types.show', $type) }}" class="btn btn-info btn-sm"> Info </a>
                                <a href="{{ route('admin.types.edit', $type) }}" class="btn btn-warning btn-sm"> Edit </a>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete-type-{{ $type->id }}-modal">
                                    Delete
                                  </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><i>NO Types</i></td>
                        </tr>
                    @endforelse
    
                </tbody>
            </table>

            @foreach ($types as $type)
            {{-- Modal eliminazione --}}
            <div class="modal fade" id="delete-type-{{$type->id}}-modal" tabindex="-1" aria-labelledby="delete-type-{{$type->id}}-modal" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">{{$type->label}}</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete the Type {{$type->label}}?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      
                      {{-- form con pulsante elimina tipo --}}
                      <form action="{{ route('admin.types.destroy', $type) }}" method="POST" class="d-inline">
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
            {{ $types->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection