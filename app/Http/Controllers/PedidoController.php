<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::paginate(10);
        return view("admin.pedido.index", compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::get();
        // productos, clientes,
        return view("admin.pedido.nuevo", compact("productos")); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        DB::beginTransaction();

        try {
            $ped = new Pedido();
            $ped->fecha_pedido = date("Y-m-d H:i:s");
            $ped->estado = 1; // EN PROCESO
            $ped->cliente_id = $request->cliente_id;
            $ped->save();

            // asignar productos al pedido
            foreach ($request->productos as $prod) {
                $ped->productos()->attach($prod["id"], ["cantidad" => $prod["cantidad"]]);
            }        

            $ped->estado = 2; // COMPLETADO  
            $ped->update();  

            DB::commit();
            // all good
            return response()->json(["mensaje" => "Pedido Registrado"], 201);
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return response()->json(["mensaje" => "Problemas al registrar el pedido", 400]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf_pedido($id)
    {
        $pedido = Pedido::find($id);
        $pdf = Pdf::loadView('admin.pedido.reportepdf', ["data" => $pedido]);
        return $pdf->stream('detalle_pedido.pdf');
    }
}
