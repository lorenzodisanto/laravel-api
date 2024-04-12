@extends('layouts.app')

@section('title', "Edit Project " . $project->id)

@section('content')
  <section>
     <div class="container my-4">

      {{-- errore di validazione generale
      @if ($errors->any())
        <div class="alert alert-danger">
          <h4>Correggi i seguenti errori per proseguire: </h4>
          <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
        </div>
      @endif --}}

      {{-- pulsante ritorna alla lista  --}}
      <a href="{{ route('admin.projects.index')}}" class="btn btn-primary">Return to list</a>

      {{-- pulsante torna al dettaglio --}}
      <a href="{{ route('admin.projects.show', $project)}}" class="btn btn-info">Info</a>


      <h2 class="mt-3">Edit Project</h2>
        
      {{-- form modifica progetto --}}
      <form action="{{ route('admin.projects.update', $project) }}" method="POST" class="row" enctype="multipart/form-data">
        @csrf

        {{-- aggiungo modificatore --}}
        @method("PATCH")

        <div class="col-9">
            <label for="title" class="form-label pt-3">Title</label>
            <input type="text" 
              class="form-control @error('title') is-invalid
              @enderror"
              id="title" 
              name="title" 
              value="{{ old('title') ?? $project->title}}"
            />
            @error('title')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="col-3">
          <label for="type_id" class="form-label pt-3">Type</label>
            <select name="type_id" id="type-id" class="form-select @error('type_id') is-invalid @enderror">
              <option value="">Select type --</option>
              @foreach ($types as $type)
                <option value="{{ $type->id }}" @if (old('type_id') ?? $project->type_id == $type->id) selected @endif>{{ $type->label }}
                </option>
              @endforeach
            </select>
            @error('type_id')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="col-6">
            <label for="link" class="form-label pt-3">Link</label>
            <input type="text" 
              class="form-control @error('link') is-invalid
              @enderror" 
              id="link" 
              name="link" 
              value="{{ old('link') ?? $project->link}}"
            />
            @error('link')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>

        <div class="col-6">
          <label for="image" class="form-label pt-3">Image</label>
          <input type="file"
            class="form-control @error('image') is-invalid
            @enderror" 
            id="image" 
            name="image"
            >
            @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="col-6">
          
        </div>

        <div class="col-12">
          <label class="form-label pt-3">Technologies</label>         
              <div class="form-check @error('technologies') is-invalid @enderror p-0">
                @foreach ($technologies as $technology)
                  <input
                   type="checkbox"
                    id="technology-{{ $technology->id }}"
                    value="{{ $technology->id }}"
                    name="technologies[]"
                    class="form-check-control"
                    @if (in_array($technology->id, old('technologies', $project_technologies ?? []))) checked @endif
                  >
                  <label for="technology-{{ $technology->id }}" class="me-3">
                    {{ $technology->label }}
                  </label>
                @endforeach
              </div> 
          @error('technologies')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>          
      

        <div class="col-12">
            <label for="description" class="form-label pt-3">Description</label>
            <textarea
                class="form-control @error('description') is-invalid
                @enderror"
                id="description"
                name="description"
                rows="5"
            >{{ old('description') ?? $project->description}}</textarea>
            @error('description')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
        
        <div class="col-2">
            <button type="submit" class="btn btn-warning mt-3">Edit</button>
        </div>
       </form>
     </div>
  </section>
@endsection
