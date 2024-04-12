@extends('layouts.app')

@section('title', "Technology " . $technology->id)

@section('content')
    <section>
        <div class="container my-4">
            {{-- pulsante ritorna alla lista --}}
            <a href="{{ route('admin.technologies.index')}}" class="btn btn-primary"> Return to list</a>
            
            {{-- pulsante modifica tecnologia --}}
            <a href="{{ route('admin.technologies.edit', $technology)}}" class="btn btn-warning"> Edit Technology</a>

            <h2 class="mt-3">Technology info</h2>

            <div class="card my-4">
                <div class="card-body">
                    <h2><span class="badge" style="background-color: {{ $technology->color }}"> {{ $technology->id }} - {{ $technology->label }}</span></h2>
                </div>
            </div>
        </div>
    </section>
@endsection