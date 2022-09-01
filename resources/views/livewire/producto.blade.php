<div class="card">
    <div class="card-body">

        <input wire:model="search" type="text" placeholder="Buscar Productos..." />
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>NOMBRE</td>
                    <td>PRECIO</td>
                    <td>CANTIDAD</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos_livewire as $prod)
                <tr>
                    <td>{{ $prod->id }}</td>
                    <td>{{ $prod->nombre }}</td>
                    <td>{{ $prod->precio }}</td>
                    <td>{{ $prod->stock }}</td>
                </tr>

                @endforeach
            </tbody>

        </table>
        {{ $productos_livewire->links() }}

    </div>

</div>