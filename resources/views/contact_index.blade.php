@extends('base')
@section('content')
    <div class="container" style="margin:;">
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

                    {{-- valida de la variable $contacts existe --}}
                    @if (isset($contacts))
                        @foreach ($contacts as $contact)
                            <tr>
                                <th><i class="bi bi-people-fill m-auto"></i></th>
                                <td>{{ $contact->nombre }} {{ $contact->apellido }}</td>
                                <td>{{ $contact->telefono }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->direccion }}</td>
                                <td>{{ $contact->categoria->nombre }}</td>
                                <td>
                                    <div class="flex">
                                        <a style="display: inline" href="{{ route('printer.get', ['id' => $contact->id]) }}"
                                            class="btn btn-primary">Editar</a>
                                        <form style="display: inline"
                                            action="{{ route('printer.get', ['id' => $contact->id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @for ($id = 0; $id < 8; $id++)
                            <tr>
                                <th><i class="bi bi-people-fill"></i></th>
                                <td>no existen datos</td>
                                <td>no existen datos</td>
                                <td>no existen datos</td>
                                <td>no existen datos</td>
                                <td>
                                    <div class="flex">
                                        <a style="display: inline"
                                            href="{{ route('printer.get', ['id' => $id]) }}"
                                            class="btn btn-primary">Editar</a>
                                        <form style="display: inline"
                                            action="{{ route('printer.get', ['id' => $id]) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endfor
                    @endif
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
