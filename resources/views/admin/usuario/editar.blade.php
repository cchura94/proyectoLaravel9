<h1>Editar Usuario</h1>

<form action="{{ route('usuario.update', $user->id) }}" method="post">
    @csrf
    @method('PUT')
    <label for="">Ingrese Nombre</label>
    <input type="text" name="name" value="{{ $user->name }}">
    <br>
    <label for="">Ingrese Correo</label>
    <input type="email" name="email" value="{{ $user->email }}" readonly>
    <br>
    <label for="">Ingrese Password</label>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Guardar Usuario">
    
</form>
