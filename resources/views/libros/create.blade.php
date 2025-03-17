@extends('layouts.app')

@section('content')
    <h2>Agregar Nuevo Libro</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('libros.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título del Libro</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
        </div>

        <div class="mb-3">
            <label for="autores" class="form-label">Autores</label>
            <select name="autores[]" id="autores" class="form-control select2" multiple required>
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}" {{ in_array($autor->id, old('autores', [])) ? 'selected' : '' }}>
                        {{ $autor->nombre }}
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Selecciona uno o más autores.</small>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('libros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection