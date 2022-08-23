<h1>Nuevo Usuario</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuario.store') }}" method="post">
    @csrf
    <label for="">Ingrese Nombre</label>
    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label for="">Ingrese Correo</label>
    <input type="email" name="email" value="{{ old('email') }}">
    @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <label for="">Ingrese Password</label>
    <input type="password" name="password" value="{{ old('password') }}">
    @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br>
    <input type="submit" value="Guardar Usuario">
    
</form>
