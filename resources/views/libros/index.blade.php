@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Lista de Libros</h2>
        <a href="{{ route('libros.create') }}" class="btn btn-primary">Nuevo Libro</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autores</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($libros as $libro)
                <tr>
                    <td>{{ $libro->id }}</td>
                    <td>{{ $libro->titulo }}</td>
                    <td>
                        @foreach($libro->autores as $autor)
                            <span class="badge bg-secondary">{{ $autor->nombre }}</span>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que quieres eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
