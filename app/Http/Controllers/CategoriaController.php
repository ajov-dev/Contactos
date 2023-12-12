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


    public function index_get(Request $request){
        $user = auth()->user();
        $categorias = Categoria::where('user_id', $user->id)->get();
        return view('category_index', compact('categorias'));
    }

    public function create_get(Request $request){
        $user = auth()->user();
        $categorias = Categoria::where('user_id', $user->id)->get();
        return view('category_create', compact('categorias'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create_post()
    {
        $user = auth()->user();
        request()->validate([
            'nombre' => 'required',
        ]);
        $categoria = new Categoria();

        $categoria->nombre = request('nombre');
        $categoria->user_id = $user->id;

        $categoria->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
