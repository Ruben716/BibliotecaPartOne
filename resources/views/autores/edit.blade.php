@extends('layouts.app')

@section('content')
    <h2>Editar Autor</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('autores.update', $autor->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Autor</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $autor->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
