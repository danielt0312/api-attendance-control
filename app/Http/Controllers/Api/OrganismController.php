<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\Organism;
use App\Models\OrganismUser;

class OrganismController extends Controller
{
    public function index()
    {
        return response()->json(Organism::all(), 200);
    }

    public function show($id)
    {
        $organism = Organism::find($id);

        if ($organism) {

            return response()->json(OrganismUser::with(['users'])->where('id_organism', $organism->id)->get(), 200);
        }

        return response()->json(['message' => 'Organismo no encontrado'], 404);
    }

    public function store(Request $request)
    {
        $organism = Organism::create($request->validated());

        return response()->json($organism, 201);
    }

    public function update(Request $request, Organism $organism)
    {
        $organism->update($request->validated());

        return response()->json($usuario, 200);
    }

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
