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

        return view('contact_index', ['name' => 'contacts', 'contacts' => $contacts, 'categories' => $categories]);
    }

    public function create_post(Request $request)
    {

        try {
            $contacto = new Contacto();
            $contacto->user_id = Auth()->user()->id;
            $contacto->nombre = $request->contact_name;
            $contacto->apellido = $request->contact_lastname;
            $contacto->telefono = $request->contact_phone;
            $contacto->email = $request->contact_email;
            $contacto->direccion = $request->contact_address;

            if ($request->contact_category == -1 && $request->contact_category_input != '') {
                $categoria = new Categoria();
                $categoria->user_id = Auth()->user()->id;
                $categoria->nombre = $request->contact_category_name;
                $categoria->save();
                $contacto->categoria_id = $categoria->id;
            } else {
                $contacto->categoria_id = $request->contact_category;
            }



            $contacto->categoria_id = $request->contact_category;

            $contacto->save();

            return redirect()->back()->with('success', 'Contacto creado correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function update_post(Request $request)
    {

        // return dump($request->all());
        try {
            $contacto = Contacto::find($request->user_id);
            $contacto->nombre = $request->contact_name;
            $contacto->apellido = $request->contact_lastname;
            $contacto->telefono = $request->contact_phone;
            $contacto->email = $request->contact_email;
            $contacto->direccion = $request->contact_address;

            if ($request->contact_category == -1 && $request->contacto_category_update != '') {
                $category = Categoria::create([
                    'user_id' => Auth()->user()->id,
                    'nombre' => $request->contacto_category_update,
                ]);
                $contacto->categoria_id = $category->id;
            } else {
                $contacto->categoria_id = $request->contact_category;
            }
            $contacto->save();
            return redirect()->back()->with('success','Contacto actualizado correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            return dump('error', $th->getMessage());
        }


    }

    public function destroy_post(Request $request)
    {
        try {

            $contacto = Contacto::find($request->user_id);
            $contacto->delete();
            return to_route('contact.index.get')->with('success', 'Contacto eliminado correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', $th->getMessage());
        }


    }
}
