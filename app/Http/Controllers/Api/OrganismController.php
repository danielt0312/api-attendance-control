<?php
namespace App\Http\Controllers\Api;

use App\Models\Organism;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class OrganismController extends Controller
{
    // Obtener todos los usuarios
    public function index()
    {
        return response()->json(Organism::all(), 200);
    }

    // Obtener un usuario por ID
    public function show($id)
    {
        $usuario = Organism::find($id);
        if ($usuario) {
            return response()->json($usuario, 200);
        }
        return response()->json(['message' => 'Organism no encontrado'], 404);
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8',
        ]);

        $usuario = Organism::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($usuario, 201);
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $usuario = Organism::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Organism no encontrado'], 404);
        }

        $usuario->update($request->all());
        return response()->json($usuario, 200);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Organism::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Organism no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(['message' => 'Organism eliminado'], 200);
    }
}
