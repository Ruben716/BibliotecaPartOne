@extends('layouts.app')

@section('content')
    <h2>Agregar Nuevo Autor</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Autor</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
