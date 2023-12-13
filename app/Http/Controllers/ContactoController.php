<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Categoria;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function index_get()
    {
        $categorias = Categoria::where('user_id', Auth::user()->id)->get();
        return view('contact_index', ['name' => 'categories', 'categorias' => $categorias]);
    }

    public function create_get(Request $request)
    {
        try {

            $categorias = new Categoria();
            $categorias->user_id = Auth::user()->id;
            $categorias->nombre = $request->nombre;
            $categorias->descripcion = $request->descripcion;

            $categorias->save();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }

        return to_route('category.index.get');
    }
}
