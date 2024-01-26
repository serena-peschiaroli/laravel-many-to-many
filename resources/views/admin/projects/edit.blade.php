@extends('layouts.admin')

@section('content')

    <div class="container">
        <h1>Modifica</h1>
        
        <form action="{{route('admin.projects.update', ['project'=> $project->slug]) }}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror"  id="title" name="title" value="{{ old('title', $project->title) }}">
                @error('title')
                <div class='invalid-feedback'> {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="repository_url" class="form-label">Url del progetto</label>
                <input type="text" class="form-control @error('repository_url') is-invalid @enderror" id="repository_url" name="repository_url" value="{{ old('repository_url', $project->repository_url) }}">
                @error('repository_url')
                    <div class="invalid-feedback"> {{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="3" name="description"> {{ old('description', $project->description) }}</textarea>
            </div> 
            <div class="mb-3">
                <label for="type_id"> Seleziola la tipologia</label>
                <select name="type_id" id="type_id" class="form-select">
                    <option @selected(old('type_id', $project->type_id)) value="">Nessun tipo</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id}}">{{$type->name}}</option>
                        
                    @endforeach
                </select>

            </div>
            <button type="submit" class="btn btn-success">Salve le modifiche</button>
        </form>
        
    </div>
@endsection