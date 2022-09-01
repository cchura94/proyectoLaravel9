@extends("layouts.admin")

@section("titulo", "Lista Pedido")

@section("contenido")

<div class="card">
    <div class="card-body">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <td>FECHA</td>
                    <td>CLIENTE</td>
                    <td>PRODUCTOS</td>
                    <td>ACCIÓN</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->fecha_pedido }}</td>
                    <td>{{ $pedido->cliente->nombre_completo }}</td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal{{$pedido->id}}">
                            VER PRODUCTOS
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal{{$pedido->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">PRODUCTOS</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <td>NOMBRE</td>
                                                    <td>PRECIO</td>
                                                    <td>CANTIDAD</td>
                                                    <td>SUB TOTAL</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pedido->productos as $prod)
                                                <tr>
                                                    <td>{{ $prod->nombre }}</td>
                                                    <td>{{ $prod->precio }}</td>
                                                    <td>{{ $prod->pivot->cantidad }}</td>
                                                    <td>
                                                        {{ $prod->precio * $prod->pivot->cantidad }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>
                        <a href="{{ route('pdf_pedido', $pedido->id) }}" class="btn btn-success" target="_blank">VER PDF</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection