<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministradorController extends Controller
{
    public function index()
    {
        return response()->json(Administrador::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|unique:administradores,correo',
            'usuario' => 'required|string|unique:administradores,usuario',
            'contraseña' => 'required|string|min:6',
            'rol' => 'required|string',
            'activo' => 'required|integer',
        ]);

        $administrador = new Administrador();
        $administrador->nombre = $validatedData['nombre'];
        $administrador->apellidos = $validatedData['apellidos'];
        $administrador->correo = $validatedData['correo'];
        $administrador->usuario = $validatedData['usuario'];
        $administrador->contraseña = $validatedData['contraseña']; // El cast 'hashed' se encarga en el modelo
        $administrador->rol = $validatedData['rol'];
        $administrador->activo = $validatedData['activo'];
        $administrador->save();

        return response()->json($administrador, 201);
    }

    public function show($id)
    {
        $administrador = Administrador::find($id);
        if (!$administrador) {
            return response()->json(['message' => 'Administrador no encontrado'], 404);
        }
        return response()->json($administrador);
    }

    public function update(Request $request, $id)
    {
        $administrador = Administrador::find($id);
        if (!$administrador) {
            return response()->json(['message' => 'Administrador no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'apellidos' => 'sometimes|string|max:255',
            'correo' => 'sometimes|email|unique:administradores,correo,' . $id,
            'usuario' => 'sometimes|string|unique:administradores,usuario,' . $id,
            'contraseña' => 'sometimes|string|min:6',
            'rol' => 'sometimes|string',
            'activo' => 'sometimes|integer',
        ]);

        if (isset($validatedData['contraseña'])) {
             $administrador->contraseña = $validatedData['contraseña'];
        }

        $administrador->update($validatedData);

        return response()->json($administrador);
    }

    public function destroy($id)
    {
        $administrador = Administrador::find($id);
        if (!$administrador) {
            return response()->json(['message' => 'Administrador no encontrado'], 404);
        }
        $administrador->delete();
        return response()->json(['message' => 'Administrador eliminado']);
    }
}
