@extends("layouts.admin")

@section("contenido")
<h1>Usuario</h1>

    <label for="">Ingrese Nombre</label>
    <input type="text" name="name" value="{{ $user->name }}" readonly>
    <br>
    <label for="">Ingrese Correo</label>
    <input type="email" name="email" value="{{$user->email}}" readonly>
    <br>
    <label for="">Ingrese Password</label>
    <input type="password" name="password" disabled>
</form>
@endsection