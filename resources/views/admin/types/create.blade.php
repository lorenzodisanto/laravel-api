@extends('layouts.app')

@section('title', "New Type ")

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
      <a href="{{ route('admin.types.index')}}" class="btn btn-primary"> Return to list</a>

      <h2 class="mt-3">Add Type</h2>

      {{-- form aggiungi nuovo type --}}
      <form action="{{ route('admin.types.store') }}" method="POST" class="row">
        @csrf

        <div class="col-11">
          <label for="label" class="form-label pt-3">Label</label>
          <input type="text" 
            class="form-control @error('label') is-invalid
            @enderror"
            id="label" 
            name="label"
            value="{{ old('label') }}"
            >
            @error('label')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
       </div>
        <div class="col-1">
            <label for="color" class="form-label pt-3">Color</label>
            <input type="color" 
              class="form-control form-control-color @error('title') is-invalid
              @enderror"
              id="color" 
              name="color"
              value="{{ old('color') }}"
              >
              @error('color')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
        </div>
  
        <div class="col-2">
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </div>
       </form>
     </div>
    </section>
  @endsection