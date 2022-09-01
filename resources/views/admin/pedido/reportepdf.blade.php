<table border="1">
    <caption>PEDIDO</caption>
    <tr>
        <td>CLIENTE</td>
        <td colspan="3">{{ $data->cliente->nombre_completo }}</td>
    </tr>
    <tr>
        <td colspan="4">PRODUCTOS</td>
    </tr>
    <tr>
        <th>DETALE.</th>
        <th>CANTIDAD.</th>
        <th>PRECIO</th>
        <th>SUB TOTAL</th>
    </tr>
    @foreach ($data->productos as $prod)
    <tr>
        <td>{{ $prod->nombre }}</td>
        <td>{{ $prod->pivot->cantidad }}</td>
        <td>{{ $prod->precio }}</td>
        <td>{{ $prod->precio * $prod->pivot->cantidad }}</td>
    </tr>
        
    @endforeach
   
    <tr>
        <th colspan="3">Subtotal</th>
        <td>610.88</td>
    </tr>
    <tr>
        <th colspan="2">IVA</th>
        <td>13%</td>
        <td>42.76</td>
    </tr>
    <tr>
        <th colspan="3">Total</th>
        <td>653.64</td>
    </tr>
</table>



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
    th {
        border: 1px solid black;
        padding: 8px;
    }
</style>
