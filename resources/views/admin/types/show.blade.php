@extends('layouts.app')

@section('title', "Type " . $type->id)

@section('content')
    <section>
        <div class="container my-4">
            {{-- pulsante ritorna alla lista --}}
            <a href="{{ route('admin.types.index')}}" class="btn btn-primary"> Return to list</a>
            
            {{-- pulsante modifica type --}}
            <a href="{{ route('admin.types.edit', $type)}}" class="btn btn-warning"> Edit Type</a>

            <div class="mt-4">
                <h2><span class="badge" style="background-color: {{ $type->color }}"> {{ $type->id }} - {{ $type->label }}</span></h2>
            </div>

            <h2 class="mt-3">Related Projects</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col" style="width: 50px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($related_projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>       
                        <td class="align-middle"><a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info btn-sm"> Info </a></td>                 
                    </tr>
                    @empty
                    <td colspan="3"><i>NO Related Project</i></td>
                    @endforelse
                </tbody>
            </table>

            {{-- paginazione --}}
            {{ $related_projects->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection