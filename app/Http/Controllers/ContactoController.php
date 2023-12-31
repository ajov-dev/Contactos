<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Categoria;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index_get()
    {
        $contacts = Contacto::where('user_id', Auth()->user()->id)
            ->with('categoria')
            ->paginate(5);

        $categories = Categoria::where('user_id', Auth()->user()->id)->get();

        return view('contact_index', ['name' => 'contacts', 'contacts' => $contacts, 'categories' => $categories]);
    }


    public function create_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact_name' => 'required|unique:contactos,nombre,' . $request->user_id . ',id|min:5|max:30',
            'contact_lastname' => 'nullable|min:5|max:30',
            'contact_phone' => 'required|min:5|max:30',
            'contact_email' => 'required|min:5|max:30',
            'contact_address' => 'nullable|min:5|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }
        try {
            $contacto = new Contacto();
            $contacto->user_id = Auth()->user()->id;
            $contacto->nombre = $request->contact_name;
            $contacto->apellido = $request->contact_lastname;
            $contacto->telefono = $request->contact_phone;
            $contacto->email = $request->contact_email;
            $contacto->direccion = $request->contact_address;
            if ($request->contact_category == -1 && $request->contacto_category_create != '') {
                if ($this->validarExistenciaCategory($request->contacto_category_create)) {
                    return redirect()->back()->with('error', 'La categoria ya existe');
                }
                $category = Categoria::create([
                    'user_id' => Auth()->user()->id,
                    'nombre' => $request->contacto_category_create,
                ]);
                $contacto->categoria_id = $category->id;
            } else {
                $contacto->categoria_id = $request->contact_category ?? null;

            }
            $contacto->save();
            return redirect()->back()->with('success', 'Genial! Agregaste a ' . $request->contact_name . ' ' . $request->contact_lastname . ' a tus contactos');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function update_post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'contact_name' => 'required|unique:contactos,nombre,' . $request->user_id . ',id|min:5|max:30',
            'contact_lastname' => 'nullable|min:5|max:30',
            'contact_phone' => 'required|min:5|max:30',
            'contact_email' => 'required|min:5|max:30',
            'contact_address' => 'nullable|min:5|max:30',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        try {
            $contacto = Contacto::find($request->user_id);
            $contacto->nombre = $request->contact_name;
            $contacto->apellido = $request->contact_lastname;
            $contacto->telefono = $request->contact_phone;
            $contacto->email = $request->contact_email;
            $contacto->direccion = $request->contact_address;
            if ($request->contact_category == -1 && $request->contacto_category_update != '') {
                if ($this->validarExistenciaCategory($request->contacto_category_update)) {
                    return redirect()->back()->with('error', 'La categoria ya existe');
                }
                $category = Categoria::create([
                    'user_id' => Auth()->user()->id,
                    'nombre' => $request->contacto_category_update,
                ]);
                $contacto->categoria_id = $category->id;
            } else {
                $contacto->categoria_id = $request->contact_category;
            }
            $contacto->save();
            return redirect()->back()->with('success', 'Contacto actualizado correctamente');
        } catch (\Throwable $th) {
            //throw $th;
            return to_route('contact.index.get')->with('error', $th->getMessage());
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

    public function validarExistenciaCategory($nombre_categoria)
    {
        // transforma el nombre de la categoria a minuscula
        $nombre_categoria = strtolower($nombre_categoria);
        // busca la categoria en la base de datos
        $categoria = Categoria::where('nombre', $nombre_categoria)->first();
        if ($categoria) {
            return true;
        } else {
            return false;
        }
    }
}
