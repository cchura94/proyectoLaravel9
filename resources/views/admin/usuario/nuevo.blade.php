@extends("layouts.admin")

@section("titulo", "Nuevo Usuario")

@section("contenido")

<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="m-0 float-left">Lista de Usuarios</h5>
    </div>
    <div class="card-body">
<!--
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
-->
        <form action="{{ route('usuario.store') }}" method="post">
            @csrf
            <label for="">Ingrese Nombre</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <label for="">Ingrese Correo</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <label for="">Ingrese Password</label>
            <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input type="submit" value="Guardar Usuario" class="btn btn-primary">

        </form>

    </div>
</div>


@endsection