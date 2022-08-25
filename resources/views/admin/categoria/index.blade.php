@extends("layouts.admin")

@section("contenido")

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('categoria.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <label for="">Ingrese Nombre</label>
                    <input type="text" name="nombre" class="form-control">

                    <label for="">Ingrese Detalle</label>
                    <textarea name="detalle" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="card card-primary card-outline">
    <div class="card-header">
        <h5 class="m-0 float-left">Lista de Categorias</h5>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
            Nueva Categoria
        </button>
    </div>
    <div class="card-body">

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DETALLE</th>
                    <th>ACCION</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $cat)
                <tr>
                    <td>{{$cat->id}}</td>
                    <td>{{$cat->nombre}}</td>
                    <td>{{$cat->detalle}}</td>
                    <td>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal{{$cat->id}}">
                            <i class="fa fa-eye"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="Modal{{$cat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="">Ingrese Nombre</label>
                                        <input type="text" name="nombre" class="form-control" readonly value="{{ $cat->nombre }}">

                                        <label for="">Ingrese Detalle</label>
                                        <textarea name="detalle" id="" cols="30" rows="10" class="form-control" readonly>{{ $cat->detalle }}</textarea>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEditar{{$cat->id}}">
                            <i class="fa fa-edit"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalEditar{{$cat->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('categoria.update', $cat->id) }}" method="post">
                                        @csrf
                                        @method("PUT")
                                        <div class="modal-body">
                                            <label for="">Ingrese Nombre</label>
                                            <input type="text" name="nombre" class="form-control" value="{{ $cat->nombre }}">

                                            <label for="">Ingrese Detalle</label>
                                            <textarea name="detalle" id="" cols="30" rows="10" class="form-control">{{ $cat->detalle }}</textarea>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="submit" class="btn btn-primary">Modificar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>





                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection