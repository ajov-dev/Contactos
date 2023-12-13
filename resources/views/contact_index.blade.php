@extends('base')
@section('content')
    <div class="container" style="margin:;">
        <div style="display: flex; flex-direction:row; justify-content:space-between; align-items: center;">
            <div>
                <h1 class="">Dashboard</h1>
            </div>

            <div>
                <button class="btn btn-outline-dark btn-rounded" data-bs-toggle="modal" data-bs-target="#modal_create"> Crear Usuario </button>
                <!-- Modal -->
                @include('contact_modal_create')
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
                    {{-- verifica si existe la variable contacts --}}
                    @foreach ($contacts as $contact)
                        <tr>
                            <th><i class="bi bi-people-fill m-auto"></i></th>
                            <td>{{ $contact->nombre }} {{ $contact->apellido }}</td>
                            <td>{{ $contact->telefono }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->direccion }}</td>
                            <td>{{ $contact->categoria->nombre }}</td>
                            <td>
                                <div class="d-flex row">
                                    <div class="col-4">
                                        <a class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal"
                                            data-bs-target="#modal_update_{{ $contact->id }}"> Editar </a>
                                    </div>
                                    <div class="col-8">
                                        <a class="btn btn-outline-danger btn-rounded" data-bs-toggle="modal"
                                            data-bs-target="#modal_destroy_{{ $contact->id }}"> eliminar </a>
                                    </div>
                                </div>
                                <!-- Modal update -->
                                @include('contact_modal_update')
                                {{-- fin del modal update --}}
                                <!-- Modal destroy -->
                                @include('contact_modal_destroy')
                                {{-- fin del modal destroy --}}
                            </td>
                        </tr>
                    @endforeach

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
