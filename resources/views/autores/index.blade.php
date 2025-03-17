@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Lista de Autores</h2>
        <a href="{{ route('autores.create') }}" class="btn btn-primary">Nuevo Autor</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($autores as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nombre }}</td>
                    <td>
                        <a href="{{ route('autores.edit', $autor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('autores.destroy', $autor->id) }}" method="POST" style="display:inline;">
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
