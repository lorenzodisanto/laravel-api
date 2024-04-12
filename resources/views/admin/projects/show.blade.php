@extends('layouts.app')

@section('title', "Project " . $project->id)


@section('content')
    <section>
        <div class="container my-4">

            {{-- pulsante ritorna alla lista --}}
            <a href="{{ route('admin.projects.index')}}" class="btn btn-primary"> Return to list</a>
            
            {{-- pulsante modifica progetto --}}
            <a href="{{ route('admin.projects.edit', $project)}}" class="btn btn-warning"> Edit Project</a>

            <h2 class="mt-3">Project info</h2>

            <div class="card my-4">
                <div class="card-header">
                    <h3>{{ $project->title }} #{{ $project->id }}</h3>
                </div>
                <div class="card-body">                    
                    <code class="fs-4">{{ $project->slug }}</code>
                    <p class="my-2"><span class="badge fs-5" style="background-color: {{ $project->type->color }}">{{ $project->type->label }}</span></p>
                    @foreach ($project->technologies as $technology)
                        <code>{{ $technology->label }}</code>
                         @unless ($loop->last) 
                         <code>-</code>
                         @endunless           
                    @endforeach
                    <p class="fs-5">{{ $project->description }}</p>
                    <a href="{{ $project->link }}">link</a>
                </div>

                {{-- immagine --}}
                @if (!@empty($project->image))
                <img src="{{ asset('storage/'. $project->image) }}" class="img-fluid">    
                @endif          
            </div>          
        </div>
    </section>
@endsection
