@extends("layouts.admin")

@section("titulo", "Lista de Usuarios")


@section("contenido")

<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="m-0 float-left">Lista de Usuarios</h5>
        <a href="{{ route('usuario.create') }}" class="btn btn-primary float-right">Nuevo Usuario</a>
    </div>
    <div class="card-body">
        
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('usuario.edit', $user->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('usuario.show', $user->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    </td>
                </tr>

                @endforeach
            </tbody>

        </table>

    </div>
</div>


@endsection