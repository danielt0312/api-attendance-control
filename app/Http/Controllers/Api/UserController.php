<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return response()->json(User::all(), 200);
    }

    public function show($id)
    {
        $organism = User::find($id);

        if ($organism) {
            $organism = [
                'organism' => $organism,
                'organisms_users' => User::with(['user'])->where('id_organism', $organism->id)->get(),
            ];

            return response()->json($organism, 200);
        }

        return response()->json(['message' => 'Usero no encontrado'], 404);
    }

    public function store(Request $request)
    {
        $organism = User::create($request->validated());

        return response()->json($organism, 201);
    }

    public function update(Request $request, User $organism)
    {
        $organism->update($request->validated());

        return response()->json($usuario, 200);
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'User no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(['message' => 'User eliminado'], 200);
    }
}
