<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::all();
        return response()->json($productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            //code...
            $request->validate([
                'nombre' => 'required|string',
                'required|numeric|min:0',
            ]);


            $producto = new Producto();
            $producto->nombre = $request->nombre;
            $producto->descripcion = $request->descripcion ?? '';
            $producto->precio = $request->precio;
            $producto->save();

            return response()->json(['message' => 'Producto creado exitosamente'], 201);

        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 401);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $request->validate([
                'nombre' => 'required|string',
                'precio' => 'required|numeric|min:0',
            ]);

            $producto = Producto::find($id);
            if (!$producto) {
                return response()->json(['message' => 'Producto no encontrado'], 404);
            }

            $producto->save();

            return response()->json(['message' => 'Producto actualizado exitosamente']);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(), 401);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        //
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado exitosamente']);
    }
}