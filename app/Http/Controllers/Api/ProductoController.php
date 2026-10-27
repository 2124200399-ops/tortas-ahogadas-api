<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return response()->json(Producto::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'existencia' => 'required|integer',
            'descuento' => 'nullable|numeric',
            'estado' => 'required|string',
            'categoria1_id' => 'nullable|integer',
            'categoria2_id' => 'nullable|integer',
            'categoria3_id' => 'nullable|integer',
        ]);

        $producto = Producto::create($validatedData);

        return response()->json($producto, 201);
    }

    public function show($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        return response()->json($producto);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'descripcion' => 'sometimes|string',
            'precio' => 'sometimes|numeric',
            'existencia' => 'sometimes|integer',
            'descuento' => 'nullable|numeric',
            'estado' => 'sometimes|string',
            'categoria1_id' => 'nullable|integer',
            'categoria2_id' => 'nullable|integer',
            'categoria3_id' => 'nullable|integer',
        ]);

        $producto->update($validatedData);

        return response()->json($producto);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado']);
    }
}
