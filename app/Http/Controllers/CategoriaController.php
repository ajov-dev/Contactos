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
        return view('category_index', ['name' => 'categories', 'categories' => $categorias]);
    }

    public function create_get(Request $request)
    {
        $user = auth()->user();
        $categorias = Categoria::where('user_id', $user->id)->get();
        return view('category_create', ['name' => 'categories', 'categories' => $categorias]);
    }

    // post functions

    public function create_post(Request $request)
    {
        $credentials = $request->validate([
            'nombre' => ['required', 'string', 'max:30'],
        ]);

        if (empty($credentials)) {
            return redirect()->back()->withErrors('No se pudo crear la categoria');
        }
        $user = auth()->user();
        try {
            $categoria = new Categoria();
            $categoria->user_id = $user->id;
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;

            $categoria->save();
            return redirect()->route('category.index.get')->with(['success' => 'Categoria creada correctamente']);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('category.index.get')->with(['error' => $th->getMessage()]);
        }
    }

    public function update_post(Request $request)
    {
        $credentials = $request->validate([
            'nombre' => ['required', 'string', 'max:30'],
        ]);

        if (empty($credentials)) {
            return redirect()->back()->with('error', 'No se permiten campos vacios');
        }

        try {
            // actualizar categoria

            Categoria::where('id', $request->user_id)
                ->update([
                    'nombre' => $request->nombre,
                    'descripcion' => $request->descripcion,
                ]);
            return redirect()->route('category.index.get')->with(['success'=> 'Se Actualizó la informacion correctamente']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error', $th->getMessage()]);
        }
    }

    public function destroy_post(Request $request){
        try {
            Categoria::where('id', $request->user_id)->delete();
            return redirect()->route('category.index.get')->with(['success'=> 'Se Eliminó la categoria correctamente']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error', $th->getMessage()]);
        }
    }


}
