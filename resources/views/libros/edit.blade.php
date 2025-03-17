@extends('layouts.app')

@section('content')
    <h2>Editar Libro</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libros.update', $libro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título del Libro</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $libro->titulo }}" required>
        </div>

        <div class="mb-3">
            <label for="autores" class="form-label">Autores</label>
            <select name="autores[]" id="autores" class="form-control" multiple>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}" 
                        {{ in_array($autor->id, $libro->autores->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $autor->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
