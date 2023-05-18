@extends('layout/template')

@section('title', 'Editar alumno | Escuela')

@section('contenido')
<main>
    <div class="container py-4">
        <h2>Editar de alumno</h2>

        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <form action="{{ url('alumnos/'.$alumno->id ) }}" method="post">
            @method("PUT")
            @csrf

            <div class="mb-3 row">
                <label for="matricula" class="col-sm-2 col-form-label">Matricula</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="matricula" id="matricula" value="{{ $alumno->matricula }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre completo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $alumno->nombre }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="fecha_nacimiento" class="col-sm-2 col-form-label">Fecha de nacimiento</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="telefono" id="telefono" value="{{ $alumno->telefono }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="email" id="email" value="{{ $alumno->email }}">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nivel" class="col-sm-2 col-form-label">Nivel</label>
                <div class="col-sm-5">
                    <select name="nivel_id" id="nivel_id" class="form-select" required>
                        <option value="">Seleccionar nivel</option>
                        @foreach($niveles as $nivel)
                        <option value="{{ $nivel->id }}" @if ($nivel->id == $alumno->nivel_id) {{'selected'}} @endif>{{ $nivel->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ url('alumnos') }}" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>

        </form>
    </div>

</main>