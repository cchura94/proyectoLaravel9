<div class="titulo">
    <h3>Lista Productos</h3>
    <hr>
    <table class="tabla">
        <tr>
            <td width="50px">ID</td>
            <td width="250px">NOMBRE</td>
            <td width="100px">PRECIO</td>
            <td width="50px">CANTIDAD</td>
            <td width="100px">SUB TOTAL</td>
        </tr>
        @foreach ($data as $prod)
        <tr>
            <td>{{ $prod->id }}</td>
            <td>{{ $prod->nombre }}</td>
            <td>Bs. {{ $prod->precio }}</td>
            <td>{{ $prod->stock }}</td>
            <td>Bs. {{ $prod->precio * $prod->stock }}</td>
        </tr>
            
        @endforeach
    </table>
</div>

<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }
    .titulo h3{
        text-align: center;
    }

    table
    {
    border-collapse: collapse;
    }
    td {
        border: 1px solid black;
        padding: 8px;
    }
</style>