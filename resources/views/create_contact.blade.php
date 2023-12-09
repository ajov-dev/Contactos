@extends('base')

@section('content')
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row ">
                <div class="col-sm-6 text-black m-auto">

                    <div class="d-flex align-items-center h-custom-2  ms-xl-4 pt-5 pt-xl-0 mt-xl-n5">

                        <form action="{{ route('printer') }}" method="POST" class="card card-body" style="width: 23rem;">
                            @csrf
                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Crear contacto</h3>
                            <input class="form-control form-control-lg mb-2" type="text" name="contact_name"
                                id="contact_name" placeholder="Nombre...">
                            <input class="form-control form-control-lg mb-2" type="text" name="contact_lastname"
                                id="contact_lastname" placeholder="Apellido...">
                            <input class="form-control form-control-lg mb-2" type="text" name="contact_phone"
                                id="contact_phone" placeholder="Telefono...">
                            <input class="form-control form-control-lg mb-2" type="email" name="contact_email"
                                id="contact_email" placeholder="Email...">
                            <input class="form-control form-control-lg mb-2" type="text" name="contact_address"
                                id="contact_address" placeholder="Direccion...">
                            <select class="form-control form-control-lg mb-2"  name="contact_category" id="contact_category"
                                onchange="mostrarCampoTexto(this)">
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                @endforeach
                                <option value="-1">Otra opción </option>
                                <input id="input_category" style="display: none; " placeholder="Ingrese la nueva categoria" type="text" name="new_categoria" id="new_categoria">
                            </select>
                            <div class="pt-1 mb-4">
                                <button class="btn btn-success btn-lg btn-block" type="submit">Agrega a la lista</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function mostrarCampoTexto(selectElement) {
            var input_category = document.getElementById('input_category');
            var campoTextoInput = document.getElementById('campoTexto');

            if (selectElement.value == -1) {
                input_category.style.display = 'flex';
                campoTextoInput.setAttribute('required', 'required');
            } else {
                input_category.style.display = 'none';
                campoTextoInput.removeAttribute('required');
            }
        }
    </script>
@endsection
