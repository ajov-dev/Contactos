<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index_get(Request $request)
    {
        $user = auth()->user();
        $categorias = Categoria::where('user_id', $user->id)->get();
        return view('category_index', ['categories' => $categorias]);
    }

    public function create_get(Request $request)
    {
        $user = auth()->user();
        $categorias = Categoria::where('user_id', $user->id)->get();
        return view('category_create', compact('categorias'));
    }

    // post functions

    public function create_post(Request $request)
    {
        $user = auth()->user();
        $credentials = $request->validate([
            'nombre' => ['required', 'string', 'max:30'],
            'descripcion' => ['required', 'string', 'max:50'],
        ]);

        $request->nombre = strtolower($request->nombre);

        // valida que en la tabla de categorias no exista un nombre igual al que se esta creando para el usuario actual
        $categoria = Categoria::where('user_id', $user->id)->where('nombre', $request->nombre)->first();

        if ($categoria) {
            return redirect()->route('category.index.get')->withErrors(['error' => 'Ya existe una categoria con ese nombre']);
        }
        $categoria = new Categoria();
        $categoria->user_id = $user->id;
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
        return redirect()->route('category.index.get')->with('success', 'Categoria creada con exito');
    }

}
