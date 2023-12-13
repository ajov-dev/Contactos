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
        $contacts = Contacto::where('user_id', Auth()->user()->id)->get();
        $categories = Categoria::where('user_id', Auth()->user()->id)->get();

        return view('contact_index', ['name' => 'contacts', 'contacts' => $contacts,'categories' => $categories]);
    }

    public function create_post(Request $request)
    {
        try {

            $contacto = Contacto::create([
                'user_id' => Auth()->user()->id,
                'categoria_id' => $request->categoria_id,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'telefono' => $request->telefono,
                'email' => $request->email,
            ]);

            $contacto->save();
            return to_route('contact.index.get');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function update_post(Request $request)
    {
        try {

            $contacto = Contacto::find($request->id);
            $contacto->user_id = Auth::user()->id;
            $contacto->nombre = $request->nombre;
            $contacto->apellido = $request->apellido;
            $contacto->telefono = $request->telefono;
            $contacto->email = $request->email;
            $contacto->categoria_id = $request->categoria_id;

            $contacto->save();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }

        return to_route('contact.index.get');
    }

    public function destroy_post(Request $request)
    {
        try {

            $contacto = Contacto::find($request->id);
            $contacto->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }

        return to_route('contact.index.get');
    }
}
