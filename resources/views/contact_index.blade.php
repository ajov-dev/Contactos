@extends('base')
@section('content')
    <div class="container" style="margin:2vh auto;">
        <div style="display: flex; flex-direction:row; justify-content:space-between; align-items: center;">
            <div>
                <h1 class="">Dashboard</h1>
            </div>

            <div>
                <button class="btn btn-outline-dark btn-rounded" data-bs-toggle="modal" data-bs-target="#modal_create"> Crear
                    Usuario </button>
                <!-- Modal -->
                <div class="modal top fade" id="modal_create" tabindex="-1" aria-labelledby="modal_create" aria-hidden="true"
                    data-bs-backdrop="true" data-bs-keyboard="true">
                    <div class="modal-dialog modal-lg  modal-dialog-centered">
                        <div class="modal-content">
                            <form action="{{ route('printer.post') }}" method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal_create">Crear Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <input class="form-control form-control-lg mb-2" required type="text"
                                        name="contact_name" id="contact_name" placeholder="Nombre...">
                                    <input class="form-control form-control-lg mb-2" required type="text"
                                        name="contact_lastname" id="contact_lastname" placeholder="Apellido...">
                                    <input class="form-control form-control-lg mb-2" required type="text"
                                        name="contact_phone" id="contact_phone" placeholder="Telefono...">
                                    <input class="form-control form-control-lg mb-2" required type="email"
                                        name="contact_email" id="contact_email" placeholder="Email...">
                                    <input class="form-control form-control-lg mb-2" required type="text"
                                        name="contact_address" id="contact_address" placeholder="Direccion...">
                                    <select class="form-control form-control-lg mb-2" name="contact_category"
                                        id="contact_category" onchange="mostrarCampoTexto(this)">
                                        <option value="" disabled selected>Seleccione una categoria</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                        <option value="-1">Otra opción </option>
                                        <input class="form-control form-control-lg mb-2" id="input_category"
                                            style="display: none; " placeholder="Ingrese la nueva categoria" type="text"
                                            name="new_categoria" id="new_categoria">
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- fin del modal --}}
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-dark ">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre Completo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 7; $i++)
                        <tr>
                            <th><i class="bi bi-people-fill"></i></th>
                            <td>Name {{ $i }}</td>
                            <td>6578367{{ $i }}</td>
                            <td>mail{{ $i }}{{ '@' }}correo.com</td>
                            <td>grupo{{ $i }}</td>
                            {{-- inserta 2 botones editar, eliminar --}}
                            <td>
                                <div class="flex">
                                    <a style="display: inline" href="{{ route('printer.get', ['id' => $i]) }}"
                                        class="btn btn-primary">Editar</a>
                                    {{-- <a href="{{ route('contact.edit', $i) }}" class="btn btn-primary">Editar</a> --}}
                                    {{-- <form action="{{ route('contact.destroy', $i) }}" method="POST"> --}}
                                    <form style="display: inline" action="{{ route('printer.get', ['id' => $i]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endfor
                </tbody>

            </table>
        </div>
    </div>

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
