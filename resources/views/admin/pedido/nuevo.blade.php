@extends("layouts.admin")

@section("titulo", "Nuevo Pedido")

@section("contenido")

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                Pedido
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>PRECIO</th>
                            <th>STOCK</th>
                            <th>ST</th>
                            <th>CATEGORIA</th>
                            <th>GESTIONAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productos as $prod)
                        <tr>
                            <td>{{ $prod->id }}</td>
                            <td>{{ $prod->nombre }}</td>
                            <td>{{ $prod->precio }}</td>
                            <td>{{ $prod->stock }}</td>
                            <td>{{ $prod->stock * $prod->precio }}</td>
                            <td>{{ $prod->categoria->nombre }}</td>
                            <td>
                                <button type="button" class="btn btn-info" onclick="agregarCarrito({{$prod}})">
                                    <i class="fa fa-eye"></i>
                                </button>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Carrito:</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>PROD</td>
                                    <td>P.U.</td>
                                    <td>CANT</td>
                                    <td>ACCION</td>
                                </tr>
                            </thead>
                            <tbody id="carrito">

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="search" class="form-control" id="bcliente">
                            </div>
                            <div class="col-md-4">
                                <button onclick="buscarCliente()" class="btn btn-info">Buscar Cliente</button>
                            </div>
                            <div class="col-md-12">
                                <div id="clienteData"></div>
                            </div>
                            <div class="col-md-12">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                                    Nuevo Cliente
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <label for="">NOMBRE COMPLETO</label>
                                                <input type="text" class="form-control" id="nombre_completo">

                                                <label for="">TELEFONO</label>
                                                <input type="text" class="form-control" id="telefono">

                                                <label for="">CORREO</label>
                                                <input type="text" class="form-control" id="correo">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                <button type="button" class="btn btn-primary" onclick="guardarCliente()">Guardar Cliente</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-success btn-block" onclick="guardarPedido()">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection


@section("css")
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section("js")

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')
    });
</script>


<script>
    let carrito = [];

    cargarCarrito();

    function cargarCarrito() {
        let table = ``;
        for (let i = 0; i < carrito.length; i++) {
            const prod = carrito[i];

            table += `<tr>
                            <td>${prod.nombre}</td>
                            <td>${prod.precio}</td>
                            <td>
                            <button onclick="quitarCant(${i})">-</button>
                            ${prod.cantidad} 
                            <button onclick="addCant(${i})">+</button>
                            </td>
                            <td>
                                <button type="button" onclick="quitarCarrito(${i})" class="btn btn-danger">x</button>
                            </td>
                        </tr>`
        }

        document.getElementById("carrito").innerHTML = table;
    }

    function agregarCarrito(prod) {
        carrito.push({
            id: prod.id,
            nombre: prod.nombre,
            precio: prod.precio,
            cantidad: 1
        });
        cargarCarrito()
    }

    function quitarCarrito(index) {
        carrito.splice(index, 1);
        cargarCarrito()
    }

    function addCant(pos) {
        carrito[pos].cantidad++;
        cargarCarrito()
    }

    function quitarCant(pos) {
        carrito[pos].cantidad--;
        cargarCarrito()
    }

    async function buscarCliente() {
        try {
            let q = document.getElementById("bcliente").value
            const {
                data
            } = await axios.get('/api/cliente?q=' + q);
            console.log(data);
            if (data.nombre_completo != undefined) {
                let html = `
                <h6>NOMBRES:${data.nombre_completo}</h6>
                <h6>TELEFONO:${data.telefono}</h6>
                <h6>CORREO:${data.correo}</h6>
                `;
                document.getElementById("clienteData").innerHTML = html
                cliente_id = data.id
            } else {
                let html = `
                <h5>CLIENTE NO ENCONTRADO</h5>
                `;
                document.getElementById("clienteData").innerHTML = html
            }

        } catch (error) {
            console.error(error);
        }
    }

    async function guardarCliente() {
        let cliente_id = 0;
        let nombre_completo = document.getElementById("nombre_completo").value
        let telefono = document.getElementById("telefono").value
        let correo = document.getElementById("correo").value

        let datos = {
            nombre_completo: nombre_completo,
            telefono: telefono,
            correo
        }

        const {
            data
        } = await axios.post('/api/cliente/guardar_cliente', datos);
        console.log(data)

        let html = `
                <h6>NOMBRES:${data.cliente.nombre_completo}</h6>
                <h6>TELEFONO:${data.cliente.telefono}</h6>
                <h6>CORREO:${data.cliente.correo}</h6>
                `;
        document.getElementById("clienteData").innerHTML = html
        cliente_id = data.cliente.id

    }

    async function guardarPedido() {
        let pedido = {
            cliente_id: cliente_id,
            productos: carrito
        }

        const {
            data
        } = await axios.post('/api/pedido', pedido);

        console.log(data)
    }
</script>

@endsection